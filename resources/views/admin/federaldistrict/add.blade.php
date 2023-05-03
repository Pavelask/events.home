<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1 class="text-gray-500 font-bold text-lg">
            Добавить федеральный округ
        </h1>
    </div>
    <x-splade-form method="post" :action="route('federaldistrict.store')" preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">

                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="name" name="name" type="text" :label="__('Название округа')"
                                    autofocus
                                    autocomplete="name"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input id="code" name="code" type="text" :label="__('Код')"
                                    autocomplete="code"/>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-textarea  name="description" :label="__('Примечание')"
                                        autosize/>
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
