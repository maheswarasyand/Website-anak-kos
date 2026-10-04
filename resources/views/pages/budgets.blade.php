@extends('layouts.app')

@section('title', 'Budgets')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Budgets" subtitle="Monitor monthly cash flow and keep spending aligned with your plan."
            icon="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

        <section class="grid gap-4 md:grid-cols-3">
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Current budget</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">Rp 3.400.000</p>
                <p class="mt-2 text-sm text-emerald-600">+8.4% vs last month</p>
            </div>
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Spent</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">Rp 2.160.000</p>
                <p class="mt-2 text-sm text-slate-500">This month</p>
            </div>
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Remaining</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">Rp 1.240.000</p>
                <p class="mt-2 text-sm text-slate-500">Healthy reserve</p>
            </div>
        </section>

        <section class="grid gap-5 xl:grid-cols-[1.4fr_0.8fr]">
            <div class="card card-pad">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Recent</p>
                        <h3 class="mt-1 text-xl font-semibold text-slate-900">Monthly record</h3>
                    </div>
                    <button type="button" class="btn-secondary">Add budget</button>
                </div>

                <div class="overflow-hidden rounded-2xl border border-slate-200">
                    <table class="table-modern">
                        <thead class="bg-slate-50">
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Category</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Plan</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Used</th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                    Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t border-slate-200 bg-white">
                                <td class="px-4 py-3 text-sm font-medium text-slate-800">Groceries</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 900.000</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 680.000</td>
                                <td class="px-4 py-3"><span class="badge-info">Healthy</span></td>
                            </tr>
                            <tr class="border-t border-slate-200 bg-white">
                                <td class="px-4 py-3 text-sm font-medium text-slate-800">Utilities</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 650.000</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 610.000</td>
                                <td class="px-4 py-3"><span class="badge-neutral">On track</span></td>
                            </tr>
                            <tr class="border-t border-slate-200 bg-white">
                                <td class="px-4 py-3 text-sm font-medium text-slate-800">Household</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 550.000</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 480.000</td>
                                <td class="px-4 py-3"><span class="badge-neutral">On track</span></td>
                            </tr>
                            <tr class="border-t border-slate-200 bg-white">
                                <td class="px-4 py-3 text-sm font-medium text-slate-800">Savings</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 1.300.000</td>
                                <td class="px-4 py-3 text-sm text-slate-600">Rp 390.000</td>
                                <td class="px-4 py-3"><span class="badge-info">Strong</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-5">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Breakdown</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">Category split</h3>
                </div>

                <div class="space-y-4">
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm text-slate-600">
                            <span>Groceries</span>
                            <span class="font-semibold text-slate-800">72%</span>
                        </div>
                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-[72%] rounded-full bg-gradient-to-r from-indigo-500 to-violet-500"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm text-slate-600">
                            <span>Utilities</span>
                            <span class="font-semibold text-slate-800">58%</span>
                        </div>
                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-[58%] rounded-full bg-gradient-to-r from-emerald-500 to-teal-500"></div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2 flex items-center justify-between text-sm text-slate-600">
                            <span>Household</span>
                            <span class="font-semibold text-slate-800">62%</span>
                        </div>
                        <div class="h-2.5 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full w-[62%] rounded-full bg-gradient-to-r from-amber-400 to-orange-400"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
