<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class FruitItem extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'fruit_item';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'code',
        'name',
        'unit',
        'price',
        'stock'
    ];
}