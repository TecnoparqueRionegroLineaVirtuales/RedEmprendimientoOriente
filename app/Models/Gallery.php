<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'gallery';
    protected $fillable = ['name', 'description', 'url', 'user_id', 'status_id'];

    public function state() {
        return $this->belongsTo(State::class, 'status_id');
    }
}
