<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif

        <script>
            window.updateTheme = function () {
                const theme = localStorage.getItem('theme') || 'system';
                const isDark = theme === 'dark' ||
                    (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);

                if (isDark) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }

            updateTheme();

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', updateTheme);
        </script>

        @livewireStyles
    </head>
    <body class="min-h-screen bg-zinc-200 dark:bg-zinc-800 text-zinc-800  dark:text-zinc-200 antialiased">
        <livewire:theme-switcher />

        {{ $slot }}

        @livewireScripts
        @fluxScripts
    </body>
</html>
