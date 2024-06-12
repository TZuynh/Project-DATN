<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name') }} | {{ $pageTitle }}</title>
        <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/images/favicon.ico')}}"/>
        @vite(['resources/scss/layouts/modern-light-menu/light/loader.scss'])
        @vite(['resources/layouts/modern-light-menu/loader.js'])

        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap/bootstrap.min.css')}}">
        @vite(['resources/scss/light/assets/main.scss', 'resources/scss/dark/assets/main.scss'])

        @if (!$disableHeader)
            @if ($scrollspy == 1)
                @vite(['resources/scss/light/assets/scrollspyNav.scss', 'resources/scss/dark/assets/scrollspyNav.scss'])
            @endif
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/waves/waves.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{asset('plugins/highlight/styles/monokai-sublime.css')}}">
            @vite([ 'resources/scss/light/plugins/perfect-scrollbar/perfect-scrollbar.scss'])

            @vite([
                'resources/scss/layouts/modern-light-menu/light/structure.scss',
                'resources/scss/layouts/modern-light-menu/dark/structure.scss',
            ])
        @endif

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        {{$headerFiles}}
        <!-- END GLOBAL MANDATORY STYLES -->

        <!--  BEGIN CUSTOM STYLE FILE  -->
        @stack('headerFiles')
        <!--  END CUSTOM STYLE FILE  -->
    </head>
    <body @class([
        // 'layout-dark' => $isDark,
        'layout-boxed' => $isBoxed,
        'alt-menu' => ($isAltMenu || Request::routeIs('collapsibleMenu') ? true : false),
        'error' => (Request::routeIs('404') ? true : false),
        'maintanence' => (Request::routeIs('maintenance') ? true : false),
    ]) @if ($scrollspy == 1)
        {{ $scrollspyConfig }}
    @else
        {{''}}
    @endif   @if (Request::routeIs('fullWidth')) layout="full-width" @endif >

        <!-- BEGIN LOADER -->
        <x-layout-loader/>
        <!--  END LOADER -->

        @if (
                !$disableHeader
            )
            <!--  BEGIN NAVBAR  -->
            <x-navbar.style-vertical-menu classes="{{($isBoxed ? 'container-xxl' : '')}}"/>
            <!--  END NAVBAR  -->

            <!--  BEGIN MAIN CONTAINER  -->
            <div class="main-container " id="container">

                <!--  BEGIN LOADER  -->
                <x-layout-overlay/>
                <!--  END LOADER  -->

                <!--  BEGIN SIDEBAR  -->
                <x-menu.vertical-menu/>
                <!--  END SIDEBAR  -->


                <!--  BEGIN CONTENT AREA  -->
                <div id="content" class="main-content {{(Request::routeIs('blank') ? 'ms-0 mt-0' : '')}}">

                    @if ($scrollspy == 1)
                        <div class="container">
                            <div class="container">
                                {{ $slot }}
                            </div>
                        </div>
                    @else
                        <div class="layout-px-spacing">
                            <div class="middle-content {{($isBoxed ? 'container-xxl' : '')}} p-0">
                                {{ $slot }}
                            </div>
                        </div>
                    @endif

                    <!--  BEGIN FOOTER  -->
                    <x-layout-footer/>
                    <!--  END FOOTER  -->

                </div>
                <!--  END CONTENT AREA  -->

            </div>
            <!--  END MAIN CONTAINER  -->

        @else
            {{ $slot }}
        @endif

        @if (
                !$disableHeader
            )
            <!-- BEGIN GLOBAL MANDATORY STYLES -->
            <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('plugins/global/vendors.min.js') }}"></script>
            <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
            <script src="{{ asset('plugins/mousetrap/mousetrap.min.js') }}"></script>
            <script src="{{ asset('plugins/waves/waves.min.js') }}"></script>
{{--            <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>--}}
            <script src="{{ asset('plugins/font-icons/feather/feather.min.js') }}"></script>
            <script type="text/javascript">
                feather.replace();
            </script>
            @if ($scrollspy == 1)
                @vite(['resources/assets/js/scrollspyNav.js'])
            @endif
            @vite(['resources/layouts/modern-light-menu/app.js'])
            <!-- END GLOBAL MANDATORY STYLES -->

        @endif

        {{$footerFiles}}

        <!--  BEGIN CUSTOM SCRIPTS FILE  -->
        @stack('footerFiles')
        <!--  END CUSTOM SCRIPTS FILE  -->
    </body>
</html>
