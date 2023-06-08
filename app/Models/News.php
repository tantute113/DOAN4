<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $primaryKey = 'TT_MA';
    protected $table = 'tintuc';
    protected $fillable = [
        'TT_MA',
        'TT_TEN',
        'TT_HINHANH',
        'TT_NOIDUNG',
        'MGG_MA'
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
?>