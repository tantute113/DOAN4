<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartsave extends Model
{
    use HasFactory;

    protected $primaryKey = 'GH_MA';
    protected $table = 'giohang';
    protected $fillable = [
        'GH_MA',
        'SP_MA',
        'GH_SOLUONG',
        'TK_SDT'
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
