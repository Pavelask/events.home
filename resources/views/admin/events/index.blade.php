<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Управление мероприятиями') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="mb-1">
                    <Link modal href="{{route('events.create')}}"
                          class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Добавить мероприятие
                    </Link>
                </div>
                <x-splade-table :for="$Events">
                    <x-splade-cell name class="">
                        <div class="whitespace-normal font-semibold text-base text-gray-700">
                            <Link href="{{ route('events.show', ['event' => $item->id]) }}">
                            <span>{{ $item->name }}</span>
                            </Link>
                        </div>
                    </x-splade-cell>
                    <x-splade-cell edit class="hover:bg-indigo-700 grid justify-items-end ">
                        <Link href="{{ route('events.edit', $item->id) }}"
                              class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Редактировать
                        </Link>
                    </x-splade-cell>
                    <x-splade-cell show class="w-4 bg-gray-200">
                        <Link href="{{ route('events.show', ['event' => $item->id]) }}">
                        <x-fas-person-walking-dashed-line-arrow-right class="w-10 h-10"/>
                        </Link>
                    </x-splade-cell>
                    <x-splade-cell delete class="w-4 bg-gray-200">
                        <Link
                            confirm-danger="ВНИМАНИЕ! Вы хотите удалить запись?"
                            confirm-text="Удаляя мероприятие, вы удаляете все данные, связанные данные с ним!"
                            confirm-button="Удалить"
                            cancel-button="Отмена"
                            href="{{ route('events.destroy', $item->id) }}" method="DELETE"
                            class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-500 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Удалить
                        </Link>
                    </x-splade-cell>
                </x-splade-table>
            </div>

        </div>
    </div>
</x-app-layout>
