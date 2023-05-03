<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateFederalDistrict extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Центральный',
            'code' => 'ЦФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Северо-Западный',
            'code' => 'СЗФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Южный',
            'code' => 'ЮФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Северо-Кавказский',
            'code' => 'СКФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Приволжский',
            'code' => 'ПФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Уральский',
            'code' => 'УрФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Сибирский',
            'code' => 'СФО',
        ]);
        \App\Models\Admin\FederalDistrictModel::create([
            'name' => 'Дальневосточный',
            'code' => 'ДФО',
        ]);
    }
}
