<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
    protected $fillable = [
        'section',
        'title',
        'description',
        'button_text',
        'button_link',
        'image',
    ];
}