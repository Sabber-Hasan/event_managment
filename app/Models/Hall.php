<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hall extends Model
{
    use HasFactory;
    protected $fillable = [
        'merchant_id',
        'name',
        'capacity',
        'description',
        'price',
        'discount',
        'vat',
        'image',
        'status',
        'hot',
    ];

    public function merchant():BelongsTo
    {
        return $this->belongsTo(Merchant::class);
    }
}
