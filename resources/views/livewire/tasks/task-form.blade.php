<div>
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-task-form">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" wire:click="$set('showModal', false)"></div>

            <div class="relative min-h-full flex items-center justify-center p-4">
                <div class="relative w-full max-w-lg card card-pad animate-slide-up">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-base font-semibold text-slate-800">
                                {{ $editingId ? 'Edit Tugas' : 'Tugas Baru' }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Kelola tugas harianmu</p>
                        </div>
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
                            <label class="label">Judul Tugas</label>
                            <input type="text" wire:model="title" class="input"
                                placeholder="Kerjakan laporan praktikum">
                            @error('title')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Deskripsi (opsional)</label>
                            <textarea wire:model="description" rows="2" class="input" placeholder="Detail tugas…"></textarea>
                            @error('description')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div>
                                <label class="label">Kategori</label>
                                <input type="text" wire:model="category" class="input" placeholder="Kuliah">
                            </div>
                            <div>
                                <label class="label">Prioritas</label>
                                <select wire:model="priority" class="input">
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                            </div>
                            <div>
                                <label class="label">Status</label>
                                <select wire:model="status" class="input">
                                    <option value="pending">Pending</option>
                                    <option value="in_progress">Dikerjakan</option>
                                    <option value="completed">Selesai</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="label">Deadline (opsional)</label>
                            <input type="datetime-local" wire:model="due_date" class="input">
                            @error('due_date')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50">
                            <input type="checkbox" id="is_recurring" wire:model.live="is_recurring"
                                class="w-4 h-4 rounded border-slate-300 text-indigo-600 focus:ring-indigo-500">
                            <label for="is_recurring" class="text-sm text-slate-700 cursor-pointer flex-1">
                                Tugas berulang?
                            </label>
                        </div>

                        @if ($is_recurring)
                            <div>
                                <label class="label">Tipe Perulangan</label>
                                <select wire:model="recurrence_type" class="input">
                                    <option value="">Pilih tipe…</option>
                                    <option value="daily">Harian</option>
                                    <option value="weekly">Mingguan</option>
                                    <option value="monthly">Bulanan</option>
                                </select>
                                @error('recurrence_type')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        @endif

                        <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                            <button type="button" wire:click="$set('showModal', false)"
                                class="btn-secondary">Batal</button>
                            <button type="submit" class="btn-primary" wire:loading.attr="disabled" wire:target="save">
                                <span wire:loading.remove wire:target="save">Simpan</span>
                                <span wire:loading wire:target="save">Menyimpan…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
