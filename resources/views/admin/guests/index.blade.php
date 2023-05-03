<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Приглашенные на мероприятие') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4">
            <div class="mb-4">
                <div class="mt-3">
                    <Link href="{{ route('guest.create', ['event' => $Event]) }}"
                          class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Добавить приглашенных гостей
                    </Link>

                </div>
            </div>
            <div class="p-2 bg-white border-b border-gray-200 shadow-sm rounded-lg">
                <x-splade-table :for="$Guests">
                    <x-splade-cell image class="hover:bg-indigo-700">
                        @if($item->image)
                            <img src="{{ Storage::url('guests/'.$item->image) }}" class="w-20">
                        @endif
                        @if(!$item->image)
                            <img src="{{ url('img/no_photo.png') }}" width="120">
                        @endif
                    </x-splade-cell>
                    <x-splade-cell active class="hover:bg-indigo-700">
                        {{$item->active}}
                    </x-splade-cell>
                    <x-splade-cell edit class="w-4 hover:bg-indigo-700">
                        <Link
                            href="{{ route('guest.edit', ['event' => $item->events_id, 'guest' => $item->id]) }}">
                        Edit
                        </Link>
                    </x-splade-cell>
                    <x-splade-cell delete class="w-4 bg-gray-200 justify-self-start">
                        <div class="justify-self-start">
                            <Link
                                confirm-danger="ВНИМАНИЕ!"
                                confirm-text="Вы хотите удалить запись?"
                                confirm-button="Удалить"
                                cancel-button="Отмена"
                                href="{{ route('guest.destroy', ['event' => $item->events_id, 'guest' => $item->id]) }}"
                                method="DELETE">
                            Delete
                            </Link>
                        </div>
                    </x-splade-cell>
                </x-splade-table>
            </div>
            <div class="mt-4 flex">
                <a href="{{route('events.show', $Event)}}"
                   class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </div>

</x-app-layout>
