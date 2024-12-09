<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        // Obtener todos los usuarios con sus roles
        $users = User::with('roles')->get();
        return view('admin.users.index', compact('users'));
    }
    
    public function makeEntrepreneur($id) {
        // Encuentra el usuario por ID
        $user = User::findOrFail($id);
        
        // Eliminar todos los roles actuales
        $user->syncRoles([]);
        
        // Asigna el rol de 'emprendedor' al usuario
        $user->assignRole('Emprendedor');
        
        // Redireccionar de nuevo a la página de usuarios con un mensaje de éxito
        return redirect()->route('usersIndex')->with('success', 'Usuario actualizado a emprendendor con éxito');
    }
    public function makeUser($id) {
        // Encuentra el usuario por ID
        $user = User::findOrFail($id);
        
        // Eliminar todos los roles actuales
        $user->syncRoles([]);
        
        // Asigna el rol de 'artista' al usuario
        $user->assignRole('user');
        
        // Redireccionar de nuevo a la página de usuarios con un mensaje de éxito
        return redirect()->route('usersIndex')->with('success', 'Usuario actualizado a usuario con éxito');
    }
    
    
}
