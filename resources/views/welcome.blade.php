<x-guest-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <header class="bg-blue-700">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
            <div class="w-full py-6 flex items-center justify-between border-b border-indigo-500 lg:border-none">
                <div class="flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                    <div class="hidden ml-10 space-x-8 lg:block">
                        <a href="#" class="uppercase text-base font-medium text-white hover:text-indigo-50"> Главная </a>

                        <a href="#" class="uppercase text-base font-medium text-white hover:text-indigo-50"> Спикеры </a>

                        <a href="#" class="uppercase text-base font-medium text-white hover:text-indigo-50"> Гости </a>

                        <a href="#" class="uppercase text-base font-medium text-white hover:text-indigo-50"> Расписание </a>

                        <a href="#" class="uppercase text-base font-medium text-white hover:text-indigo-50"> Контакты </a>
                    </div>
                </div>
                <div class="ml-10 space-x-4">
                    @if (Route::has('login'))

                            @auth
                                <Link href="{{ url('/dashboard') }}"
                                      class="inline-block bg-blue-500 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-75">
                                Личный кабинет
                                </Link>
                            @else
                                <Link href="{{ route('login') }}"
                                      class="inline-block bg-blue-500 py-2 px-4 border border-transparent rounded-md text-base font-medium text-white hover:bg-opacity-75">
                                Вход
                                </Link>

                                @if (Route::has('register'))
                                    <Link href="{{ route('register') }}"
                                          class="inline-block bg-white py-2 px-4 border border-transparent rounded-md text-base font-medium text-blue-600 hover:bg-indigo-50">
                                    Регистрация
                                    </Link>
                                @endif
                            @endauth

                    @endif
                </div>
            </div>
            <div class="py-4 flex flex-wrap justify-center space-x-6 lg:hidden">
                <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Главная </a>

                <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Спикеры </a>

                <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Гости </a>

                <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Расписание </a>

                <a href="#" class="text-base font-medium text-white hover:text-indigo-50"> Контакты </a>
            </div>
        </nav>
    </header>

    <!-- Hero -->
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="max-w-2xl text-center mx-auto">
                <h1 class="block text-3xl font-bold text-gray-600 sm:text-4xl md:text-3xl dark:text-white">
                    {{ Carbon\Carbon::parse($Event->date_start)->translatedFormat('d.m.Y') }}  - {{ Carbon\Carbon::parse($Event->date_end)->format('d.m.Y') }}
                </h1>
                <h1 class="block uppercase text-3xl font-bold text-gray-800 sm:text-4xl md:text-5xl dark:text-white">
                   {{ $Data->locate }}
                </h1>
                <p class="mt-3 text-lg text-gray-800 dark:text-gray-400">{{$Data->adress}}</p>
            </div>
{{--            <img src="{{url('public/data/' . $Data->banner)}}">--}}
            <div class="mt-10 relative max-w-5xl mx-auto">
                <div class="w-full object-cover h-96 sm:h-[480px] bg-no-repeat bg-center bg-cover rounded-xl" style="background-image: url({{url('storage/data/' . $Data->banner)}});"></div>

                <div class="absolute bottom-12 -left-20 -z-[1] w-48 h-48 bg-gradient-to-b from-orange-500 to-white p-px rounded-lg dark:to-slate-900">
                    <div class="bg-white w-48 h-48 rounded-lg dark:bg-slate-900"></div>
                </div>

                <div class="absolute -top-12 -right-20 -z-[1] w-48 h-48 bg-gradient-to-t from-blue-600 to-cyan-400 p-px rounded-full">
                    <div class="bg-white w-48 h-48 rounded-full dark:bg-slate-900"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero -->

    <div class="w-full h-8 ">
        <hr>
    </div>



    <div class="relative py-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Уважаемые участники семинара-совещания!</span>
                </h1>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                <p class="text-justify">
                    {!!$Data->info!!}
                </p>
                <figure>
                    <img class="w-full rounded-lg" src="{{url('storage/data/' . $Data->image)}}" alt="" width="1310" height="873">
                    <figcaption>Председатель ВЭП Ю.Б. Офицеров</figcaption>
                </figure>
            </div>
        </div>
    </div>


    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4">
            <div class="mb-4">
                <div class="mt-3">

                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
