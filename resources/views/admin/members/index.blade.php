<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Зарегистрированые участники') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-4">
            <div class="mb-4">
                <x-splade-table :for="$Members">
                    {{--                    <x-slot name="head">--}}
                    {{--                        <tr>--}}
                    {{--                            @foreach($Members->columns() as $column)--}}
                    {{--                                <th class="text-base font-normal py-4 bg-gray-50 text-gray-500">--}}
                    {{--                                    {{ $column->label }}--}}
                    {{--                                </th>--}}
                    {{--                            @endforeach--}}
                    {{--                        </tr>--}}
                    {{--                        </thead>--}}
                    {{--                    </x-slot>--}}
                    <x-splade-cell surName class="w-4 hover:bg-indigo-700">
                        <div class="grid justify-items-start">
                            <div class="text-gray-300 text-sm">
                                {{ $item->eventsName }}
                            </div>
                            <div class="py-1 text-lg font-bold text-slate-600">
                                {{$item->surName}} {{ $item->firstName }} {{ $item->middleName }}
                            </div>
                            <div class="text-gray-900 text-sm">
                                Электроная почта: <span class="font-bold text-slate-600">{{ $item->email }}</span>
                            </div>
                            <div class="text-gray-900 text-sm">
                                СНИЛС: <span class="font-bold text-slate-600">{{ $item->snils }}</span>
                            </div>
                            <div class="text-gray-900 text-sm">
                                Контактный номер: <span
                                    class="font-bold text-slate-600">+7{{ $item->contactPhone  }}</span>
                            </div>
                        </div>
                    </x-splade-cell>

                    <x-splade-cell confirmation>
                        <div class="grid justify-items-center">
                            {{ $item->confirmation }}
                        </div>
                    </x-splade-cell>

                    <x-splade-cell edit class="w-4 hover:bg-indigo-700">
                        <div class="grid justify-items-center">
                            <div>
                                <Link href="{{ route('members.edit', $item->id) }}">
                                Edit
                                </Link>
                            </div>
                        </div>
                    </x-splade-cell>
                    <x-splade-cell delete class="w-4 hover:bg-indigo-700">
                        <div class="grid justify-items-center">
                            <Link
                                confirm-danger="ВНИМАНИЕ!"
                                confirm-text="Вы хотите удалить участника мероприятия?"
                                confirm-button="Удалить"
                                cancel-button="Отмена"
                                href="{{ route('members.destroy', $item->id) }}" method="DELETE"
                                class="">
                            Delete
                            </Link>
                        </div>
                    </x-splade-cell>

                </x-splade-table>

            </div>
        </div>
    </div>
</x-app-layout>
