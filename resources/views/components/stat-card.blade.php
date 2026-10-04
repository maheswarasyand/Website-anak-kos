@props(['label', 'value', 'icon' => null, 'tone' => 'indigo', 'hint' => null])

@php
    $tones = [
        'indigo' => [
            'bg' => 'linear-gradient(135deg, rgba(108,99,255,0.18), rgba(108,99,255,0.08))',
            'icon' => '#6C63FF',
        ],
        'emerald' => [
            'bg' => 'linear-gradient(135deg, rgba(34,197,94,0.15), rgba(16,185,129,0.07))',
            'icon' => '#22C55E',
        ],
        'amber' => [
            'bg' => 'linear-gradient(135deg, rgba(245,158,11,0.16), rgba(251,146,60,0.07))',
            'icon' => '#F59E0B',
        ],
        'rose' => ['bg' => 'linear-gradient(135deg, rgba(239,68,68,0.16), rgba(244,63,94,0.07))', 'icon' => '#EF4444'],
    ];
@endphp

<div class="card card-pad card-hover">
    <div class="flex items-start justify-between gap-3">
        <div class="min-w-0">
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $label }}</p>
            <p class="mt-3 text-2xl font-bold tracking-[-0.04em] text-slate-900 sm:text-[2rem]">{{ $value }}</p>
            @if ($hint)
                <p class="mt-2 text-xs text-slate-500">{{ $hint }}</p>
            @endif
        </div>
        @if ($icon)
            <div class="grid h-11 w-11 shrink-0 place-items-center rounded-xl border border-white/60 shadow-sm"
                style="background: {{ $tones[$tone]['bg'] }}; color: {{ $tones[$tone]['icon'] }};">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="{{ $icon }}" />
                </svg>
            </div>
        @endif
    </div>
</div>
