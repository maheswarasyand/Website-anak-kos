@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Recipes" subtitle="Find budget-friendly and practical meals for everyday living."
            icon="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />

        <div class="card card-pad">
            <div class="mb-5 flex flex-wrap items-center gap-2">
                <span class="badge-info">All</span>
                <span class="badge-neutral">Breakfast</span>
                <span class="badge-neutral">Lunch</span>
                <span class="badge-neutral">Dinner</span>
                <span class="badge-neutral">Budget</span>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
                <article class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4">
                    <div class="mb-3 h-40 rounded-xl bg-gradient-to-br from-amber-200 via-orange-100 to-rose-100"></div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Budget</p>
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">Daily rice bowl</h3>
                    <p class="mt-2 text-sm text-slate-500">Rice, egg, spinach, and soy sauce in one quick bowl.</p>
                </article>
                <article class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4">
                    <div class="mb-3 h-40 rounded-xl bg-gradient-to-br from-emerald-200 via-teal-100 to-cyan-100"></div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Healthy</p>
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">Veggie noodle stir fry</h3>
                    <p class="mt-2 text-sm text-slate-500">Colorful, fast, and flexible for busy evenings.</p>
                </article>
                <article class="rounded-2xl border border-slate-200 bg-slate-50/70 p-4">
                    <div class="mb-3 h-40 rounded-xl bg-gradient-to-br from-violet-200 via-indigo-100 to-purple-100"></div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Family</p>
                    <h3 class="mt-2 text-lg font-semibold text-slate-900">Chicken stew</h3>
                    <p class="mt-2 text-sm text-slate-500">Comforting meal with potatoes, carrots, and herbs.</p>
                </article>
            </div>
        </div>
    </div>
@endsection
