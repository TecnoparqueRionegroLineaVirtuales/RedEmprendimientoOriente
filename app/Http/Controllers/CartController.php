<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\bill;
use App\Models\buy_bill;
use App\Models\buys;
use App\Models\ProductInteraction;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = products::find($productId);
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'url' => $product->url,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart()
    {
        $code = Str::random(20);
        $cartItems = Session::get('cart', []);
        $totalAmount = 0;

        foreach ($cartItems as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }

        $merchantId = '508029';
        $accountId = '512321';
        $description = 'Productos de la tienda';

        $referenceCode = 'PayU_' . time() . $code;

        $tax = 0;
        $taxReturnBase = 0;
        $currency = 'COP';
        $confirmationUrl = url('/confirmation');
        $responseUrl = url('/response');
        $test = 1;

        $apiKey = '4Vj8eK4rloUd272L48hsrarnUA';
        $signature = md5($apiKey . '~' . $merchantId . '~' . $referenceCode . '~' . number_format($totalAmount, 1, '.', '') . '~' . $currency);

        return view('cart', compact('cartItems', 'totalAmount', 'merchantId', 'accountId', 'description', 'referenceCode', 'tax', 'taxReturnBase', 'currency', 'confirmationUrl', 'responseUrl', 'signature', 'test')
        );
    }

    public function updateCart(Request $request, $productId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function removeFromCart($productId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Product removed from cart!');
    }

//  TODO AGREGAR AL FORMULARIO  de envio de mensajes a whatsapp un chulo que acepta que le manden mensajes.
//  8. Opt-In Consent
//  WhatsApp requires businesses to obtain user consent before sending messages. 
//  Ensure you have a clear opt-in process that lets customers agree to receive WhatsApp messages from your business.

    public function showWhatsAppContactForm()
    {
        // mensaje predefiniido de de whatsapp
        $wpMessage=" Hola, me comunico porque estoy interesado en obtener más información de estos productos: %0a";
        $wpAdminReceiverPhoneNumber=env('WHATSAPP_RECEIVER_PHONE_NUMBER');
        $cartItems = session('cart');
        
        if (!empty($cartItems)) {
            foreach ($cartItems as $item) {
                $wpMessage .= 
                    '%0a producto: ' . $item["name"] . 
                    '%0a precio: ' . $item["price"] .
                    '%0a cantidad: ' . $item["quantity"];

                // save products as interactions
                $productInteraction = ProductInteraction::create([
                    'product_id'  => $item["id"],
                    'user_id' => auth()->id()]); 
                //dd($productInteraction );
            }
            $wpMessage .= '%0a';
        }
        $wpMessage .= '%0a Muchas Gracias';
        //dd($wpMessage);
        
        return view('sendWhatsAppMessage', compact('wpMessage','wpAdminReceiverPhoneNumber'));
    }

    public function handlePayuResponse(Request $request)
    {
        $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
        $merchant_id = $_REQUEST['merchantId'];
        $referenceCode = $_REQUEST['referenceCode'];
        $TX_VALUE = $_REQUEST['TX_VALUE'];
        $New_value = number_format($TX_VALUE, 1, '.', '');
        $currency = $_REQUEST['currency'];
        $transactionState = $_REQUEST['transactionState'];
        $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
        $firmacreada = md5($firma_cadena);
        $firma = $_REQUEST['signature'];
        $reference_pol = $_REQUEST['reference_pol'];
        $cus = $_REQUEST['cus'];
        $extra1 = $_REQUEST['description'];
        $pseBank = $_REQUEST['pseBank'];
        $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
        $transactionId = $_REQUEST['transactionId'];
        $currentDate = date('Y-m-d');
        $cartItems = session('cart');

        $data = [
            'ApiKey' => $ApiKey,
            'merchant_id' => $merchant_id,
            'referenceCode' => $referenceCode,
            'TX_VALUE' => $TX_VALUE,
            'New_value' => $New_value,
            'currency' => $currency,
            'transactionState' => $transactionState,
            'firma_cadena' => $firma_cadena,
            'firmacreada' => $firmacreada,
            'firma' => $firma,
            'reference_pol' => $reference_pol,
            'cus' => $cus,
            'extra1' => $extra1,
            'pseBank' => $pseBank,
        ];

        $estadoTx = "";
        if ($transactionState == 4) {
            $estadoTx = "Transaction approved";
        } elseif ($transactionState == 6) {
            $estadoTx = "Transaction rejected";
        } elseif ($transactionState == 104) {
            $estadoTx = "Error";
        } elseif ($transactionState == 7) {
            $estadoTx = "Pending payment";
        } else {
            $estadoTx = "Unknown state";
        }

        if (strtoupper($firma) == strtoupper($firmacreada)) {
            
            $user_id = auth()->id();

            $bill = bill::create([
                'id_transaction' => $transactionId,
                'ref_sale' => $referenceCode,
                'ref_transaction' => $reference_pol,
                'total' => $TX_VALUE,
                'entity' => $lapPaymentMethod,
                'date' => now(),
                'user_id' => $user_id,
                'address' => Session::get('shippingAddress') . ', ' . Session::get('shippingCity'),
            ]);


            if (!empty($cartItems)) {
                foreach ($cartItems as $item) {
                    if (isset($item['id'])) {
                        $buy = buys::create([
                            'product_id' => $item['id'],
                            'total' => $item['price'] * $item['quantity'],
                            'date' => now(),
                        ]);

                        buy_bill::create([
                            'bill_id' => $bill->id,
                            'buy_id' => $buy->id,
                        ]);
                    }
                }
            }

            $request->session()->forget(['cart', 'shippingAddress', 'shippingCity']);

            return view('Response', compact('data', 'estadoTx', 'bill'));
        }
    }


    public function handlePayment(Request $request)
    {
        $request->validate([
            'shippingAddress' => 'required|string|max:255',
            'shippingCity' => 'required|string|max:255',
            'merchantId' => 'required|string',
            'accountId' => 'required|string',
            'description' => 'required|string',
            'referenceCode' => 'required|string',
            'amount' => 'required|numeric',
            'tax' => 'required|numeric',
            'taxReturnBase' => 'required|numeric',
            'currency' => 'required|string',
            'signature' => 'required|string',
            'test' => 'required|boolean',
            'buyerEmail' => 'required|email',
            'responseUrl' => 'required|url',
            'confirmationUrl' => 'required|url',
        ]);

        Session::put('shippingAddress', $request->input('shippingAddress'));
        Session::put('shippingCity', $request->input('shippingCity'));

        $data = $request->except('_token');
        $payuUrl = 'https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/';

        $form = '<form id="payuForm" method="POST" action="' . $payuUrl . '">';
        foreach ($data as $key => $value) {
            $form .= '<input type="hidden" name="' . $key . '" value="' . htmlspecialchars($value) . '">';
        }
        $form .= '</form>';
        $form .= '<script>document.getElementById("payuForm").submit();</script>';

        return response($form);
    }

    public function showShippingDetails()
    {
        $shippingAddress = Session::get('shippingAddress');
        $shippingCity = Session::get('shippingCity');

        return view('shippingDetails', compact('shippingAddress', 'shippingCity'));
    }
}
