<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateMemberStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Admin\MemberStatusModel::create([
            'name' => 'Ожидает подтверждения',
            'sort' => '100',
        ]);
        \App\Models\Admin\MemberStatusModel::create([
            'name' => 'Подтвержден',
            'sort' => '200',
        ]);
        \App\Models\Admin\MemberStatusModel::create([
            'name' => 'Заблокирован',
            'sort' => '300',
        ]);
    }
}
