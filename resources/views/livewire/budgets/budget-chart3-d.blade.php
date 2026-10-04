<div>
    @if ($chartData && count($chartData))
        <x-canvas-3d :id="'budget-chart-' . $this->getId()" type="budget-chart" height="h-80" :data="$chartData"
            wire:key="budget-chart-{{ md5(json_encode($chartData)) }}" />
    @else
        <div class="h-80 rounded-2xl bg-slate-50 grid place-items-center">
            <x-empty-state title="Belum ada data chart" message="Tambahkan pengeluaran untuk melihat visualisasi 3D." />
        </div>
    @endif
</div>
