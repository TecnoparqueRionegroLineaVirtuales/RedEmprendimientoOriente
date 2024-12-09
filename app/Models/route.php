<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class route extends Model
{
    use HasFactory;

    protected $table = 'route';
    protected $fillable = ['name', 'description', 'contact', 'url', 'pdf_url', 'status_id'];
}
