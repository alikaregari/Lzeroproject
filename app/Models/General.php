<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    public $fillable=[
        'title',
        'sub_title',
        'header_movie',
        'us_title',
        'us_sub',
        'us_link',
        'service_title',
        'service_sub',
        'service_link',
        'service_one_title',
        'service_one_sub',
        'service_tow_title',
        'service_tow_sub',
        'service_three_title',
        'service_three_sub',
    ];
    use HasFactory;
}
