<?php

namespace App\Imports;

use App\Models\Timbangan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TimbanganImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);

        if ($row['tanggal'] == 'Wajib') {
            return null;
        }

        $unix_date = ($row['tanggal'] - 25569) * 86400;
        $tanggal = date("Y-m-d", $unix_date);

        $time_in = $row['jam_in'] * 86400;
        $jam_in = date('H:i', $time_in);

        $time_out = $row['jam_out'] * 86400;
        $jam_out = date('H:i', $time_out);

        $time_dur = $row['waktu_pengisian'] * 86400;
        $waktu_pengisian = date('H:i', $time_dur);

        return new Timbangan([
            //
            'tanggal' => $tanggal,
            'kode_plant' => $row['kode_plant'],
            'nama_spbe' => $row['nama_spbe'],
            'wilayah' => $row['wilayah'],
            'no_spa' => $row['no_spa'],
            'status_spa' => $row['status_spa'],
            'rencana_muat' => $row['rencana_muat'],
            'no_pol' => $row['no_pol'],
            'sopir' => $row['sopir'],
            'po_number' => $row['po_number'],
            'no_lo' => $row['no_lo'],
            'weight_out' => $row['weight_out'],
            'weight_in' => $row['weight_in'],
            'netto' => $row['netto'],
            'roto_gauge' => $row['roto_gauge'],
            'no_segel_liquid' => $row['no_segel_liquid'],
            'no_segel_vapour' => $row['no_segel_vapour'],
            'no_segel_box' => $row['no_segel_box'],
            'jam_in' => $jam_in,
            'jam_out' => $jam_out,
            'waktu_pengisian' => $waktu_pengisian,
            'mysap' => $row['mysap']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
