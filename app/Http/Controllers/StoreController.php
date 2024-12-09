<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\category;
use App\Models\products;
use App\Models\buy_bill;
use App\Models\bill;
use App\Models\Buys;
use App\Models\User;

class StoreController extends Controller
{
    public function storeNav(){

        return view('admin.store.index');
    }

    public function store(){
        $products = products::all();
        return view('admin.store.store', compact('products'));
    }

    public function registerProduct(){
        $category = category::all();
        $state = State::all();
        return view('admin.store.registerProduct', compact('category', 'state'));
    }
    public function productStore(Request $request){
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'price' => 'required',
            'amount' => 'required',
            'url' => 'required|image',
            'status_id' => 'required|exists:state,id',
            'category_id' => 'required|exists:category,id'
        ]);

        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('images', 'public');
        }

        products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'amount' => $request->amount,
            'url' => $imagePath,
            'status_id' => $request->status_id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('store')->with('success', 'Producto registrado exitosamente.');
    }

    public function destroyProduct($id)
    {
        $product = products::find($id);

        if (!$product) {
            return redirect()->route('store')->with('error', 'Producto no encontrado');
        }

        $product->delete();

        return redirect()->route('store')->with('success', 'Producto eliminado correctamente');
    }

    public function toggleProductStatus($id)
    {
        $product = products::find($id);

        if ($product) {
            $newStateId = $product->status_id == 1 ? 2 : 1;

            $newState = State::find($newStateId);
            if ($newState) {
                $product->status_id = $newState->id;
                $product->save();
                return redirect()->route('store')->with('success', 'Estado del producto actualizado correctamente');
            } else {
                return redirect()->route('store')->with('error', 'Estado no encontrado');
            }
        }

        return redirect()->route('store')->with('error', 'Producto no encontrado');
    }

    public function editProduct($id)
    {
        $product = products::findOrFail($id);
        $states = State::all();
        $categories = Category::all();

        return view('admin.store.editProduct', compact('product', 'states', 'categories'));
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:200',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'url' => 'image|mimes:jpeg,png,jpg,gif',
            'status_id' => 'required|exists:state,id',
            'category_id' => 'required|exists:category,id',
        ]);

        $product = products::findOrFail($id);

        if ($request->hasFile('url')) {
            $imagePath = $request->file('url')->store('images', 'public');
            $product->url = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->status_id = $request->status_id;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('store')->with('success', 'Producto actualizado correctamente');
    }

    public function showOrders()
    {
        // Verifica si el usuario tiene el rol de 'admin'
        if (auth()->user()->hasRole('admin')) {
            // Si es admin, muestra todas las órdenes
            $orders = buy_bill::with(['bill.user', 'buys.product'])
                ->orderByDesc('id')
                ->get()
                ->groupBy('bill_id');
        } else {
            // Si es un usuario común, muestra solo sus órdenes
            $orders = buy_bill::with(['bill.user', 'buys.product'])
                ->whereHas('bill', function ($query) {
                    $query->where('user_id', auth()->id());
                })
                ->orderByDesc('id')
                ->get()
                ->groupBy('bill_id');
        }

        return view('admin.store.ordersProduct', compact('orders'));
    }


    public function showBill($id)
    {
        $bill = bill::with('buyBills.buys')->findOrFail($id);
        return view('admin.store.bill', compact('bill'));
    }
}
