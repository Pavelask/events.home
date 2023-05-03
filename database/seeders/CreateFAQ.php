<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateFAQ extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Admin\EventFaqModel::create([
            'question' => 'Какие поля нужно заполнять?',
            'answer' => 'Поля отмеченные * обязательно для заполнения!.',
        ]);
        \App\Models\Admin\EventFaqModel::create([
            'question' => 'Как заполнить поля с датой?',
            'answer' => 'Поля с датой (как пример - дата рождения) заполняются в автоматически. Дату рождения необходимо выбрать в выпадающем календаре. В данное поле нельзя вставить произвольный формат даты!',
        ]);
        \App\Models\Admin\EventFaqModel::create([
            'question' => 'Как оперативно можно получить помощь?',
            'answer' => 'Для связи можно написать письмо в службу поддержки или в WhatsApp по номер +7 915 041-43-27!',
        ]);
    }
}
