<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailbill extends Model
{
    use HasFactory;
    protected $primaryKey = 'CTHD_MA';
    protected $table = 'chitiethoadon';
    protected $fillable = [
        'CTHD_MA',
        'HD_MA',
        'SP_MA',
        'CTHD_DONGIA',
        'CTHD_SOLG'
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
