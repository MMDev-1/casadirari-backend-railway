<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'logo',
        'email',
        'phone',
        'about_use',
        'copyright',
        'mobile_title',
        'mobile_content',
        'mobile_android',
        'mobile_ios'
    ];
}
