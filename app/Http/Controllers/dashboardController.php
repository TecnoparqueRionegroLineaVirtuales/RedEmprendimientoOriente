<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductInteraction;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index()
    {
        // Obtener el número de ventas por producto
        $productInteraction = DB::table('product_interactions')
            ->join('products', 'product_interactions.product_id', '=', 'products.id')
            ->select('products.name as product_name', DB::raw('COUNT(product_interactions.product_id) as total_count'))
            ->groupBy('products.name')
            ->get();
        // dd($productInteraction);
        // Pasar datos a la vista
        return view('admin.dashboard', compact('productInteraction'));
    }

}
