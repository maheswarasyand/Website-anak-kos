<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Overview</p>
            <h3 class="mt-1 text-2xl font-bold tracking-[-0.05em] text-slate-900">Inventory</h3>
        </div>
        <button type="button" class="btn-primary">Add item</button>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="card card-pad card-hover">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Total items</p>
            <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">142</p>
            <p class="mt-2 text-sm text-slate-500">Across all categories</p>
        </div>
        <div class="card card-pad card-hover">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Low stock</p>
            <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">07</p>
            <p class="mt-2 text-sm text-amber-600">Action needed</p>
        </div>
        <div class="card card-pad card-hover">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Health</p>
            <p class="mt-3 text-3xl font-bold tracking-[-0.05em] text-slate-900">92%</p>
            <p class="mt-2 text-sm text-emerald-600">Stable</p>
        </div>
    </div>

    <div class="card card-pad">
        <div class="mb-5 flex items-center justify-between">
            <h3 class="text-xl font-semibold text-slate-900">Stock list</h3>
            <span class="badge-neutral">Updated today</span>
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
                            Qty</th>
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
