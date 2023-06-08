<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

   
    use HasFactory;
    protected $primaryKey = 'SP_MA';
    protected $table = 'sanpham';
    protected $fillable = [
        'SP_MA',
        'SP_TEN',
        'SP_GIA',
        'SP_ANH',
        'SP_MOTA',
        'DM_MA'
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
    // public static function getProduct()
    // {
      
    //     $test =DB::select('select * from tbl_product');
    //    return $test ;
    // }
}
?>