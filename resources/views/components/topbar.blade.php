<header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/75 backdrop-blur-xl">
    <div class="mx-auto flex h-20 max-w-[1500px] items-center gap-3 px-4 sm:px-6 lg:px-8">
        <button @click="sidebarOpen = true"
            class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-slate-300 hover:text-slate-800 lg:hidden"
            aria-label="Open menu">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div class="min-w-0 flex-1">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Overview</p>
            <h1 class="truncate text-lg font-bold text-slate-800 sm:text-xl">@yield('title', 'Dashboard')</h1>
        </div>

        <div class="hidden items-center gap-2 md:flex">
            <div
                class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-500 shadow-sm">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="6"></circle>
                    <path d="M16 16l5 5"></path>
                </svg>
                <span>Search</span>
            </div>
        </div>

        <div class="flex items-center gap-2 sm:gap-3">
            <button
                class="grid h-10 w-10 place-items-center rounded-xl border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-slate-300 hover:text-slate-800"
                type="button" aria-label="Notifications">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
            </button>

            <div class="flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-2 py-1.5 shadow-sm">
                <div
                    class="grid h-8 w-8 place-items-center rounded-full bg-gradient-to-br from-slate-800 to-slate-600 text-xs font-semibold text-white">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div class="hidden min-w-0 sm:block">
                    <p class="truncate text-sm font-semibold text-slate-800">{{ auth()->user()->name ?? 'Guest' }}</p>
                    <p class="text-[10px] text-slate-400">Premium account</p>
                </div>
            </div>
        </div>
    </div>
</header>
