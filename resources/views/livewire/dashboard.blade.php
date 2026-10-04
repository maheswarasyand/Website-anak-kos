<div class="animate-fade-in">
    @section('title', 'Dashboard')
    @section('subtitle', 'Ringkasan aktivitas kos kamu hari ini')

    {{-- HERO 3D ORB --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-6">
        <div class="lg:col-span-2">
            <livewire:three.orb-canvas type="orb" height="h-80" :key="'orb-home'">
                <div>
                    <span class="badge-info !bg-white/10 !text-indigo-200 backdrop-blur">
                        ✨ SmartKos AI Assistant
                    </span>
                    <h2 class="text-2xl font-bold text-white mt-3 leading-tight">
                        Hai, {{ auth()->user()->name }} 👋
                    </h2>
                    <p class="text-sm text-indigo-200/80 mt-1 max-w-md">
                        Semua kebutuhan kos kamu dalam satu tempat — budget, jadwal, resep, dan AI assistant.
                    </p>
                </div>
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('chat.index') }}" wire:navigate
                        class="btn-primary !bg-white !text-indigo-700 hover:!bg-indigo-50 pointer-events-auto">
                        Tanya AI
                    </a>
                    <a href="{{ route('recipes.index') }}" wire:navigate
                        class="btn-ghost !text-white hover:!bg-white/10 pointer-events-auto">
                        Cari Resep
                    </a>
                </div>
            </livewire:three.orb-canvas>
        </div>

        {{-- Budget summary --}}
        <div class="card card-pad flex flex-col justify-between">
            <div>
                <h3 class="section-title">Budget Bulan Ini</h3>
                <p class="section-sub">{{ now()->translatedFormat('F Y') }}</p>

                <p class="mt-5 text-3xl font-bold text-slate-800">
                    Rp {{ number_format($currentBudget->total_budget ?? 0, 0, ',', '.') }}
                </p>
                <p class="text-xs text-slate-400 mt-1">
                    Terpakai Rp {{ number_format($totalSpent, 0, ',', '.') }}
                </p>
            </div>

            @php
                $pct =
                    ($currentBudget->total_budget ?? 0) > 0
                        ? min(100, ($totalSpent / $currentBudget->total_budget) * 100)
                        : 0;
            @endphp
            <div class="mt-6">
                <div class="flex justify-between text-xs text-slate-500 mb-1.5">
                    <span>Progress</span>
                    <span class="font-semibold text-slate-700">{{ round($pct) }}%</span>
                </div>
                <div class="h-2 rounded-full bg-slate-100 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-violet-600 transition-all"
                        style="width: {{ $pct }}%"></div>
                </div>
                <p class="text-xs text-slate-400 mt-3">
                    Sisa: <span class="font-semibold text-emerald-600">Rp
                        {{ number_format($remaining, 0, ',', '.') }}</span>
                </p>
            </div>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-stat-card label="Terpakai" :value="'Rp ' . number_format($totalSpent, 0, ',', '.')" :icon="'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2'" tone="rose" />
        <x-stat-card label="Sisa Budget" :value="'Rp ' . number_format($remaining, 0, ',', '.')" :icon="'M5 13l4 4L19 7'" tone="emerald" />
        <x-stat-card label="Tugas Pending" :value="$pendingTasks . ' tugas'" :icon="'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'" tone="amber" />
        <x-stat-card label="Jadwal Hari Ini" :value="$todaySchedules->count() . ' agenda'" :icon="'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'" tone="indigo" />
    </div>

    {{-- 3D CHART + LISTS --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2 card card-pad">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="section-title">Pengeluaran 6 Bulan Terakhir</h3>
                    <p class="section-sub">Visualisasi 3D interaktif</p>
                </div>
                <span class="badge-neutral">3D · Live</span>
            </div>
            <livewire:three.orb-canvas type="budget-chart" height="h-72" :chart-data="$chartData" :key="'chart-home-' . md5(json_encode($chartData))" />
        </div>

        <div class="card card-pad">
            <div class="flex items-center justify-between mb-4">
                <h3 class="section-title">Stok Menipis</h3>
                <a href="{{ route('inventory.index') }}" wire:navigate
                    class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">Kelola →</a>
            </div>
            @forelse($lowStockItems as $item)
                <div class="flex items-center gap-3 py-3 border-b border-slate-50 last:border-0">
                    <div class="shrink-0 w-9 h-9 rounded-xl bg-amber-50 grid place-items-center text-amber-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-slate-800 truncate">{{ $item->ingredient->name }}</p>
                        <p class="text-xs text-slate-400">{{ $item->quantity }} {{ $item->ingredient->unit }} tersisa
                        </p>
                    </div>
                </div>
            @empty
                <x-empty-state title="Stok aman" message="Semua bahan masih cukup." />
            @endforelse
        </div>

        <div class="lg:col-span-2 card card-pad">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="section-title">Jadwal Hari Ini</h3>
                    <p class="section-sub">{{ now()->translatedFormat('l, d F Y') }}</p>
                </div>
                <a href="{{ route('schedules.index') }}" wire:navigate
                    class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">Lihat semua →</a>
            </div>
            @forelse($todaySchedules as $schedule)
                <div class="flex items-center gap-3 py-3 border-b border-slate-50 last:border-0">
                    <div class="shrink-0 w-1.5 h-10 rounded-full bg-gradient-to-b from-indigo-500 to-violet-600"></div>
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-slate-800 truncate">{{ $schedule->title }}</p>
                        <p class="text-xs text-slate-400">{{ $schedule->start_time->format('H:i') }} ·
                            {{ $schedule->category ?? 'Umum' }}</p>
                    </div>
                    <span class="badge-info">{{ $schedule->start_time->format('H:i') }}</span>
                </div>
            @empty
                <x-empty-state title="Tidak ada jadwal hari ini" message="Nikmati hari santaimu." />
            @endforelse
        </div>

        <div class="card card-pad">
            <div class="flex items-center justify-between mb-4">
                <h3 class="section-title">Pengingat</h3>
                <a href="{{ route('reminders.index') }}" wire:navigate
                    class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">Semua →</a>
            </div>
            @forelse($upcomingReminders as $reminder)
                <div class="flex items-start gap-3 py-3 border-b border-slate-50 last:border-0">
                    <div class="shrink-0 w-8 h-8 rounded-lg bg-indigo-50 grid place-items-center text-indigo-600">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5" />
                        </svg>
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-slate-800 truncate">{{ $reminder->title }}</p>
                        <p class="text-xs text-slate-400">{{ $reminder->reminder_time->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <x-empty-state title="Tidak ada pengingat" message="Kamu bebas dari pengingat." />
            @endforelse
        </div>
    </div>
</div>
