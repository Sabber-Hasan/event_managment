<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'company_name',
        'phone',
        'trade_license',
        'account_type',
        'account_num',
        'address',
        'city',
        'site_url',
        'logo',
        'status',
    ];
    
}
