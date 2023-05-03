<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Справочник федеральных округов') }}
        </h2>
    </x-slot>

    <div class="py-1">
        <div class="max-w-4xl mx-auto sm:px-2 lg:px-4">
            <div class="mb-4">
                <div class="mt-3">
                    <Link modal href="{{route('federaldistrict.create')}}"
                          class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Добавить округ ( а вдруг ? )
                    </Link>

                </div>
            </div>

            <div class="p-2 bg-white border-b border-gray-200 shadow-sm ">
                <x-splade-table :for="$FederalDistrict">

                    <x-splade-cell edit class="w-4 hover:bg-indigo-700">
                        <Link modal href="{{ route('federaldistrict.edit', $item->id) }}"
                              class="text-indigo-500 font-bold hover:text-indigo-800">
                        Редактировать
                        </Link>
                    </x-splade-cell>
                    <x-splade-cell delete class="w-4 flex items-center bg-gray-200">
                        <Link
                            confirm-danger="ВНИМАНИЕ!"
                            confirm-text="Вы хотите удалить запись?"
                            confirm-button="Удалить"
                            cancel-button="Отмена"
                            href="{{ route('federaldistrict.destroy', $item->id) }}" method="DELETE"
                            class="text-red-500 font-bold hover:text-red-800">
                        Удалить
                        </Link>

                    </x-splade-cell>
                </x-splade-table>
            </div>

            <div class="mt-4 flex">
                <a href="{{ route('handbook.index') }}"
                   class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </div>


</x-app-layout>
