<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Модераторы или спикеры мероприятия - добавление') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-10 sm:mt-0">

                <x-splade-form method="POST" :action="route('moderator.store', ['event' => $Event])" preserve-scroll enctype="multipart/form-data">
                    <div class="bg-white px-6 pt-2 pb-2 sm:p-2 sm:pb-2 rounded-lg py-6">
                        <div class="md:grid md:grid-cols-6 md:gap-6">
                            <div class="col-span-6 sm:col-span-6">
                                <x-splade-input name="name" type="text" :label="__('ФИО модератора или спикера ')"
                                                autofocus
                                                autocomplete="name"/>
                            </div>
                            <div class="col-start-1 col-span-6 sm:col-span-6">

                                <x-splade-file id="image" name="image" filepond preview
                                               :label="__('Фотокарточка')"/>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <x-splade-textarea :label="__('Должность, место работы и т.д.')"
                                                   autosize/>
                            </div>
                            <div class="col-span-3 sm:col-span-3">
                                <x-splade-input name="sort" type="text" placeholder="500" :label="__('Сортировка')"
                                                autocomplete="status"/>
                            </div>
                            <div class="col-span-3 sm:col-span-4">
                                <x-splade-checkbox name="active" value="1"
                                                   :label="__('Показывать модератора или спикера на сайте')"/>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <div class="flex items-center gap-4">
                                    <x-splade-submit :label="__('Добавить')"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-splade-form>
                <div class="mt-4 flex">
                    <a href="{{ route('moderator.index', ['event' => $Event] ) }}"
                       class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                        Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
