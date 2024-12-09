<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class personaldataController extends Controller
{
    public function edit($id) {
        $user = User::find($id);

        return view('admin.user.index', compact('user'));
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
    
        if ($request->hasFile('profile_photo_path')) {
            
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }
            
           
            $user->profile_photo_path = $request->file('profile_photo_path')->store('images', 'public');
        }
    
      
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->instagram = $request->input('instagram');
        $user->facebook = $request->input('facebook');
        $user->youtube = $request->input('youtube');
        $user->whatsapp = $request->input('whatsapp');
        $user->description = $request->input('description'); 
        $user->save();
    
        return redirect()->route('login')->with('success', 'Usuario actualizado correctamente');
    }
    
    
}
