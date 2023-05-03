<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateEventTypes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin\EventTypesModel::create([
            'name' => 'Слёт молодёжи',
            'slug' => 'meeting',
        ]);
        \App\Models\Admin\EventTypesModel::create([
            'name' => 'Семинар-совещание председателей ППО',
            'slug' => 'ppo',
        ]);
        \App\Models\Admin\EventTypesModel::create([
            'name' => 'Президиум',
            'slug' => 'presidium',
        ]);
        \App\Models\Admin\EventTypesModel::create([
            'name' => 'Пленум',
            'slug' => 'plenum',
        ]);
        \App\Models\Admin\EventTypesModel::create([
            'name' => 'Съезд',
            'slug' => 'congress',
        ]);
        \App\Models\Admin\EventTypesModel::create([
            'name' => 'Другое',
            'slug' => 'other',
        ]);
    }
}
