<?php

namespace App\Exports;

use App\DA\LaporanModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Laporan;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersLaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public function collection()
    {
        $data = LaporanModel::user_export();
        $return_data = [];

        foreach ($data as $k => $v) {
            $return_data[$k]['nik'] = $v->nik;
            $return_data[$k]['nama'] = $v->nama;
            $return_data[$k]['langkah'] = $v->langkah;
            $return_data[$k]['created_at'] = $v->created_at;
        }

        return collect($return_data);
    }

    public function headings(): array
    {
        return ['Nik', 'Nama', 'Langkah', 'Tanggal'];
    }
}
