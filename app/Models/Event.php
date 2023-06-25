<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    /**
     * Estou informnado para o Laravel que o items é um array (o Laravel entede por default que receberá uma string)
     */
    protected $casts = [
        'items' => 'array'
    ];
    protected $fillable = ['title', 'description', 'city', 'private', 'image', 'items'];
}
