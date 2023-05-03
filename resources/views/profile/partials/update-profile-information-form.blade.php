<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Информация профиля пользователя') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Обновите информацию профиля своей учетной записи и адрес электронной почты.") }}
        </p>
    </header>

    <x-splade-form method="patch" :action="route('profile.update')" :default="$user" class="mt-6 space-y-6" preserve-scroll>
        <x-splade-input id="name" name="name" type="text" :label="__('Имя')" required autofocus autocomplete="name" />
        <x-splade-input id="email" name="email" type="email" :label="__('Email')" required autocomplete="email" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Ваш адрес электронной почты не подтвержден.') }}

                    <Link method="post" href="{{ route('verification.send') }}" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Нажмите здесь, чтобы повторно отправить электронное письмо с подтверждением.') }}
                    </Link>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('На ваш адрес электронной почты отправлена новая ссылка для подтверждения.') }}
                    </p>
                @endif
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-splade-submit :label="__('Сохранить')" />

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600">
                    {{ __('Готово.') }}
                </p>
            @endif
        </div>
    </x-splade-form>
</section>
