<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Терреториальные организациии') }}
        </h2>
    </x-slot>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if(!$count)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <x-splade-form action="{{ route('territorial_organizations.upload') }}">
                            <x-splade-file name="csv" filepond />
                            <button
                                class="px-4 py-2 bg-green-100 border border-green-400 rounded-md text-green-600 hover:bg-green-200 mr-4"
                                type="submit">
                                Загрузить ...
                            </button>
                        </x-splade-form>
                    </div>
                @endif
                <div class="p-6 bg-white border-b border-gray-200 shadow-sm">
                    <x-splade-table :for="$TerritorialOrganizations">
                        <x-slot :empty-state>
                            <p>Whoops!</p>
                        </x-slot>
                        <x-slot name="body">
                            <tbody>
                            @foreach($TerritorialOrganizations->resource as $TerritorialOrganization)
                                <tr class="hover:bg-zinc-50 hover:text-gray-900 mb-4 border-b text-sm">
                                    <td class="p-4 border-r">
                                        {{ $TerritorialOrganization->name }}
                                    </td>
                                    <td class="text-center">
                                        {{ $TerritorialOrganization->code }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </x-slot>
                    </x-splade-table>
                </div>
            </div>
            <div class="mt-4 flex">
                <a href="{{ route('handbook.index') }}"
                   class="text-base font-medium text-indigo-600 hover:text-indigo-500">
                    Вернуться в раздел <span aria-hidden="true"> &rarr;</span></a>
            </div>
        </div>
    </div>


</x-app-layout>
