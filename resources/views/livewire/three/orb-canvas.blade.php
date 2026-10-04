<div wire:key="canvas-{{ $canvasId }}">
    <div id="{{ $canvasId }}" data-3d="{{ $type }}" data-chart='@json($chartData)'
        class="relative {{ $height }} rounded-2xl overflow-hidden
               bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900
               ring-1 ring-slate-900/10">

        <div
            class="pointer-events-none absolute inset-0 opacity-[0.08]
                    bg-[linear-gradient(rgba(255,255,255,.6)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.6)_1px,transparent_1px)]
                    bg-[size:32px_32px]">
        </div>

        <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-indigo-500/30 blur-3xl">
        </div>
        <div class="pointer-events-none absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-violet-500/20 blur-3xl">
        </div>

        @if (!$slot->isEmpty())
            <div class="relative z-10 p-6 h-full flex flex-col justify-between pointer-events-none">
                {{ $slot }}
            </div>
        @endif
    </div>

    @script
        <script>
            const el = document.getElementById('{{ $canvasId }}');
            if (el && el.dataset.mounted !== '1') {
                el.dataset.mounted = '1';
                const type = el.dataset['3d'];
                const chart = JSON.parse(el.dataset.chart || '[]');
                if (type === 'orb') window.SmartKos3D?.initDashboardOrb('{{ $canvasId }}');
                if (type === 'hero') window.SmartKos3D?.initHeroCube('{{ $canvasId }}');
                if (type === 'budget-chart') window.SmartKos3D?.initBudgetChart3D('{{ $canvasId }}', chart);
            }
        </script>
    @endscript
</div>
