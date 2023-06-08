<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $primaryKey = 'DG_MA';
    protected $table = 'danhgia';
    protected $fillable = [
        'DG_MA',
        'SP_MA',
        'TK_SDT',
        'DG_COMMENT',
        'DG_SAO'
    ];
    public $timestamps = false;
}
