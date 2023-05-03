<x-app-layout>
    <x-slot name="header">
        <p class="text-sm text-gray-800 leading-tight">
            ID: {{ __(  $Event->id ) }}
        </p>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div>
                        <p class="font-semibold text-lg uppercase text-gray-800 leading-tight">
                            {{ __(  $Event->name ) }}
                        </p>
                        <p class="text-sm text-gray-200 leading-tight">
                            {{ $Event->description }}
                        </p>
                        <p class="text-base text-gray-400 leading-tight">
                            Дата проведения мероприятия с {{ Carbon\Carbon::parse($Event->date_start)->translatedFormat('d.m.Y') }}
                            по {{ Carbon\Carbon::parse($Event->date_end)->format('d.m.Y') }}
                        </p>
                        <ul role="list"
                            class="mt-6 border-t border-b border-gray-200 py-6 grid grid-cols-2 gap-6 sm:grid-cols-2">
                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-pink-500">
                                        <!-- Heroicon name: outline/view-list -->
                                        <svg class="h-10 w-10 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                  d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-medium text-gray-900">
                                            <a href="{{ route('data.index', ['event' => $Event->id]) }}"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Мероприятие<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">
                                            Редактирование данных мероприятия
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-yellow-500">
                                        <!-- Heroicon name: outline/calendar -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-base font-medium text-gray-900">
                                            <a href="{{ route('news.index', $Event->id) }}" class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Новости<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">
                                            Создание и редактирование новостной ленты
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500">
                                        {{--                                        <x-heroicon-m-cursor-arrow-rays class="h-12 w-12 text-white"/>--}}
                                    </div>
                                    <div>
                                        <h3 class="text-s font-medium text-gray-900">
                                            <a href="#"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Какой-то другой раздел<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">Создание и редактирования раздела ....</p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-red-500">
                                        <!-- Heroicon name: outline/photograph -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-s font-medium text-gray-900">
                                            <a href="{{ route('moderator.index', $Event->id) }}"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Модераторы и спикеры мероприятия<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">Создание и редактирования раздела -
                                            модераторы.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-blue-500">
                                        <!-- Heroicon name: outline/view-boards -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-s font-medium text-gray-900">
                                            <a href="{{ route('guest.index', $Event->id) }}"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Приглашенные гости<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">
                                            Создание и редактирования раздела - приглашенные гости.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-indigo-500">
                                        <!-- Heroicon name: outline/table -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1  ">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-s font-medium text-gray-900">
                                            <a href="#"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Документы для скачивания<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">
                                            Загрузите документы в формате PDF
                                        </p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-purple-500">
                                        <!-- Heroicon name: outline/clock -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-s font-medium text-gray-900">
                                            <a href="#"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Фотогалерея<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">
                                            Загрузите фотоматериал в формате JPG.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="flow-root">
                                <div
                                    class="relative -m-2 p-2 flex items-center space-x-4 rounded-xl hover:bg-gray-50 focus-within:ring-2 focus-within:ring-indigo-500">
                                    <div
                                        class="flex-shrink-0 flex items-center justify-center h-14 w-14 rounded-lg bg-gradient-to-r from-purple-500 to-pink-500">
                                        <!-- Heroicon name: outline/clock -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-s font-medium text-gray-900">
                                            <a href="#}"
                                               class="focus:outline-none">
                                                <span class="absolute inset-0" aria-hidden="true"></span>
                                                Расписание<span aria-hidden="true"> &rarr;</span>
                                            </a>
                                        </h3>
                                        <p class="text-s text-gray-500">
                                            Расписание мероприятия</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="mt-4 flex">
                            <a href="{{ route('events.index') }}"
                               class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                                Или создайте новое мероприятие<span aria-hidden="true"> &rarr;</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
