@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    @php
        $budgetValue = $currentBudget?->total_budget ?? 0;
        $spentValue = $totalSpent ?? 0;
        $remainingValue = $remainingBudget ?? 0;
        $budgetProgress = $budgetValue > 0 ? min(100, ($spentValue / $budgetValue) * 100) : 0;
    @endphp

    <div class="space-y-6">
        <section class="grid gap-5 xl:grid-cols-[1.6fr_0.9fr]">
            <div class="card card-pad overflow-hidden">
                <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
                    <div class="max-w-xl">
                        <p class="text-[11px] font-semibold uppercase tracking-[0.2em] text-[#6C63FF]">SmartKos overview</p>
                        <h2 class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900 sm:text-4xl">
                            Hi, {{ auth()->user()->name ?? 'there' }} 👋
                        </h2>
                        <p class="mt-3 max-w-md text-sm leading-6 text-slate-500">
                            Your home essentials, budget, tasks, and schedule are all in one streamlined workspace.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('budgets.index') }}" wire:navigate class="btn-primary">
                            View budget
                        </a>
                        <a href="{{ route('tasks.index') }}" wire:navigate class="btn-secondary">
                            Tasks
                        </a>
                    </div>
                </div>
            </div>

            <div class="card card-pad">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">This month</p>
                        <h3 class="mt-2 text-3xl font-bold tracking-[-0.05em] text-slate-900">
                            Rp {{ number_format($budgetValue, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div
                        class="grid h-11 w-11 place-items-center rounded-xl bg-[#6C63FF]/10 text-[#6C63FF] ring-1 ring-[#6C63FF]/10">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <div class="mt-6">
                    <div class="mb-2 flex items-center justify-between text-xs text-slate-500">
                        <span>Spending progress</span>
                        <span class="font-semibold text-slate-700">{{ round($budgetProgress) }}%</span>
                    </div>
                    <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full rounded-full bg-gradient-to-r from-[#6C63FF] to-[#8B83FF] transition-all duration-300"
                            style="width: {{ $budgetProgress }}%"></div>
                    </div>
                    <div class="mt-4 flex items-center justify-between text-sm">
                        <span class="text-slate-500">Spent</span>
                        <span class="font-semibold text-rose-500">Rp {{ number_format($spentValue, 0, ',', '.') }}</span>
                    </div>
                    <div class="mt-2 flex items-center justify-between text-sm">
                        <span class="text-slate-500">Remaining</span>
                        <span class="font-semibold text-emerald-600">Rp
                            {{ number_format($remainingValue, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <x-stat-card label="Total budget" :value="'Rp ' . number_format($budgetValue, 0, ',', '.')" :icon="'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z'" tone="indigo" hint="Updated monthly" />

            <x-stat-card label="Spent" :value="'Rp ' . number_format($spentValue, 0, ',', '.')" :icon="'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'" tone="rose" hint="Current burn rate" />

            <x-stat-card label="Remaining" :value="'Rp ' . number_format($remainingValue, 0, ',', '.')" :icon="'M5 13l4 4L19 7'" tone="emerald" hint="Available to use" />

            <x-stat-card label="Tasks pending" :value="$pendingTasks . ' tasks'" :icon="'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'" tone="amber" hint="Priority queue" />
        </section>

        <section class="grid gap-5 xl:grid-cols-[1.5fr_1fr]">
            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between gap-3">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Progress</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Monthly overview</h3>
                    </div>
                    <span class="badge-neutral">{{ round($budgetProgress) }}% used</span>
                </div>

                <div class="space-y-4">
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="text-slate-600">Budget used</span>
                            <span class="font-semibold text-slate-800">Rp
                                {{ number_format($spentValue, 0, ',', '.') }}</span>
                        </div>
                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-gradient-to-r from-[#6C63FF] to-[#8B83FF]"
                                style="width: {{ min(100, $budgetProgress) }}%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm">
                            <span class="text-slate-600">Remaining</span>
                            <span class="font-semibold text-emerald-600">Rp
                                {{ number_format($remainingValue, 0, ',', '.') }}</span>
                        </div>
                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-gradient-to-r from-emerald-500 to-teal-500"
                                style="width: {{ max(0, 100 - $budgetProgress) }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-4 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Low stock</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Inventory watch</h3>
                    </div>
                    <span class="badge-info">{{ $lowStockItems->count() }}</span>
                </div>

                @forelse ($lowStockItems as $item)
                    <div
                        class="mb-3 flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50/80 p-3 last:mb-0">
                        <div class="grid h-9 w-9 place-items-center rounded-lg bg-amber-100 text-amber-600">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="truncate text-sm font-semibold text-slate-800">
                                {{ $item->ingredient->name ?? 'Inventory item' }}</p>
                            <p class="text-xs text-slate-500">{{ $item->quantity ?? 0 }} left</p>
                        </div>
                    </div>
                @empty
                    <x-empty-state title="Inventory looks good" message="No low-stock items are currently flagged." />
                @endforelse
            </div>
        </section>

        <section class="grid gap-5 xl:grid-cols-[1.3fr_1fr]">
            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between gap-3">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Soon</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Today’s schedule</h3>
                    </div>
                    <a href="{{ route('schedules.index') }}" wire:navigate
                        class="text-sm font-semibold text-[#6C63FF] hover:text-[#5d53ef]">See all</a>
                </div>

                @forelse ($todaySchedules as $schedule)
                    <div
                        class="mb-3 flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50/80 p-3 last:mb-0">
                        <div class="mt-1 h-9 w-1.5 rounded-full bg-gradient-to-b from-[#6C63FF] to-[#8B83FF]"></div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-semibold text-slate-800">{{ $schedule->title }}</p>
                            <p class="mt-1 text-xs text-slate-500">{{ $schedule->start_time?->format('H:i') ?? '--:--' }} ·
                                {{ $schedule->category ?? 'General' }}</p>
                        </div>
                        <span class="badge-info">{{ $schedule->start_time?->format('H:i') ?? '--:--' }}</span>
                    </div>
                @empty
                    <x-empty-state title="No schedule today" message="Your day is clear and ready for focus." />
                @endforelse
            </div>

            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between gap-3">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Alerts</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Upcoming reminders</h3>
                    </div>
                    <span class="badge-neutral">{{ $upcomingReminders->count() }}</span>
                </div>

                @forelse ($upcomingReminders as $reminder)
                    <div
                        class="mb-3 flex items-start gap-3 rounded-xl border border-slate-200 bg-slate-50/80 p-3 last:mb-0">
                        <div class="grid h-9 w-9 place-items-center rounded-lg bg-[#6C63FF]/10 text-[#6C63FF]">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-semibold text-slate-800">{{ $reminder->title }}</p>
                            <p class="mt-1 text-xs text-slate-500">
                                {{ $reminder->reminder_time?->format('d M Y, H:i') ?? 'No date' }}</p>
                        </div>
                    </div>
                @empty
                    <x-empty-state title="No reminders" message="You’re all caught up for now." />
                @endforelse
            </div>
        </section>
    </div>
@endsection
