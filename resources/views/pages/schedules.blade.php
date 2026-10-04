@extends('layouts.app')

@section('title', 'Schedules')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Schedules" subtitle="Plan your routines, chores, and key appointments in one polished timeline."
            icon="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />

        <section class="grid gap-5 xl:grid-cols-[1.2fr_0.8fr]">
            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Calendar</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">This week</h3>
                    </div>
                    <button type="button" class="btn-secondary">New schedule</button>
                </div>

                <div class="grid gap-3 sm:grid-cols-7">
                    @php $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']; @endphp
                    @foreach ($days as $day)
                        <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3 text-center">
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                {{ $day }}</p>
                            <p class="mt-2 text-2xl font-bold text-slate-900">{{ 8 + $loop->index }}</p>
                            <div class="mt-3 space-y-2">
                                @if ($loop->index % 2 === 0)
                                    <div
                                        class="rounded-lg bg-indigo-100 px-2 py-1 text-[10px] font-semibold text-indigo-700">
                                        Laundry</div>
                                @endif
                                @if ($loop->index === 2)
                                    <div
                                        class="rounded-lg bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                                        Groceries</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Today</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">Agenda</h3>
                </div>

                <div class="space-y-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-900">Morning clean-up</p>
                        <p class="mt-1 text-xs text-slate-500">08:00 - 09:00</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-900">Budget review</p>
                        <p class="mt-1 text-xs text-slate-500">11:30 - 12:00</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-900">Weekly grocery run</p>
                        <p class="mt-1 text-xs text-slate-500">17:00 - 18:15</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
