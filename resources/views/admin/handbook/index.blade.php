<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Справочники') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="max-w-lg mx-auto">
                        <h2 class="text-lg font-medium text-gray-900">Список справочников</h2>
                        <p class="mt-1 text-sm text-gray-500">Справочники, служебные таблицы, вспомогательные базы
                            данных для разных проектов.</p>
                        <ul role="list" class="mt-6 border-t border-b border-gray-200 divide-y divide-gray-200">

                            <li class="hover:bg-gray-50 p-2 rounded-lg">
                                <div class="relative group py-4 flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                      <span
                                          class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-lime-500">
                                          <x-fas-list-check class="text-white h-8 w-8"/>
                                      </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-base font-medium text-gray-900">

                                            <a href="{{ route('territorial_organizations.index') }}" class="">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Список терреториальных организаций
                                            </a>

                                        </div>
                                        <p class="text-sm text-gray-500">Импорт из CSV, редактирование ...</p>
                                    </div>

                                    <div class="flex-shrink-0 self-center">

                                    </div>
                                </div>
                            </li>

                            <li class="hover:bg-gray-50 p-2 rounded-lg">
                                <div class="relative group py-4 flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                      <span
                                          class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-lime-500">
                                          <x-fas-map-location-dot class="text-white h-8 w-8"/>
                                      </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="{{route('federaldistrict.index')}}">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Список федеральных округов
                                            </a>
                                        </div>
                                        <p class="text-sm text-gray-500">
                                            Импорт из CSV, редактирование ...
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 self-center">

                                    </div>
                                </div>
                            </li>

                            <li class="hover:bg-gray-50 p-2 rounded-lg">
                                <div class="relative group py-4 flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                      <span
                                          class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-lime-500">
                                          <x-fas-school-circle-exclamation class="text-white h-8 w-8"/>
                                      </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="{{ route('eventstypes.index') }}">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Тип мероприятия
                                            </a>
                                        </div>
                                        <p class="text-sm text-gray-500">
                                            Добавление,удаление, редактирование ...
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 self-center">

                                    </div>
                                </div>
                            </li>

                            <li class="hover:bg-gray-50 p-2 rounded-lg">
                                <div class="relative group py-4 flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-lime-500">
                                          <x-fas-user-tie class="text-white h-8 w-8"/>
                                      </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="{{ route('memberstatus.index') }}">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Статус участника
                                            </a>
                                        </div>
                                        <p class="text-sm text-gray-500">
                                            Добавление,удаление, редактирование ...
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 self-center">

                                    </div>
                                </div>
                            </li>

                            <li class="hover:bg-gray-50 p-2 rounded-lg">
                                <div class="relative group py-4 flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                      <span
                                          class="inline-flex items-center justify-center h-10 w-10 rounded-lg bg-lime-500">
                                          <x-fas-question-circle class="text-white h-8 w-8"/>
                                      </span>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="text-sm font-medium text-gray-900">
                                            <a href="{{ route('faq.index') }}">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Вопрос - ответ
                                            </a>
                                        </div>
                                        <p class="text-sm text-gray-500">
                                            Часто задаваемые вопросы пользователей и не только ...
                                        </p>
                                    </div>
                                    <div class="flex-shrink-0 self-center">

                                    </div>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
