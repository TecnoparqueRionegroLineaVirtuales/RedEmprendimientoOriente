<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\User;
Use App\Models\products;

// Eeste modelo sirve para llevar cuenta de las interacciones de un usuario 
// a un producto de la tienda a través de la galería
class ProductInteraction extends Model
{
    use HasFactory;

    protected $table = 'product_interactions';
    protected $fillable = ['product_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(products::class, 'product_id');
    }
}