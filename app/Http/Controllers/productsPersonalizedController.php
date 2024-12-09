<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productsPersonalized;
use App\Models\Multimedia;
use Illuminate\Support\Facades\Auth;

class ProductsPersonalizedController extends Controller
{
    public function personalized(){
        $multimedia = Multimedia::all();
        return view('buysPersonalized', compact('multimedia'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'number' => 'required|string|max:200',
            'multimedia_id' => 'nullable',
            'description' => 'required|string|max:200',
        ]);

        ProductsPersonalized::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'state_id' => 1,
            'user_id' => Auth::id(),
            'multimedia_id' => $request->multimedia_id,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }

    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            $productsPersonalized = productsPersonalized::all();
        } else {
            $productsPersonalized = productsPersonalized::where('user_id', Auth::id())->get();
        }

        return view('admin.storePersonalized.index', compact('productsPersonalized'));
    }

    public function toggleStatus($id)
    {
        $product = productsPersonalized::findOrFail($id);
        $product->state_id = $product->state_id == 1 ? 2 : 1;
        $product->save();

        return redirect()->back()->with('success', 'El estado ha sido actualizado.');
    }


}
