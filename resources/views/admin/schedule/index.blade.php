<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Расписание ') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4">
            <div class="mb-4">
                <div class="mt-3">
                    <Link modal href="{{ route('schedule.create', ['event' => $Event]) }}"
                          class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Добавить день расписания
                    </Link>

                </div>
            </div>
            <div class="p-2 bg-white border-b border-gray-200 shadow-sm rounded-lg">
                @foreach($Schedule as $day)
                    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
                        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-2">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">{{$day->week}}
                                    , {{$day->alt_data}}</h3>
                                <p class="text-sm leading-6 text-gray-300 py-1"><span
                                        class="font-bold text-xs pr-2 text-gray-900">ID: {{$day->id}}</span><span
                                        class="font-bold text-xs pr-2 text-gray-900">SORT: {{$day->sort}}</span>{{$day->date}}
                                </p>
                                <span class="leading-6">
                                    <Link modal
                                          href="{{ route('schedule.edit', ['event' => $Event, 'schedule' => $day->id]) }}"
                                          class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Редактировать
                                    </Link>
                                </span>
                                <span>
                                    <Link confirm-danger="ВНИМАНИЕ! Вы хотите удалить запись?"
                                          confirm-button="Удалить"
                                          cancel-button="Отмена"
                                          href="{{ route('schedule.destroy', ['event' => $Event, 'schedule' => $day->id]) }}"
                                          method="DELETE"
                                          class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Удалить
                                    </Link>
                                </span>
                            </div>
                            <div class="ml-4 mt-2 flex-shrink-0">
                                <Link modal
                                      href="{{ route('timetable.create', ['event' => $Event, 'schedule' => $day->id]) }}"
                                      class="relative inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Создать пункт
                                </Link>
                            </div>
                        </div>
                        <x-splade-lazy>
                            <x-slot:placeholder>
                                Загружаем расписание ...
                            </x-slot:placeholder>
                            <x-splade-defer method="GET"
                                            url="{{ route('timetable.index', ['event' => $Event, 'schedule' => $day->id]) }}">

                                <template v-for="item in response">
                                    {{--                                <p>@{{item.id}}</p>--}}

                                    <ul role="list" class="divide-y divide-gray-100 pt-2">
                                        <li class="flex justify-between gap-x-6 py-5 bg-gray-50 p-4 rounded-lg shadow-sm">
                                            <div class="flex gap-x-4">
                                                <div class="min-w-0 flex-auto max-w-2xl">
                                                    <p class="text-base font-semibold leading-6">
                                                        <span v-text="item.time" class="text-gray-900"></span> <span
                                                            v-text="item.place" class="text-indigo-600"></span>
                                                    </p>
                                                    <p class="mt-1 truncate text-base leading-5 text-gray-500 whitespace-normal">
                                                        @{{item.description}}
                                                    </p>
                                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500 flex flex-row">
                                                        ID: <span class="pr-2">@{{item.id}}</span>
                                                        Сортировка: <span class="pr-2">
                                                        @{{item.sort}}
                                                    </span>
                                                        <span class="pr-2">
                                                    Отображение на сайте:
                                                    </span>
                                                        <x-far-check-circle v-if="item.active == 1"
                                                                            class="w-4 h-4 text-green-500"/>
                                                        <x-far-times-circle v-if="item.active == 0"
                                                                            class="w-4 h-4 text-red-500"/>
                                                    </p>
                                                </div>
                                            </div>
                                            {{--                                        <a v-bind:href="'schedule/'+{{$day->id}}+'/timetable/'+item.id+'/edit'">LINK'S</a>--}}
                                            <div class="hidden sm:flex sm:flex-col sm:items-end">
                                                <p class="text-sm leading-6 text-gray-900">

                                                    <Link modal
                                                          v-bind:href="'schedule/'+{{$day->id}}+'/timetable/'+item.id+'/edit'"
                                                          class="inline-flex items-center px-2 py-1 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Редактировать
                                                    </Link>

                                                    <Link confirm-danger="ВНИМАНИЕ! Вы хотите удалить запись?"
                                                          confirm-button="Удалить"
                                                          cancel-button="Отмена"
                                                          {{--                                                      href="{{ route('schedule.destroy', ['event' => $Event, 'schedule' => $day->id]) }}"--}}
                                                          v-bind:href="'schedule/'+{{$day->id}}+'/timetable/'+item.id"
                                                          method="DELETE"
                                                          class="ml-3 inline-flex items-center px-2 py-1 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Удалить
                                                    </Link>
                                                </p>
                                            </div>
                                        </li>
                                    </ul>


                                </template>
                            </x-splade-defer>
                        </x-splade-lazy>
                    </div>
                @endforeach

            </div>
            <div class="mt-4 flex">
                <a href="{{route('events.show', $Event)}}"
                   class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </div>

</x-app-layout>
