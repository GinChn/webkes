<?php

namespace App\Exports;

use App\DA\LaporanModel;
use App\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminLaporanExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return LaporanModel::admin_laporan();
    }
}
