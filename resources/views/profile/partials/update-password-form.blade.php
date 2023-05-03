<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Обновить пароль пользователя') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Убедитесь, что в вашей учетной записи используется длинный случайный пароль, чтобы оставаться в безопасности.') }}
        </p>
    </header>

    <x-splade-form method="put" :action="route('password.update')" class="mt-6 space-y-6" preserve-scroll>
        <x-splade-input id="current_password" name="current_password" type="password" :label="__('Текущий пароль')" autocomplete="current-password" />
        <x-splade-input id="password" name="password" type="password" :label="__('Новый пароль')" autocomplete="new-password" />
        <x-splade-input id="password_confirmation" name="password_confirmation" type="password" :label="__('Подтвердите новыфй пароль')" autocomplete="new-password" />

        <div class="flex items-center gap-4">
            <x-splade-submit :label="__('Сохранить')" />

            @if (session('status') === 'password-updated')
                <p class="text-sm text-gray-600">{{ __('Готово.') }}</p>
            @endif
        </div>
    </x-splade-form>
</section>
