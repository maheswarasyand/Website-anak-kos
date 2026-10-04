@extends('layouts.app')

@section('title', 'Reminders')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Reminders" subtitle="Keep your daily routines and important tasks on track without friction."
            icon="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />

        <section class="grid gap-5 xl:grid-cols-[1.2fr_0.8fr]">
            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Upcoming</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Reminder timeline</h3>
                    </div>
                    <button type="button" class="btn-secondary">Add reminder</button>
                </div>

                <div class="space-y-4">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Pay electricity bill</p>
                                <p class="mt-1 text-xs text-slate-500">Today, 18:00</p>
                            </div>
                            <span class="badge-info">Due soon</span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Check grocery stock</p>
                                <p class="mt-1 text-xs text-slate-500">Tomorrow, 09:00</p>
                            </div>
                            <span class="badge-neutral">Planned</span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Laundry pickup</p>
                                <p class="mt-1 text-xs text-slate-500">Thursday, 15:30</p>
                            </div>
                            <span class="badge-neutral">Scheduled</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Summary</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">This week</h3>
                </div>

                <div class="space-y-4">
                    <div class="rounded-2xl bg-indigo-50 p-4">
                        <p class="text-sm text-indigo-700">Pending</p>
                        <p class="mt-2 text-3xl font-bold tracking-[-0.05em] text-indigo-900">05</p>
                    </div>
                    <div class="rounded-2xl bg-emerald-50 p-4">
                        <p class="text-sm text-emerald-700">Completed</p>
                        <p class="mt-2 text-3xl font-bold tracking-[-0.05em] text-emerald-900">12</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
