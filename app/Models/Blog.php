<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $fillable=[
        'title',
        'avatar',
        'approved',
        'body',
        'slug',
        'like',
    ];
    use HasFactory;
}
