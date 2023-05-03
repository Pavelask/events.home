<x-splade-modal>
    <div class="col-span-6 sm:col-span-6">
        <h1>Федеральный окргу - редактирование</h1>
    </div>
    <x-splade-form method="PUT" :default="$FederalFistrict" :action="route('federaldistrict.update', $FederalFistrict->id)" preserve-scroll>
        <div class="bg-white px-1 pt-2 pb-2 sm:p-2 sm:pb-2">
            <div class="md:grid md:grid-cols-6 md:gap-6">

                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input name="name" type="text" :label="__('Название округа')"
                                    value="{{ old('name', $FederalFistrict->name ) }}"
                                    autofocus
                    />
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-input name="code" type="text" :label="__('Код')"
                                    value="{{ old('name', $FederalFistrict->code ) }}"
                    />
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-splade-textarea name="description" :label="__('Примечание')"
                                       value="{{ old('name', $FederalFistrict->description ) }}"
                                       autosize/>
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
