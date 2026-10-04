@php
    $navGroups = [
        [
            'label' => 'Main',
            'items' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'dashboard',
                    'icon' =>
                        'M3 12l9-9 9 9M5 10v10a1 1 0 001 1h3a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1h3a1 1 0 001-1V10',
                ],
            ],
        ],
        [
            'label' => 'Finance',
            'items' => [
                [
                    'label' => 'Budgets',
                    'route' => 'budgets.index',
                    'icon' =>
                        'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
                [
                    'label' => 'Expenses',
                    'route' => 'expenses.index',
                    'icon' =>
                        'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
                ],
            ],
        ],
        [
            'label' => 'Productivity',
            'items' => [
                [
                    'label' => 'Tasks',
                    'route' => 'tasks.index',
                    'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                ],
                [
                    'label' => 'Schedules',
                    'route' => 'schedules.index',
                    'icon' => 'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z',
                ],
                [
                    'label' => 'Reminders',
                    'route' => 'reminders.index',
                    'icon' =>
                        'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9',
                ],
            ],
        ],
        [
            'label' => 'Lifestyle',
            'items' => [
                [
                    'label' => 'Recipes',
                    'route' => 'recipes.index',
                    'icon' =>
                        'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                ],
                [
                    'label' => 'Shopping',
                    'route' => 'shopping.index',
                    'icon' =>
                        'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z',
                ],
                [
                    'label' => 'Inventory',
                    'route' => 'inventory.index',
                    'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
                ],
            ],
        ],
        [
            'label' => 'Communication',
            'items' => [
                [
                    'label' => 'AI Chat',
                    'route' => 'chat.index',
                    'icon' =>
                        'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                ],
            ],
        ],
    ];
@endphp

<div class="flex h-full flex-col">
    <div class="flex h-20 items-center gap-3 border-b border-slate-200/80 px-5">
        <div
            class="grid h-10 w-10 place-items-center rounded-xl bg-gradient-to-br from-[#6C63FF] to-[#8B83FF] text-sm font-bold text-white shadow-[0_8px_20px_rgba(108,99,255,0.28)]">
            SK</div>
        <div>
            <p class="text-base font-bold text-slate-800 leading-none">SmartKos</p>
            <p class="mt-1 text-[11px] font-medium tracking-[0.14em] text-slate-400 uppercase">Home Hub</p>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto px-3 py-4">
        @foreach ($navGroups as $group)
            <div class="mb-5">
                <p class="mb-2 px-3 text-[10px] font-semibold uppercase tracking-[0.2em] text-slate-400">
                    {{ $group['label'] }}</p>
                <div class="space-y-1">
                    @foreach ($group['items'] as $item)
                        <a href="{{ route($item['route']) }}" wire:navigate
                            class="nav-link {{ request()->routeIs($item['route'] . '*') ? 'nav-link-active' : '' }}">
                            <svg class="h-[17px] w-[17px] shrink-0" fill="none" stroke="currentColor"
                                stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="{{ $item['icon'] }}" />
                            </svg>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </nav>

    <div class="border-t border-slate-200/80 p-3">
        <div
            class="flex items-center gap-3 rounded-2xl border border-slate-200/80 bg-slate-50/70 p-2.5 transition hover:bg-slate-100/80">
            <div
                class="grid h-9 w-9 place-items-center rounded-full bg-gradient-to-br from-slate-700 to-slate-900 text-sm font-semibold text-white">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-semibold text-slate-800">{{ auth()->user()->name ?? 'Guest' }}</p>
                <p class="truncate text-[11px] text-slate-400">{{ auth()->user()->email ?? '' }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="grid h-8 w-8 place-items-center rounded-lg text-slate-400 transition hover:bg-rose-50 hover:text-rose-600"
                    title="Logout" type="submit" aria-label="Logout">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>
