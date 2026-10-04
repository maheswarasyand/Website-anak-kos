@extends('layouts.app')

@section('title', 'Inventory')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Inventory" subtitle="Keep your home inventory in check and stock up before essentials run low."
            icon="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />

        <section class="grid gap-4 md:grid-cols-3">
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Total items</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">142</p>
                <p class="mt-2 text-sm text-slate-500">Across kitchen and storage</p>
            </div>
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Low stock</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">7</p>
                <p class="mt-2 text-sm text-amber-600">Needs attention</p>
            </div>
            <div class="card card-pad card-hover">
                <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Inventory health</p>
                <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">92%</p>
                <p class="mt-2 text-sm text-emerald-600">Stable</p>
            </div>
        </section>

        <div class="card card-pad">
            <div class="mb-5 flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Stock list</p>
                    <h3 class="mt-1 text-xl font-semibold text-slate-900">Inventory overview</h3>
                </div>
                <button type="button" class="btn-secondary">Add item</button>
            </div>

            <div class="overflow-hidden rounded-2xl border border-slate-200">
                <table class="table-modern">
                    <thead class="bg-slate-50">
                        <tr>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Item</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Category</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Stock</th>
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Rice</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Staples</td>
                            <td class="px-4 py-3 text-sm text-slate-600">28 kg</td>
                            <td class="px-4 py-3"><span class="badge-info">Healthy</span></td>
                        </tr>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Cooking oil</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Pantry</td>
                            <td class="px-4 py-3 text-sm text-slate-600">4 bottles</td>
                            <td class="px-4 py-3"><span class="badge-neutral">Stable</span></td>
                        </tr>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Eggs</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Protein</td>
                            <td class="px-4 py-3 text-sm text-slate-600">8 packs</td>
                            <td class="px-4 py-3"><span class="badge-neutral">Stable</span></td>
                        </tr>
                        <tr class="border-t border-slate-200 bg-white">
                            <td class="px-4 py-3 text-sm font-medium text-slate-800">Detergent</td>
                            <td class="px-4 py-3 text-sm text-slate-600">Cleaning</td>
                            <td class="px-4 py-3 text-sm text-slate-600">1 bottle</td>
                            <td class="px-4 py-3"><span class="badge-neutral">Low</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
