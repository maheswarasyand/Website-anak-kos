@props([
    'id' => 'canvas-' . uniqid(),
    'type' => 'orb', // orb | hero | budget-chart
    'height' => 'h-80',
    'data' => [],
    'class' => '',
])

@php
    $chartJson = is_array($data) ? json_encode($data) : $data;
@endphp

<div id="{{ $id }}" data-3d="{{ $type }}" data-chart="{{ $chartJson }}"
    class="relative {{ $height }} rounded-2xl overflow-hidden
           bg-gradient-to-br from-slate-900 via-indigo-950 to-slate-900
           ring-1 ring-slate-900/10 {{ $class }}"
    wire:ignore>

    {{-- Grid overlay --}}
    <div
        class="pointer-events-none absolute inset-0 opacity-[0.08]
                bg-[linear-gradient(rgba(255,255,255,.6)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,.6)_1px,transparent_1px)]
                bg-[size:32px_32px]">
    </div>

    {{-- Corner glows --}}
    <div class="pointer-events-none absolute -top-16 -right-16 w-64 h-64 rounded-full bg-indigo-500/30 blur-3xl"></div>
    <div class="pointer-events-none absolute -bottom-16 -left-16 w-64 h-64 rounded-full bg-violet-500/20 blur-3xl"></div>

    {{-- Slot overlay (teks/tombol di atas canvas) --}}
    @if (!$slot->isEmpty())
        <div class="relative z-10 p-6 h-full flex flex-col justify-between pointer-events-none">
            {{ $slot }}
        </div>
    @endif
</div>

@push('scripts')
    <script>
        (function() {
            const canvasId = @json($id);
            const mount = () => {
                const el = document.getElementById(canvasId);
                if (!el || el.dataset.mounted === '1') return;
                if (!window.SmartKos3D) return setTimeout(mount, 50);

                el.dataset.mounted = '1';
                const type = el.dataset['3d'];
                const chart = JSON.parse(el.dataset.chart || '[]');

                if (type === 'orb') window.SmartKos3D.initDashboardOrb(canvasId);
                if (type === 'hero') window.SmartKos3D.initHeroCube(canvasId);
                if (type === 'budget-chart') window.SmartKos3D.initBudgetChart3D(canvasId, chart);
            };
            document.addEventListener('DOMContentLoaded', mount);
            document.addEventListener('livewire:navigated', mount);
        })();
    </script>
@endpush
