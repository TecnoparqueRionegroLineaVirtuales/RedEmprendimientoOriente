<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productsPersonalized extends Model
{
    use HasFactory;

    protected $table = 'products_personalized';
    protected $fillable = ['name', 'email', 'number', 'state_id', 'user_id', 'multimedia_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
