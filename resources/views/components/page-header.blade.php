@props(['title', 'subtitle' => null, 'breadcrumb' => null, 'icon' => null])

<div class="mb-6">
    @if ($breadcrumb)
        <nav class="mb-3 flex items-center gap-2 text-[11px] font-medium uppercase tracking-[0.18em] text-slate-400">
            <span>{{ $breadcrumb }}</span>
        </nav>
    @endif

    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div class="flex items-start gap-3">
            @if ($icon)
                <div
                    class="grid h-11 w-11 place-items-center rounded-xl bg-[#6C63FF]/10 text-[#6C63FF] ring-1 ring-[#6C63FF]/10">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="{{ $icon }}" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
            @endif
            <div>
                <h2 class="text-2xl font-bold tracking-[-0.04em] text-slate-900 sm:text-3xl">{{ $title }}</h2>
                @if ($subtitle)
                    <p class="mt-1 text-sm text-slate-500">{{ $subtitle }}</p>
                @endif
            </div>
        </div>

        @if (!$slot->isEmpty())
            <div class="flex items-center gap-2">{{ $slot }}</div>
        @endif
    </div>
</div>
