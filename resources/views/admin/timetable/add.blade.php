<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1 class="text-gray-500 font-bold text-lg">
            Добавить пункт
        </h1>
    </div>
    <x-splade-form method="post" :action="route('timetable.store', ['event' => $event, 'schedule' => $schedule])"
                   preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="col-span-2 sm:col-span-2">
                    <x-splade-input id="time" name="time" type="text" :label="__('Время')"
                                    autofocus/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="place" name="place" type="text" :label="__('Место проведения')"
                                    autocomplete="place"/>
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
