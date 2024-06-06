<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Platter extends Model
{
    use HasFactory;

    protected $casts = [
        'merchant_id' => 'integer',
        'price' => 'float',
        'discount' => 'float',
        'vat' => 'float',
        'status' => 'integer',
        'hot' => 'integer',
    ];

    protected $fillable = [
        'merchant_id',
        'name',
        'price',
        'discount',
        'vat',
        'image',
        'status',
        'hot',
    ];
     
    public function menu():BelongsToMany
    {
        return $this->belongsToMany(Menu::class(Menu::class, 'menu_platter', 'menu_id', 'platter_id'));
    }
}
