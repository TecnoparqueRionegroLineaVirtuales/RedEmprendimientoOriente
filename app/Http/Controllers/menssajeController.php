<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;

class menssajeController extends Controller
{

    public function index()
    {
        return view('message');
    }

    public function indexMenssage()
    {
        $message = message::all();

        return view('admin.menssage.index', compact('message'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'number' => 'required|string|max:200',
            'description' => 'required|string|max:200',
        ]);

        message::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Solicitud enviada exitosamente.');
    }

    public function destroy($id)
    {
        $message = message::find($id);

        $message->delete();

        return redirect()->route('indexMessage')->with('success', 'Mensaje eliminado correctamente');
    }
}
