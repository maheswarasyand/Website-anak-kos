@extends('layouts.app')

@section('title', 'Shopping Lists')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Shopping Lists"
            subtitle="Organize essentials, meal ingredients, and household needs in one place."
            icon="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />

        <section class="grid gap-5 xl:grid-cols-[1.2fr_0.8fr]">
            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Lists</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Current carts</h3>
                    </div>
                    <button type="button" class="btn-secondary">New list</button>
                </div>

                <div class="space-y-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Groceries</p>
                                <p class="mt-1 text-xs text-slate-500">8 items left</p>
                            </div>
                            <span class="badge-info">Active</span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Home supplies</p>
                                <p class="mt-1 text-xs text-slate-500">4 items left</p>
                            </div>
                            <span class="badge-neutral">Planned</span>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-4">
                        <div class="flex items-center justify-between gap-3">
                            <div>
                                <p class="text-sm font-semibold text-slate-900">Monthly restock</p>
                                <p class="mt-1 text-xs text-slate-500">12 items left</p>
                            </div>
                            <span class="badge-neutral">Queued</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Quick view</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">Budget status</h3>
                </div>

                <div class="space-y-4">
                    <div class="rounded-2xl bg-emerald-50 p-4">
                        <p class="text-sm text-emerald-700">Total expected</p>
                        <p class="mt-2 text-3xl font-bold tracking-[-0.05em] text-emerald-900">Rp 520.000</p>
                    </div>
                    <div class="rounded-2xl bg-indigo-50 p-4">
                        <p class="text-sm text-indigo-700">Estimated savings</p>
                        <p class="mt-2 text-3xl font-bold tracking-[-0.05em] text-indigo-900">Rp 140.000</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
