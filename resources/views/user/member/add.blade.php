<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-blue-500 uppercase leading-tight">
            {{ $Event->name }}
        </h2>
        <span class="block text-gray-300 text-sm">
            Дата проведения мероприятия с {{ Carbon\Carbon::parse($Event->date_start)->translatedFormat('d.m.Y') }} по {{ Carbon\Carbon::parse($Event->date_end)->format('d.m.Y') }}
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-4 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px-0">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">
                                Анкетные данные участника
                            </h3>
                            <p class="mt-1 text-sm text-gray-600">
                                Данная информация для внутреннего использования.
                            </p>
                        </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-3">
                        <x-splade-form method="POST" :action="route('member.store', $Event->id)"
                                       :default="[
                                            'events_id' =>  $Event->id,
                                            'eventsName' => $Event->name,
                                            'email' => Auth::user()->email
                                            ]"
                                       preserve-scroll>
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">
                                        <x-splade-input type="hidden" v-model="form.events_id"/>
                                        <x-splade-input type="hidden" v-model="form.eventsName"/>
                                        <div class="col-start-1 col-span-6 sm:col-span-2">
                                            <x-splade-input id="surName" name="surName" type="text"
                                                            :label="__('Фамилия *')"
                                                            autofocus
                                                            {{--                                                            placeholder="Иванов"--}}
                                                            autocomplete="surName"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-2">
                                            <x-splade-input id="firstName" name="firstName" type="text"
                                                            :label="__('Имя *')"
                                                            autofocus
                                                            {{--                                                            placeholder="Иван"--}}
                                                            autocomplete="firstName"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-2">
                                            <x-splade-input id="middleName" name="middleName" type="text"
                                                            :label="__('Отчество *')"
                                                            autofocus
                                                            {{--                                                            placeholder="Иванович"--}}
                                                            autocomplete="middleName"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-2">
                                            <x-splade-input id="birthDate" name="birthDate" type="text"
                                                            :label="__('Дата рождения *')"
                                                            {{--                                                            placeholder="1977-04-01"--}}
                                                            date="{ locale: 'ru',
                                                                    showMonths: 1,
                                                                    altInput: true,
                                                                    altFormat: 'd.m.Y',
                                                                    dateFormat: 'Y-m-d',
                                                                    }"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-4">
                                            <x-splade-input id="snils" name="snils" type="text"
                                                            :label="__('СНИЛС *')"
                                                            {{--                                                            placeholder="12345678901"--}}
                                                            autocomplete="snils"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6 text-green-500">
                                            <x-splade-input id="email" type="text"
                                                            :label="__('Email')"
                                                            {{--                                                            placeholder="{{ Auth::user()->email  }}"--}}
                                                            v-model="form.email"
                                                            readonly
                                                            class="text-gray-900"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="education" name="education" type="text"
                                                            :label="__('Образование')"
                                                            autocomplete="education"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-3">
                                            <x-splade-input id="contactPhone" name="contactPhone" type="text"
                                                            :label="__('Телефон для связи *')"
                                                            prepend="+7"
                                                            autocomplete="contactPhone"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-3">
                                            <x-splade-input id="workPhone" name="workPhone" type="text"
                                                            :label="__('Рабочий телефон')"
                                                            prepend="+7"
                                                            autocomplete="workPhone"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="job_title" name="job_title" type="text"
                                                            :label="__('Должность в ППО *')"
                                                            autocomplete="job_title"/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-input id="name_ppo" name="name_ppo" type="text"
                                                            :label="__('Наименование ППО *')"
                                                            autocomplete="name_ppo"/>
                                        </div>
                                        @if($Name_to)
                                            <div class="col-start-1 col-span-6 sm:col-span-6">
                                                <x-splade-select name="name_to"
                                                                 :label="__('Территориальная организация *')"
                                                                 :options="$Name_to"
                                                                 option-label="name" option-value="id" choices/>
                                            </div>
                                        @endif

                                        @if($Federal)
                                            <div class="col-start-1 col-span-6 sm:col-span-6">
                                                <x-splade-select name="region"
                                                                 :label="__('Федеральный округ')"
                                                                 :options="$Federal"
                                                                 option-label="name" option-value="id" choices/>
                                            </div>
                                        @endif
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <x-splade-textarea id="note" name="note"
                                                               :label="__('Дополнительная информация')"
                                                               autosize/>
                                        </div>
                                        <div class="col-start-1 col-span-6 sm:col-span-6">
                                            <p class="text-gray-500 text-xs text-justify space-y-1">
                                                {{ $Event->agreement }}
                                            </p>
                                        </div>
                                        <div class="col-span-6 sm:col-span-6 py-6">
                                            <x-splade-checkbox name="agreement" value="1"
                                                               label="Согласие на обработку персональных данных"/>
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 sm:text-right sm:px-6">

                                        <x-splade-submit :label="__('Зарегистрироваться')"/>

                                    </div>
                                </div>
                            </div>
                        </x-splade-form>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                    <div class="border-t border-gray-200"></div>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>
