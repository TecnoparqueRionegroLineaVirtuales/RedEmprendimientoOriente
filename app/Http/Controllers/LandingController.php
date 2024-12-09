<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Multimedia;
use App\Models\User;
use App\Models\products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function welcome(){
        $user = User::role('admin')->first();
        return view('welcome', compact('user'));
    }

    public function app(){
        return view('app');
    }
    
    public function gallery(){
        $gallery = Gallery::all();
        return view('gallery', compact('gallery'));
    }
    
    public function viewGallery($id)
    {
        $multimedia = Multimedia::where('gallery_id', $id)->with('user')->get();
        return view('viewGallery', compact('multimedia'));
    }
    
    public function viewEntrepreneur()
    {
        $user = User::role('Emprendedor')->get();
        return view('Entrepreneur', compact('user'));
    }
    
    public function info()
    {
        $users = User::role('admin')->get();

        // Procesar las URLs para extraer el video_id
        $users->transform(function ($user) {
            $youtubeUrl = $user->youtube; // Campo que contiene la URL de YouTube

            // Verificar y extraer el video_id según el formato de la URL
            if (strpos($youtubeUrl, 'youtu.be') !== false) {
                $videoId = substr(parse_url($youtubeUrl, PHP_URL_PATH), 1);
            } elseif (strpos($youtubeUrl, 'youtube.com/watch') !== false) {
                parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $queryParams);
                $videoId = $queryParams['v'] ?? null;
            } else {
                $videoId = null; // Si no es una URL válida de YouTube
            }

            // Asignar el video_id al usuario
            $user->video_id = $videoId ?? 'default_video_id';

            return $user;
        });

        return view('info', compact('users'));
    }

    public function store(){
        $products = products::all();
        return view('store', compact('products'));
    }

    public function viewProduct($id)
    {
        $product = products::with('category')->find($id);
        return view('detailProductClient', compact('product'));
    }

}
