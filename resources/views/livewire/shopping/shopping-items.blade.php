<div>
    {{-- Item Modal --}}
    @if ($showItemModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-item-form">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" wire:click="$set('showItemModal', false)"></div>

            <div class="relative min-h-full flex items-center justify-center p-4">
                <div class="relative w-full max-w-md card card-pad animate-slide-up">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-base font-semibold text-slate-800">
                            {{ $editingItemId ? 'Edit Item' : 'Item Baru' }}
                        </h3>
                        <button wire:click="$set('showItemModal', false)"
                            class="p-1.5 rounded-lg text-slate-400 hover:bg-slate-100">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <form wire:submit="saveItem" class="space-y-4">
                        <div>
                            <label class="label">Bahan (opsional)</label>
                            <select wire:model.live="ingredient_id" class="input">
                                <option value="">— Custom —</option>
                                @foreach ($ingredients as $ing)
                                    <option value="{{ $ing->id }}">{{ $ing->name }} ({{ $ing->unit }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="label">Nama Item</label>
                            <input type="text" wire:model="item_name" class="input" placeholder="Beras">
                            @error('item_name')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-3 gap-2">
                            <div>
                                <label class="label">Qty</label>
                                <input type="number" step="0.01" wire:model="quantity" class="input"
                                    placeholder="0">
                            </div>
                            <div>
                                <label class="label">Satuan</label>
                                <input type="text" wire:model="unit" class="input" placeholder="kg">
                            </div>
                            <div>
                                <label class="label">Estimasi</label>
                                <input type="number" wire:model="estimated_price" class="input" placeholder="0">
                            </div>
                        </div>

                        <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                            <button type="button" wire:click="$set('showItemModal', false)"
                                class="btn-secondary">Batal</button>
                            <button type="submit" class="btn-primary" wire:loading.attr="disabled"
                                wire:target="saveItem">
                                <span wire:loading.remove wire:target="saveItem">Simpan</span>
                                <span wire:loading wire:target="saveItem">Menyimpan…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
