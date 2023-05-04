<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-lime-500 leading-tight">
            Редактирование данных о мероприятии
        </h2>
        <h2 class="font-semibold text-xl text-gray-500 leading-tight">
            {{ $Event->name }}
        </h2>
        <span class="block text-gray-500">
            Дата проведения мероприятия с {{ Carbon\Carbon::parse($Event->date_start)->translatedFormat('d.m.Y') }} по {{ Carbon\Carbon::parse($Event->date_end)->format('d.m.Y') }}
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-4 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Информация о мероприятии
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Баннер на главную, речь шефа, карта проезда, адрес провдения и так далее ...
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-3">
                        <x-splade-form method="PUT" :action="route('data.update', ['event' => $Event->id, 'data' => $Data->id])"
                                       :default="$Data"
                                       preserve-scroll>
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input type="hidden" v-model="form.events_id"/>
                                            <x-splade-file  id="image" name="image" filepond preview
                                                            min-size="100KB" max-size="5MB"
                                                            :label="__('Фото к приветствию')"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-textarea name="info"
                                                               :label="__('Приветствие')"
                                                               autosize/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-file  name="banner" filepond preview
                                                            min-size="100KB" max-size="5MB"
                                                            :label="__('Баннер на главную')"/>
                                        </div>

                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="contacts" name="contacts" type="text"
                                                            :label="__('Контатная информация')"
                                                            autocomplete="contacts"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="locate" name="locate" type="text"
                                                            :label="__('Место проведения')"
                                                            autocomplete="locate"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="adress" name="adress" type="text"
                                                            :label="__('Адрес проведения')"
                                                            autocomplete="adress"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="shema" name="shema" type="text"
                                                            :label="__('Схема')"
                                                            autocomplete="shema"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-textarea name="map"
{{--                                            <x-splade-input id="map" name="map" type="text"--}}
                                                            :label="__('Карта проезда')"
                                                               autosize/>
                                        </div>
                                    </div>
                                    <div class="mt-4 px-4 py-3 bg-gray-50 sm:text-right sm:px-6 rounded-lg">
                                        <x-splade-submit :label="__('Сохранить')"/>
                                    </div>
                                    <div class="mt-4 flex">
                                        <a href="{{ route('events.show', $Event->id) }}"
                                           class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                                            Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
                                    </div>
                                </div>

                            </div>
                        </x-splade-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
