<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MobileSection extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'mobile_title',
        'mobile_content',
        'mobile_android',
        'mobile_ios'
    ];
}
