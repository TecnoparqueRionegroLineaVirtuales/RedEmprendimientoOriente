<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;

    protected $table = 'bill';
    protected $fillable = ['id_transaction', 'ref_sale', 'ref_transaction', 'total', 'entity', 'date', 'user_id', 'address'];

    public function buyBills()
    {
        return $this->hasMany(buy_bill::class, 'bill_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}