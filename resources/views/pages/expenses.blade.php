@extends('layouts.app')

@section('title', 'Expenses')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Expenses" subtitle="Review spend habits and spot rising costs before they become issues."
            icon="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />

        <section class="grid gap-4 md:grid-cols-3">
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Total spend</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">Rp 2.160.000</p>
                <p class="mt-2 text-sm text-rose-500">+12.5% this week</p>
            </div>
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Average daily</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">Rp 72.000</p>
                <p class="mt-2 text-sm text-slate-500">Across 30 days</p>
            </div>
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Largest category</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">Food</p>
                <p class="mt-2 text-sm text-slate-500">Rp 890.000</p>
            </div>
        </section>

        <div class="card card-pad">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Transactions</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">Recent expense log</h3>
                </div>
                <button type="button" class="btn-secondary">Add expense</button>
            </div>

            <div class="overflow-hidden rounded-2xl border border-slate-200">
                <table class="table-modern">
                    <thead class="bg-slate-50">
                        <tr>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Title</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Category</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Date</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Groceries</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Food</td>
                            <td class="px-4 py-3 text-sm text-slate-600">12 Sep 2026</td>
                            <td class="px-4 py-3 text-sm font-semibold text-slate-900">Rp 260.000</td>
                        </tr>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Laundry</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Household</td>
                            <td class="px-4 py-3 text-sm text-slate-600">10 Sep 2026</td>
                            <td class="px-4 py-3 text-sm font-semibold text-slate-900">Rp 48.000</td>
                        </tr>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Electricity</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Utilities</td>
                            <td class="px-4 py-3 text-sm text-slate-600">8 Sep 2026</td>
                            <td class="px-4 py-3 text-sm font-semibold text-slate-900">Rp 120.000</td>
                        </tr>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Cleaning supplies</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Homecare</td>
                            <td class="px-4 py-3 text-sm text-slate-600">6 Sep 2026</td>
                            <td class="px-4 py-3 text-sm font-semibold text-slate-900">Rp 90.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
