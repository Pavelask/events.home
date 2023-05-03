<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1 class="text-gray-500 font-bold text-lg">
            Добавить тип мероприятия
        </h1>
    </div>
    <x-splade-form method="post" :action="route('eventstypes.store')" preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="name" name="name" type="text" :label="__('Название ')"
                                    autofocus
                                    autocomplete="name"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="slug" name="slug" type="text" :label="__('SLUG')"
                                    autocomplete="slug"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-textarea  name="description" :label="__('Примечание')"
                                        autosize/>
                </div>
                <div class="col-span-3 sm:col-span-3">
                    <x-splade-input name="sort" type="text" placeholder="500"  :label="__('Сортировка')"
                                    autocomplete="status"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <div class="flex items-center gap-4">
                        <x-splade-submit :label="__('Добавить')"/>
                    </div>
                </div>
            </div>
        </div>
    </x-splade-form>
</x-splade-modal>
