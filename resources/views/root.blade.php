<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">



        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @spladeHead
{{--        <script src="/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>--}}
{{--        <script src="https://cdn.tiny.cloud/1/nml1r1o3e0ye33sipg10kugop0n29mpzepuinfq4hc03evi9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}
{{--        <script>--}}
{{--            tinymce.init({--}}
{{--                selector: '#banner', // Replace this CSS selector to match the placeholder element for TinyMCE--}}
{{--                plugins: 'code table lists',--}}
{{--                language: 'ru',--}}
{{--                height: 400,--}}
{{--                browser_spellcheck: true,--}}
{{--                contextmenu: true,--}}
{{--                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | code '--}}
{{--            });--}}
{{--            tinymce.init({--}}
{{--                selector: '#description', // Replace this CSS selector to match the placeholder element for TinyMCE--}}
{{--                language: 'ru',--}}
{{--                height: 400,--}}
{{--                menubar: false,--}}
{{--                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify'--}}
{{--            });--}}
{{--            tinymce.triggerSave();--}}
{{--        </script>--}}
    </head>
    <body class="font-sans antialiased">
        @splade
    </body>
</html>
