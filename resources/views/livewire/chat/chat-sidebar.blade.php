<div class="card card-pad flex flex-col h-full">
    <div class="flex items-center justify-between mb-3">
        <h3 class="section-title">Percakapan</h3>
        <button wire:click="newSession" class="p-1.5 rounded-lg text-indigo-600 hover:bg-indigo-50"
            title="Percakapan Baru">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </div>

    <div class="flex-1 overflow-y-auto space-y-1 -mx-1">
        @forelse($sessions as $s)
            <div wire:key="sess-{{ $s->id }}" wire:click="selectSession({{ $s->id }})"
                class="flex items-center gap-2 px-3 py-2 rounded-xl cursor-pointer text-sm transition
                        {{ $s->id === $activeSessionId
                            ? 'bg-indigo-50 text-indigo-700 font-semibold'
                            : 'hover:bg-slate-50 text-slate-600' }}">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <span class="truncate flex-1">{{ $s->title }}</span>
            </div>
        @empty
            <p class="text-xs text-slate-400 text-center py-6">Belum ada percakapan.</p>
        @endforelse
    </div>
</div>
