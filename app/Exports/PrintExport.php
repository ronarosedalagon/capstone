<?php

namespace App\Exports;

use App\Models\id_printing;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PrintExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $stat = 'pending';
        
        return view('exports.print',[
            'print' => id_printing::all()->where('status','=',$stat)
        ]);
    }
}
