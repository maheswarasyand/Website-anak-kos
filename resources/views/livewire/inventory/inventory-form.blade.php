<div>
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-inventory-form">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" wire:click="$set('showModal', false)"></div>

            <div class="relative min-h-full flex items-center justify-center p-4">
                <div class="relative w-full max-w-lg card card-pad animate-slide-up">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-base font-semibold text-slate-800">
                                {{ $editingId ? 'Edit Bahan' : 'Tambah Bahan' }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Kelola stok bahan makananmu</p>
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
                            <label class="label">Bahan</label>
                            <select wire:model="ingredient_id" class="input">
                                <option value="">Pilih bahan…</option>
                                @foreach ($ingredients as $ing)
                                    <option value="{{ $ing->id }}">{{ $ing->name }} ({{ $ing->unit }})
                                    </option>
                                @endforeach
                            </select>
                            @error('ingredient_id')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="label">Jumlah</label>
                                <input type="number" step="0.01" wire:model="quantity" class="input"
                                    placeholder="0">
                                @error('quantity')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label">Minimum Stok</label>
                                <input type="number" step="0.01" wire:model="minimum_stock" class="input"
                                    placeholder="0">
                                @error('minimum_stock')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="label">Tanggal Kadaluarsa (opsional)</label>
                            <input type="date" wire:model="expiry_date" class="input">
                            @error('expiry_date')
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
