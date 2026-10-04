<div>
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-expense-form">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" wire:click="$set('showModal', false)"></div>

            <div class="relative min-h-full flex items-center justify-center p-4">
                <div class="relative w-full max-w-lg card card-pad animate-slide-up">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-base font-semibold text-slate-800">
                                {{ $editingId ? 'Edit Pengeluaran' : 'Catat Pengeluaran' }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Catat setiap pengeluaran kamu</p>
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
                            <label class="label">Budget Periode</label>
                            <select wire:model="budget_id" class="input">
                                <option value="">Pilih periode…</option>
                                @foreach ($allBudgets as $b)
                                    <option value="{{ $b->id }}">
                                        {{ \Carbon\Carbon::create()->month($b->month)->translatedFormat('F') }}
                                        {{ $b->year }}
                                    </option>
                                @endforeach
                            </select>
                            @error('budget_id')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="label">Kategori</label>
                                <select wire:model="category" class="input">
                                    @foreach ($categories as $c)
                                        <option value="{{ $c }}">{{ $c }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label">Tanggal</label>
                                <input type="date" wire:model="expense_date" class="input">
                                @error('expense_date')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="label">Jumlah</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm">Rp</span>
                                <input type="number" wire:model="amount" class="input pl-10" min="0"
                                    step="500" placeholder="0">
                            </div>
                            @error('amount')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Deskripsi (opsional)</label>
                            <input type="text" wire:model="description" class="input"
                                placeholder="Contoh: Makan siang di warteg">
                            @error('description')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

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
