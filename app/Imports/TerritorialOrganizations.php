<?php

namespace App\Imports;

use App\Models\Admin\TerritorialOrganizationsModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class TerritorialOrganizations implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new TerritorialOrganizationsModel([
            'name' => $row[0],
            'code' => $row[1],
        ]);
    }
}
