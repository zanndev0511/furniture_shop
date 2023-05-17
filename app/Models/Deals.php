<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'description',
        'days',
        'hours',
        'mins',
        'secs',
        'thumb',
        'url',
        'active',
    ];
}