<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buys extends Model
{
    use HasFactory;

    protected $table = 'buys';
    protected $fillable = ['product_id', 'total', 'date'];

    public function product()
    {
        return $this->belongsTo(products::class, 'product_id');
    }
}