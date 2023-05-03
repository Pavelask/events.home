<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание мероприятия') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-splade-form method="post" :action="route('events.store')" preserve-scroll>
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="md:grid md:grid-cols-6 md:gap-6">

                                <div class="col-span-6 sm:col-span-6">
                                    <x-splade-input id="name" name="name" type="text" :label="__('Название мероприятия')"
                                                    autofocus
                                                    autocomplete="name"/>
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-splade-textarea id="description" name="description" :label="__('Описание мероприятия ')"
                                                       autosize/>
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-splade-input id="date_start" name="date_start" type="text" :label="__('Начало мероприятия ')"
                                                    date="{locale: 'ru', showMonths: 2, minDate: 'today', altInput: true, altFormat: 'F j, Y', dateFormat: 'Y-m-d',}"/>
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-splade-input id="date_end" name="date_end" type="text" :label="__('Окончание мероприятия ')"
                                                    date="{locale: 'ru', showMonths: 2, minDate: 'today', altInput: true, altFormat: 'F j, Y', dateFormat: 'Y-m-d',}"/>
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    {{--                    <x-splade-checkbox name="status" value="1" false-value="0"  :label="__('Мероприятие открыто')"/>--}}
                                    <x-splade-select name="event_type" :label="__('Тип мероприятия')" :options="$EventType"
                                                     option-label="name" option-value="id"/>
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    {{--                    <x-splade-checkbox name="status" value="1" false-value="0"  :label="__('Мероприятие открыто')"/>--}}
                                    <x-splade-select name="status" :label="__('Статус мероприятия')" :options="$Status"
                                                     option-label="name" option-value="id"/>
                                </div>
                                <div class="col-span-3 sm:col-span-3">
                                    <x-splade-input name="sort" type="text" placeholder="500" :label="__('Сортировка')"
                                                    autocomplete="status"/>
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <x-splade-textarea id="agreement" name="agreement" :label="__('Соглашение о персональных данных')"
                                                       autosize/>
                                </div>
                                <div class="col-span-6 sm:col-span-6">
                                    <div class="flex items-center gap-4">
                                        <x-splade-submit :label="__('Создать мероприятие')"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-splade-form>
                </div>
            </div>
            <div class="mt-4 flex">
                <a href="{{route('events.index')}}"
                   class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </div>
</x-app-layout>
