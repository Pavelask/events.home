<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1 class="text-gray-500 font-bold text-lg">
            Статус мероприятия - редактирование
        </h1>
    </div>
    <x-splade-form method="PUT" :default="$eventsstatus" :action="route('eventsstatus.update', $eventsstatus->id)" preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input name="name" type="text" :label="__('Название статуса')"
                                    autofocus
                                    autocomplete="name"/>
                </div>
                <div class="col-span-3 sm:col-span-3">
                    <x-splade-input name="sort" type="text" :label="__('Сортировка')"
                                    autocomplete="sort"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="flex items-center gap-4">
                        <x-splade-submit :label="__('Сохранить')"/>
                    </div>
                </div>
            </div>
        </div>
    </x-splade-form>
</x-splade-modal>
