<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
class importproduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'SP_MA'=>$row[0],
            'SP_TEN'=>$row[1],
            'SP_GIA'=>$row[2],
            'SP_ANH'=>$row[3],
            'SP_MOTA'=>$row[4],
            'DM_MA'=>$row[5]
        ]);
    }
}
