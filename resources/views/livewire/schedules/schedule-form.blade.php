<div>
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-schedule-form">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" wire:click="$set('showModal', false)"></div>

            <div class="relative min-h-full flex items-center justify-center p-4">
                <div class="relative w-full max-w-lg card card-pad animate-slide-up">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-base font-semibold text-slate-800">
                            {{ $editingId ? 'Edit Jadwal' : 'Jadwal Baru' }}
                        </h3>
                        <button wire:click="$set('showModal', false)"
                            class="p-1.5 rounded-lg text-slate-400 hover:bg-slate-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form wire:submit="save" class="space-y-4">
                        <div>
                            <label class="label">Judul</label>
                            <input type="text" wire:model="title" class="input"
                                placeholder="Kuliah Pemrograman Web">
                            @error('title')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Kategori</label>
                            <input type="text" wire:model="category" class="input"
                                placeholder="Kuliah / Kerja / Olahraga">
                            @error('category')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="label">Mulai</label>
                                <input type="datetime-local" wire:model="start_time" class="input">
                                @error('start_time')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label">Selesai (opsional)</label>
                                <input type="datetime-local" wire:model="end_time" class="input">
                                @error('end_time')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="label">Deskripsi (opsional)</label>
                            <textarea wire:model="description" rows="2" class="input" placeholder="Catatan…"></textarea>
                        </div>

                        <div class="flex justify-between pt-3 border-t border-slate-100">
                            @if ($editingId)
                                <button type="button" wire:click="delete({{ $editingId }})"
                                    wire:confirm="Hapus jadwal ini?" class="btn-danger btn-sm">
                                    Hapus
                                </button>
                            @endif
                            <div class="ml-auto flex gap-2">
                                <button type="button" wire:click="$set('showModal', false)"
                                    class="btn-secondary">Batal</button>
                                <button type="submit" class="btn-primary" wire:loading.attr="disabled"
                                    wire:target="save">
                                    <span wire:loading.remove wire:target="save">Simpan</span>
                                    <span wire:loading wire:target="save">Menyimpan…</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
