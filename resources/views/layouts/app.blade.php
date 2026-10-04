<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="h-full bg-[#F8F9FC] text-[#171717] antialiased" x-data="{ sidebarOpen: false }">
    <div
        class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(108,99,255,0.08),transparent_35%),linear-gradient(180deg,#F8F9FC_0%,#F4F6FB_100%)]">
        <div class="fixed inset-0 z-30 bg-slate-950/30 backdrop-blur-[2px] lg:hidden" x-show="sidebarOpen"
            x-transition.opacity @click="sidebarOpen = false" x-cloak></div>

        <aside
            class="fixed inset-y-0 left-0 z-40 w-[260px] border-r border-slate-200/80 bg-white/80 backdrop-blur-xl shadow-[0_10px_30px_rgba(15,23,42,0.06)] transition-transform duration-200 ease-out lg:translate-x-0"
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            @include('components.sidebar')
        </aside>

        <div class="lg:pl-[260px]">
            @include('components.topbar')

            <main class="mx-auto max-w-[1500px] px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
                {{ $slot ?? '' }}
            </main>
        </div>
    </div>

    @livewireScripts
</body>

</html>
