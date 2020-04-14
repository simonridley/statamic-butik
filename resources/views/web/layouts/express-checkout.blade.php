<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Shop | {{ config('app.name') }}</title>

        {{-- Feel free to remove this Butik css completely to create your own look. --}}
        <link rel="stylesheet" href="/vendor/butik/css/statamic-butik.css">

        @livewireStyles
    </head>

    <body>
        <div class="b-max-w-6xl b-mx-auto">
            <header class="b-flex b-px-5 b-py-8 md:b-py-10">
                <a class="b-block b-w-3/5 b-flex b-text-gray-400 hover:b-text-gray-500" href="{{ route('butik.shop') }}">
                    <svg class="b-fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M5.41 11H21a1 1 0 0 1 0 2H5.41l5.3 5.3a1 1 0 0 1-1.42 1.4l-7-7a1 1 0 0 1 0-1.4l7-7a1 1 0 0 1 1.42 1.4L5.4 11z"/></svg>
                    <span>{{ __('butik::general.back_to_shop') }}</span>
                </a>
                <a class="b-block b-flex b-justify-end b-w-2/5" href="{{ route('butik.shop') }}">
                    <img class="b-w-3/5" style="max-width: 200px;" src="/vendor/butik/images/logo.svg">
                </a>
            </header>

            <main class="b-w-full">

                @yield('content')

            </main>
        </div>

        <hr class="b-mt-8">

        <footer class="b-flex b-justify-center b-max-w-6xl b-mx-auto b-py-10">
            <div class="b-flex b-flex-wrap b-justify-center b-text-gray-600">
                <a class="b-mx-6 b-mb-2" href="#">Impressum</a>
                <a class="b-mx-6 b-mb-2" href="#">Datenschutzerklaerung</a>
                <a class="b-mx-6 b-mb-2" href="#">Kontakt</a>
                <a class="b-mx-6 b-mb-2" href="#">Versand</a>
                <a class="b-mx-6 b-mb-2" href="#">AGB</a>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
