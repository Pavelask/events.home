<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateEventStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin\EventStatusModel::create([
            'name' => 'Активно',
            'sort' => '100',
        ]);
        \App\Models\Admin\EventStatusModel::create([
            'name' => 'Архивное',
            'sort' => '200',
        ]);
        \App\Models\Admin\EventStatusModel::create([
            'name' => 'Черновик',
            'sort' => '300',
        ]);
    }
}
