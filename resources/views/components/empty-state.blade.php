@props(['title' => 'Belum ada data', 'message' => 'Data akan muncul di sini setelah ditambahkan.'])

<div class="flex min-h-[220px] items-center justify-center py-8">
    <div class="w-full max-w-md rounded-2xl border border-slate-200 bg-slate-50/80 px-6 py-10 text-center">
        <div
            class="mx-auto grid h-16 w-16 place-items-center rounded-2xl bg-white text-[#6C63FF] shadow-sm ring-1 ring-[#6C63FF]/10">
            <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
            </svg>
        </div>
        <p class="mt-5 text-lg font-semibold text-slate-800">{{ $title }}</p>
        <p class="mt-2 text-sm leading-6 text-slate-500">{{ $message }}</p>
    </div>
</div>
