<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buys;

class buy_bill extends Model
{
    use HasFactory;

    protected $table = 'buy_bill';
    protected $fillable = ['bill_id', 'buy_id'];

    public function bill()
    {
        return $this->belongsTo(bill::class, 'bill_id');
    }

    public function buys()
    {
        return $this->belongsTo(Buys::class, 'buy_id')->with('product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}