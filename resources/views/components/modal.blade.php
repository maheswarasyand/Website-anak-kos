@props(['name', 'title', 'maxWidth' => 'max-w-lg'])

<div x-data="{ open: false }" x-on:open-modal-{{ $name }}.window="open = true"
    x-on:close-modal-{{ $name }}.window="open = false" x-show="open" x-cloak
    class="fixed inset-0 z-50 overflow-y-auto">

    <div x-show="open" x-transition.opacity @click="open = false" class="fixed inset-0 bg-slate-900/45 backdrop-blur-sm">
    </div>

    <div class="relative flex min-h-full items-center justify-center p-4">
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 translate-y-3 scale-[0.98]"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            class="relative w-full {{ $maxWidth }} rounded-2xl border border-slate-200 bg-white/95 p-5 shadow-[0_24px_60px_rgba(15,23,42,0.12)] backdrop-blur-sm sm:p-6">
            <div class="mb-5 flex items-center justify-between gap-3">
                <div>
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-400">Modal</p>
                    <h3 class="text-lg font-semibold text-slate-800">{{ $title }}</h3>
                </div>
                <button @click="open = false" type="button"
                    class="grid h-9 w-9 place-items-center rounded-lg text-slate-400 transition hover:bg-slate-100 hover:text-slate-700"
                    aria-label="Close dialog">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            {{ $slot }}
        </div>
    </div>
</div>
