<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\ThoiKhoaBieu;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ThoiKhoaBieuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ThoiKhoaBieu([
            'thu' => $row['thu'],
            'phong_id' => $row['phong_id'],
            'monhoc_id' => $row['monhoc_id'],
            'tiet_id' => $row['tiet_id'],
            'soluongmaysudung' => $row['soluongmaysudung'],
            'hocky_id' => $row['hocky_id'],
        ]);
    }
}
