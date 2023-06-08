<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vnpay extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_vnpay';
    protected $table = 'vnpay';
    protected $fillable = [
        'id_vnpay',
        'vnp_amount',
        'vnp_bankcode',
        'vnp_orderinfo',
        'vnp_paydate',
        'HD_MA'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    // protected $hidden = [
    //     'TK_MATKHAU'
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public $timestamps = false;
}
