<?php

namespace App\Exports;

use App\DA\BmiModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BmiExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    public function collection()
    {
        $data = BmiModel::bmi();
        $return_data = [];

        foreach ($data as $k => $v) {
            $return_data[$k]['nik'] = $v->nik;
            $return_data[$k]['nama'] = $v->nama;
            $return_data[$k]['berat_badan'] = $v->berat_badan;
            $return_data[$k]['tinggi_badan'] = $v->tinggi_badan;
            $return_data[$k]['keterangan'] = $v->keterangan;
            $return_data[$k]['created_at'] = $v->created_at;
        }

        return collect($return_data);
    }

    public function headings(): array
    {
        return ['Nik', 'Nama', 'Berat Badan', 'Tinggi Badan', 'Keterangan', 'Tanggal'];
    }
}
