<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;
    protected $table = 'multimedia';
    protected $fillable = ['name', 'description', 'url', 'gallery_id', 'user_id', 'status_id'];

    public function user()
       {
           return $this->belongsTo(User::class);
       }
}
