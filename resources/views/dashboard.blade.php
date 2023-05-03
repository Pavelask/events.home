<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Главная страница') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if($Event)
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div
                            class="relative bg-teal-500 px-6 pt-16 sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                            <svg viewBox="0 0 1024 1024"
                                 class="absolute left-1/2 top-1/2 -z-10 h-[84rem] w-[84rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0"
                                 aria-hidden="true">
                                <circle cx="200" cy="200" r="650" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                                        fill-opacity="0.7"/>
                                <defs>
                                    <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                                        <stop offset="10%" stop-color="#6082B6"/>
                                        <stop stop-color="#008080"/>
                                    </radialGradient>
                                </defs>
                            </svg>
                            <div class="max-w-7xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
                                <p class="text-3xl font-base tracking-tight text-gray-900 sm:text-3xl text-white py-2 font-sans tracking-wide uppercase">
                                <span class="block text-white">
                                    {{ $Event->name }}
                                </span>
                                </p>
                                <span class="block text-white">
                                 Дата проведения мероприятия с {{ Carbon\Carbon::parse($Event->date_start)->translatedFormat('d.m.Y') }} по {{ Carbon\Carbon::parse($Event->date_end)->format('d.m.Y') }}
                                </span>
                                <span class="block text-sm text-gray-50/[.3]">
                                 {{ $Event->id }}
                                </span>
                                <span class="block">
                                 {{ $Event->description }}
                            </span>
                                <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-center">
                                    @if($Member)
                                        <a href="{{ route('member.show', [
                                                    'event' => $Event->id,
                                                    'member' => $Member->id,
                                                    ]) }}"
                                           class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                            Анкета участника
                                        </a>
                                    @endif
                                    @if(!$Member)
                                        <a href="{{ route('member.index', ['event' => $Event->id]) }}"
                                           class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                            Стать участником
                                        </a>
                                    @endif

                                    <a href="/" class="text-sm font-semibold leading-6 text-white">
                                        Узнать подробнее
                                        <span aria-hidden="true">→</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="mx-auto max-w-6xl mt-4 lg:max-w-6xl border-gray-100 bg-neutral-50 border rounded-lg shadow-sm ">
                            <figure class="mt-4 mb-4 mr-4 ml-4">
                                <blockquote class="text-lg text-justify font-semibold leading-8 text-gray-900 sm:text-lg">
                                    <p>Если Вы готовы стать спикером в панельной дискуссии «Профсоюз: преодолевая вызовы времени» (29 мая 2023, ориентировочно с 19 часов), то Вам необходимо отправить заявку по адресу <a href="mailto:orgdep@elprof.ru" class="font-medium text-indigo-600 hover:text-indigo-500">orgdep@elprof.ru</a> и теме письма указать - "Хочу быть спикером."
                                    </p>
                                </blockquote>
                            </figure>
                        </div>

                        @endif

                        <div class="pb-4"></div>

                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div class="bg-white">
                            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-20 lg:px-8">
                                <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                                    <div>
                                        <h2 class="text-3xl font-extrabold text-gray-900">Часто задаваемые вопросы</h2>
                                        <p class="mt-4 text-lg text-gray-500">Не можете найти ответ, который вы ищете?
                                            Свяжитесь с нашей <a href="mailto:pavel.klimov@elprof.ru"
                                                                 class="font-medium text-indigo-600 hover:text-indigo-500">службой
                                                поддержки</a></p>
                                    </div>
                                    <div class="mt-12 lg:mt-0 lg:col-span-2">
                                        <dl class="space-y-12">
                                            @foreach($FAQ as $item)
                                                <div>
                                                    <dt class="text-lg leading-6 font-medium text-gray-900">
                                                        {{ $item->question  }}
                                                    </dt>
                                                    <dd class="mt-2 text-base text-gray-500">
                                                        {{ $item->answer  }}
                                                    </dd>
                                                </div>
                                        @endforeach
                                        <!-- More questions... -->
                                        </dl>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
