<x-guest-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <header class="bg-blue-700">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
            <div class="w-full py-6 flex items-center justify-between border-b border-indigo-500 lg:border-none">
                <div class="flex items-center">
                    <a href="{{ route('index') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800"/>
                    </a>
                    <div class="hidden ml-10 space-x-8 lg:block">
                        <a href="/"
                           class="uppercase text-base font-medium text-white hover:text-indigo-50">
                            Главная </a>

                        <a href="{{ route('index') }}/#moderators"
                           class="uppercase text-base font-medium text-white hover:text-indigo-50">
                            Спикеры </a>

                        <a href="{{ route('index') }}/#guests"
                           class="uppercase text-base font-medium text-white hover:text-indigo-50"> Гости </a>

                        <a href="{{ route('index') }}/#plan"
                           class="uppercase text-base font-medium text-white hover:text-indigo-50">
                            Расписание </a>

                        <a href="{{ route('index') }}/#contacts"
                           class="uppercase text-base font-medium text-white hover:text-indigo-50">
                            Контакты </a>
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
                <a href="/"
                   class="text-base font-medium text-white hover:text-indigo-50"> Главная </a>

                <a href="{{ route('index') }}/#moderators"
                   class="text-base font-medium text-white hover:text-indigo-50"> Спикеры </a>

                <a href="{{ route('index') }}/#guests"
                   class="text-base font-medium text-white hover:text-indigo-50"> Гости </a>

                <a href="{{ route('index') }}/#plan"
                   class="text-base font-medium text-white hover:text-indigo-50"> Расписание </a>

                <a href="{{ route('index') }}/#contacts"
                   class="text-base font-medium text-white hover:text-indigo-50"> Контакты </a>
            </div>
        </nav>
    </header>

    <!-- Hero -->
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="max-w-2xl text-center mx-auto">
                <h1 class="block text-2xl font-bold text-gray-600 sm:text-2xl md:text-2xl dark:text-white">
                    {{ Carbon\Carbon::parse($Event->date_start)->translatedFormat('d.m.Y') }}
                    - {{ Carbon\Carbon::parse($Event->date_end)->format('d.m.Y') }}
                </h1>
                <h1 class="block text-3xl font-bold text-gray-700 sm:text-4xl md:text-5xl dark:text-white">
                    {{ $Data->locate }}
                </h1>
                <p class="mt-3 text-lg font-bold text-gray-600 dark:text-gray-400">{{$Data->adress}}</p>
            </div>
            <div class="mt-10 relative max-w-5xl mx-auto">
                <div class="w-full object-cover h-96 sm:h-[480px] bg-no-repeat bg-center bg-cover rounded-xl"
                     style="background-image: url({{url('storage/data/' . $Data->banner)}});"></div>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-0" width="404"
                     height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
                </svg>

                {{--                <div class="absolute bottom-12 -left-20 -z-[1] w-48 h-48 bg-gradient-to-b from-orange-500 to-white p-px rounded-lg dark:to-slate-900">--}}
                {{--                    <div class="bg-white w-48 h-48 rounded-lg dark:bg-slate-900"></div>--}}
                {{--                </div>--}}

                {{--                <div class="absolute -top-12 -right-20 -z-[1] w-48 h-48 bg-gradient-to-t from-blue-600 to-cyan-400 p-px rounded-full">--}}
                {{--                    <div class="bg-white w-48 h-48 rounded-full dark:bg-slate-900"></div>--}}
                {{--                </div>--}}
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
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                     viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)"/>
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404"
                     height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none"
                     viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20"
                                 patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)"/>
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1>
                    <span
                        class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Уважаемые участники семинара-совещания!</span>
                </h1>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                <figure>
                    <img class="w-full rounded-lg" src="{{url('storage/data/' . $Data->image)}}" alt="" width="1310"
                         height="873">
                </figure>
                <p class="text-justify">
                    {!!$Data->info!!}
                </p>
                <figcaption class="text-right">Председатель ВЭП Ю.Б. Офицеров</figcaption>
            </div>
        </div>
    </div>

    <div class="w-full h-8 ">
        <hr>
    </div>


    <div class="bg-white" id="moderators">
        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12 lg:grid lg:grid-cols-3 lg:gap-8 lg:space-y-0">
                <div class="space-y-5 sm:space-y-4">
                    <h2 class="text-2xl font-bold tracking-tight sm:text-2xl text-gray-900">
                        Спикеры мероприятия
                    </h2>
                    <p class="text-base text-gray-500">
                        Профессионалы своего дела, которые сделают мероприятие интересным и помогут сформировать
                        актуальную повестку благодаря своему опыту.
                    </p>
                </div>
                <div class="lg:col-span-2">
                    <ul role="list"
                        class="space-y-12 sm:divide-y sm:divide-gray-200 sm:space-y-0 sm:-mt-8 lg:gap-x-8 lg:space-y-0">
                        @foreach($Moderators as $Moderator)
                            <li class="sm:py-8">
                                <div class="space-y-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-6 sm:space-y-0">
                                    <div class="aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
                                        <img class="w-full rounded-lg"
                                             src="{{url('storage/moderators/' . $Moderator->image)}}" alt=""
                                             width="240">
                                    </div>
                                    <div class="sm:col-span-2">
                                        <div class="space-y-4">
                                            <div class="text-2xl leading-6 font-medium space-y-1">
                                                <h3>{{ $Moderator->name }}</h3>
                                                <p class="text-indigo-600 text-lg">{{ $Moderator->jobtitle }}</p>
                                            </div>
                                            <div class="text-sm">
                                                <p class="text-gray-500">
                                                    {!!$Moderator->description !!}
                                                </p>
                                            </div>
                                            <svg
                                                class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-0"
                                                width="404"
                                                height="384" fill="none" viewBox="0 0 404 384">
                                                <defs>
                                                    <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0"
                                                             width="20" height="20"
                                                             patternUnits="userSpaceOnUse">
                                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200"
                                                              fill="currentColor"/>
                                                    </pattern>
                                                </defs>
                                                <rect width="404" height="384"
                                                      fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    @endforeach
                    <!-- More people... -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="relative">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-300">
      <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path fill="#6B7280" fill-rule="evenodd"
              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
              clip-rule="evenodd"/>
      </svg>
    </span>
        </div>
    </div>
    <div class="py-4">

    </div>


    <div class="bg-white" id="guests">
        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12 lg:grid lg:grid-cols-3 lg:gap-8 lg:space-y-0">
                <div class="space-y-5 sm:space-y-4">
                    <h2 class="text-2xl font-bold tracking-tight sm:text-2xl text-gray-900">
                        Приглашенные гости
                    </h2>
                    <p class="text-xl text-gray-500"></p>
                </div>
                <div class="lg:col-span-2">
                    <ul role="list"
                        class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:gap-x-8">
                        @foreach($Guests as $Guest)
                            <li>
                                <div class="space-y-4">
                                    <div class="aspect-w-3 aspect-h-2">
                                        <img class="object-cover shadow-lg rounded-lg"
                                             src="{{url('storage/guests/' . $Guest->image)}}"
                                             alt="">
                                    </div>
                                    <div class="text-lg leading-6 font-medium space-y-1">
                                        <h3>{{$Guest->name}}</h3>
                                        <p class="text-indigo-600">{{$Guest->description}}</p>
                                    </div>
                                </div>
                            </li>
                    @endforeach
                    <!-- More people... -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="relative">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-300">
      <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path fill="#6B7280" fill-rule="evenodd"
              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
              clip-rule="evenodd"/>
      </svg>
    </span>
        </div>
    </div>



    <div class="bg-white" id="plan">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8 lg:py-24">
            <div class="text-center pb-4">
                <h2 class="text-2xl font-semibold text-indigo-600 tracking-wide uppercase">ПЛАН</h2>
                <p class="mt-1 text-base text-gray-900 sm:text-base sm:tracking-tight lg:text-xl">
                    мероприятий  IV Всероссийского семинара-совещания
                    председателей первичных профсоюзных организаций
                    Общественной организации «Всероссийский Электропрофсоюз»
                    г. Санкт-Петербург
                </p>
            </div>
            <div class="sm:block">
                <div class="">
                    @foreach($Schedule as $day)
                        <div class="bg-white px-4 py-5 mb-4 border border-gray-100 rounded-lg sm:px-6">
                            <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                                <div class="ml-4 mt-2">
                                    <h3 class="text-lg leading-6 mb-4 font-medium text-cyan-800 uppercase">
                                        {{$day->week}}, {{$day->alt_data}}
                                    </h3>
                                </div>
                                <div class="ml-4 mt-2 flex-shrink-0">

                                </div>
                            </div>
                            <x-splade-defer method="GET"
                                            url="{{ route('schedule', ['schedule' => $day->id]) }}">
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
                                                </div>
                                            </div>

                                            <div class="hidden sm:flex sm:flex-col sm:items-end">

                                            </div>
                                        </li>
                                    </ul>


                                </template>
                            </x-splade-defer>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>


    <div class="relative">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200"></div>
        </div>
        <div class="relative flex justify-center">
    <span class="bg-white px-2 text-gray-300">
      <svg class="h-5 w-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
        <path fill="#6B7280" fill-rule="evenodd"
              d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
              clip-rule="evenodd"/>
      </svg>
    </span>
        </div>
    </div>
    <div class="py-4">

    </div>

    <div class="py-4">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-4">
            <div class="mb-4">
                <div class="mt-3">
                    <section class="text-gray-600 body-font relative" id="contacts">
                        <div class="absolute inset-0 bg-gray-300">
                            @if($Data->map)
                                {!! $Data->map !!}
                            @endif
                        </div>
                        <div class="container px-5 py-24 mx-auto flex">
                            <div
                                class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
                                <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">
                                    @if($Data->events_id)
                                        {{$Data->name}}
                                    @endif
                                </h2>
                                <div class="relative mb-4">
                                    <p class="leading-relaxed text-sm mb-5 text-gray-600">
                                        @if($Data->events_id)
                                            {!! $Data->description !!}
                                        @endif
                                    </p>
                                </div>
                                <div class="relative mb-4">
                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">
                                        Адрес</h2>
                                    <p class="mt-1">
                                        @if($Data->adress)
                                            {!! $Data->adress !!}
                                        @endif
                                    </p>
                                </div>

                                <div class="relative mb-4">
                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">
                                        EMAIL</h2>
                                    <a class="text-indigo-500 leading-relaxed">elprof@elprof.ru</a>
                                    <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">
                                        Телефон</h2>
                                    <p class="leading-relaxed">+7 (495) 938-83-78</p>
                                </div>

                            </div>
                        </div>
                    </section>


                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
