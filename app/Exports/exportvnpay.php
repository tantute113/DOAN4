<?php

namespace App\Exports;

use App\Models\Vnpay;
use Maatwebsite\Excel\Concerns\FromCollection;

class exportvnpay implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vnpay::all();
    }
}