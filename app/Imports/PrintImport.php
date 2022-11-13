<?php

namespace App\Imports;

use App\Models\id_printings;
use Maatwebsite\Excel\Concerns\ToModel;

class PrintImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new id_printings([
            //
        ]);
    }
}
