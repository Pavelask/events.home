<!DOCTYPE html>
<html lang="RU" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="h-full">
<div class="bg-white min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8">
    <div class="max-w-max mx-auto">
        <main class="sm:flex">
            <p class="text-7xl font-extrabold text-indigo-600 mb-4">@yield('code')</p>
            <div class="sm:ml-6">
                <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                    <h3 class="text-2xl font-extrabold uppercase text-gray-900 tracking-tight sm:text-3xl">@yield('message')</h3>
                    <p class="mt-1 text-base text-gray-500">Пожалуйста, проверьте URL-адрес в адресной строке и повторите попытку.</p>
                </div>
                <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                    <a href="\" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"> Вернуться на главную </a>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
