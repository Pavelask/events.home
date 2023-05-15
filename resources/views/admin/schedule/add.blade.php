<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1 class="text-gray-500 font-bold text-lg">
            Добавить расписание
        </h1>
    </div>
    <x-splade-form method="post" :action="route('schedule.store', $event)" preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="col-span-3 sm:col-span-3">
                    <x-splade-input id="date" name="date" type="text" :label="__('Дата расписания')"
                                    autofocus
                                    date="{ locale: 'ru',
                                            showMonths: 1,
                                            altInput: true,
                                            altFormat: 'd.m.Y',
                                            dateFormat: 'Y-m-d',
                                            }"/>
                </div>
                <div class="col-span-3 sm:col-span-3">
                    <x-splade-input id="alt_data" name="alt_data" type="text" :label="__('Дата для сайта (12 мая 2023)')"
                                    autocomplete="alt_data"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="week" name="week" type="text" :label="__('День недели')"
                                    autocomplete="week"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-textarea  name="description" :label="__('Примечание')"
                                        autosize/>
                </div>
                <div class="col-span-3 sm:col-span-3">
                    <x-splade-input name="sort" type="text" placeholder="500"  :label="__('Сортировка')"
                                    autocomplete="sort"/>
                </div>
                <div class="col-span-3 sm:col-span-4">
                    <x-splade-checkbox name="active" value="1"
                                       :label="__('Показывать на сайте')"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="flex items-center gap-4">
                        <x-splade-submit :label="__('Добавить')"/>
                        <button type="button" @click="modal.close">Отмена</button>
                    </div>
                </div>
            </div>
        </div>
    </x-splade-form>
</x-splade-modal>
