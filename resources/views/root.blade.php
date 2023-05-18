<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
{{--        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
{{--        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">--}}



        <!-- Scripts -->
        @vite(['resources/js/app.js'])
        @spladeHead
        <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    </head>
    <body class="font-sans antialiased scroll-smooth">
        @splade


        <button id="to-top-button" onclick="goToTop()" title="Go To Top"
                class="hidden fixed z-50 bottom-4 right-4 p-4 border-0 w-14 h-14 rounded-full shadow-md bg-blue-500 hover:bg-blue-600 text-white text-lg font-semibold transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path d="M12 4l8 8h-6v8h-4v-8H4l8-8z" />
            </svg>
            <span class="sr-only">Go to top</span>
        </button>

        <script>
            // Get the 'to top' button element by ID
            var toTopButton = document.getElementById("to-top-button");

            // Check if the button exists
            if (toTopButton) {

                // On scroll event, toggle button visibility based on scroll position
                window.onscroll = function() {
                    if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                        toTopButton.classList.remove("hidden");
                    } else {
                        toTopButton.classList.add("hidden");
                    }
                };

                // Function to scroll to the top of the page smoothly
                window.goToTop = function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                };
            }
        </script>
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
{{--                selector: '#info', // Replace this CSS selector to match the placeholder element for TinyMCE--}}
{{--                language: 'ru',--}}
{{--                browser_spellcheck: true,--}}
{{--                height: 400,--}}
{{--                menubar: false,--}}
{{--                toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify'--}}
{{--            });--}}
{{--            tinymce.triggerSave();--}}
{{--        </script>--}}
    </body>
</html>
