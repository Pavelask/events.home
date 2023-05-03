<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Анкета участника') }}
        </h2>
    </x-slot>
    <div class="py-4">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="py-5">
                <div class="bg-white shadow sm:rounded-lg py-6">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="leading-6 text-lg font-bold text-gray-900">
                            {{ $Member->eventsName }}
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-200">
                            {{ $Member->events_id }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-200">
                            {{ $Member->user_id }}
                        </p>
                        <p class="mt-1 max-w-2xl text-sm text-gray-200 pb-4">
                            {{ $Member->created_at }}
                        </p>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
                        <dl class="sm:divide-y sm:divide-gray-200">
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">ФИО</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->surName }} {{ $Member->firstName }} {{ $Member->middleName }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Дата рождения</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ Carbon\Carbon::parse($Member->birthDate)->format('d.m.Y') }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">СНИЛС</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->snils  }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->email }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Телефон для связи</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->contactPhone  }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Образование</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->education }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Должность в ППО</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->job_title }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Наименование ППО</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->name_ppo }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Рабочий номер телефона</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $Member->workPhone }}
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Территориальная организация</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    @if($NameTO)
                                        {{ $NameTO->name }}
                                    @endif
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Федеральный округ</dt>
                                <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                    @if($Federal)
                                        {{ $Federal->name }}
                                    @endif
                                </dd>
                            </div>
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Дополнительная инфомация</dt>
                                <dd class="mt-1 text-sm text-justify text-gray-700 sm:mt-0 sm:col-span-2">
                                    {{ $Member->note }}
                                </dd>
                            </div>
                            @if($Member->qr_code_pic)
                                <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                    <dt class="text-base font-medium text-gray-500">QR код для регистрации</dt>
                                    <dd class="mt-1 text-base text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{ $Member->qr_code_pic }}
                                    </dd>
                                </div>
                            @endif
                            <div class="py-4 sm:py-5 grid grid-cols-3 gap-4 px-6">
                                <dt class="text-base font-medium text-gray-500">Статус участника</dt>
                                <dd class="mt-1 text-gray-900 sm:mt-0 sm:col-span-2
                                    @if($MemberStatus->id == 1) font-extrabold text-red-500 @endif
                                @if($MemberStatus->id == 2) font-extrabold text-green-500 @endif
                                @if($MemberStatus->id == 3) font-extrabold text-gray-500 @endif
                                    ">
                                    {{ $MemberStatus->name }}
                                </dd>
                            </div>
                            <div class="mt-4 py-6 px-6 bg-gray-50 flex justify-end">
                                <div>
                                    <Link href="{{ route('member.edit', ['event' => $Member->events_id, 'member' => $Member->id ]) }}" method="GET"
                                          class="rounded-md bg-white px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
                                    Изменить данные анкеты
                                    </Link>
                                </div>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
