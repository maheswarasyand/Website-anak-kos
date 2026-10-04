<div class="animate-fade-in">
    @section('title', 'Pengeluaran')
    @section('subtitle', 'Catat dan pantau semua pengeluaran kamu')

    {{-- Filter --}}
    <div class="card card-pad mb-6">
        <div class="flex flex-wrap items-end gap-3">
            <div>
                <label class="label">Bulan</label>
                <select wire:model.live="month" class="input">
                    @for ($m = 1; $m <= 12; $m++)
                        <option value="{{ $m }}">
                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                        </option>
                    @endfor
                </select>
            </div>
            <div>
                <label class="label">Tahun</label>
                <input type="number" wire:model.live="year" class="input w-32" min="2020" max="2100">
            </div>
            <div class="ml-auto">
                <button class="btn-primary" wire:click="openCreate" @disabled(!$budget)>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    Catat Pengeluaran
                </button>
            </div>
        </div>

        @if (!$budget)
            <div
                class="mt-4 rounded-xl bg-amber-50 border border-amber-200 px-4 py-3 text-sm text-amber-800 flex items-center gap-2">
                <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Kamu belum punya budget untuk periode ini.
                    <a href="{{ route('budgets.index') }}" wire:navigate class="font-semibold underline">Buat budget
                        dulu →</a>
                </span>
            </div>
        @endif
    </div>

    @if ($budget)
        {{-- Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <x-stat-card label="Total Pengeluaran" :value="'Rp ' . number_format($total, 0, ',', '.')" :icon="'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2'" tone="rose" />

            <x-stat-card label="Budget Periode" :value="'Rp ' . number_format($budget->total_budget, 0, ',', '.')" :icon="'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2'" tone="indigo" />

            <x-stat-card label="Sisa Budget" :value="'Rp ' . number_format($budget->total_budget - $total, 0, ',', '.')" :icon="'M5 13l4 4L19 7'" tone="emerald" />
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
            {{-- Table --}}
            <div class="lg:col-span-2 card overflow-hidden">
                <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                    <div>
                        <h3 class="section-title">Riwayat Pengeluaran</h3>
                        <p class="section-sub">{{ \Carbon\Carbon::create()->month($month)->translatedFormat('F') }}
                            {{ $year }}</p>
                    </div>
                    <span class="badge-neutral">{{ $expenses->count() }} transaksi</span>
                </div>

                <div class="overflow-x-auto">
                    <table class="table-modern">
                        <thead>
                            <tr>
                                <th class="px-6 py-4">Tanggal</th>
                                <th class="px-6 py-4">Kategori</th>
                                <th class="px-6 py-4">Deskripsi</th>
                                <th class="px-6 py-4 text-right">Jumlah</th>
                                <th class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($expenses as $e)
                                <tr wire:key="exp-{{ $e->id }}">
                                    <td class="px-6 text-slate-500">
                                        {{ $e->expense_date->format('d M Y') }}
                                    </td>
                                    <td class="px-6">
                                        <span class="badge-info">{{ $e->category }}</span>
                                    </td>
                                    <td class="px-6 text-slate-600">
                                        {{ $e->description ?: '—' }}
                                    </td>
                                    <td class="px-6 text-right font-semibold text-rose-600">
                                        Rp {{ number_format($e->amount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 text-right">
                                        <div class="inline-flex gap-1">
                                            <button wire:click="openEdit({{ $e->id }})"
                                                class="btn-ghost btn-sm">Edit</button>
                                            <button wire:click="delete({{ $e->id }})"
                                                wire:confirm="Hapus pengeluaran ini?"
                                                class="btn-ghost btn-sm hover:!text-rose-600">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <x-empty-state title="Belum ada pengeluaran"
                                            message="Catat pengeluaran pertama kamu bulan ini." />
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Per Kategori --}}
            <div class="card card-pad">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="section-title">Per Kategori</h3>
                    <span class="badge-neutral">{{ $byCategory->count() }}</span>
                </div>

                @forelse($byCategory as $cat => $amt)
                    @php $pct = $total > 0 ? ($amt / $total) * 100 : 0; @endphp
                    <div class="mb-4 last:mb-0">
                        <div class="flex justify-between text-sm mb-1.5">
                            <span class="text-slate-700 font-medium">{{ $cat }}</span>
                            <span class="text-slate-500 font-semibold">Rp {{ number_format($amt, 0, ',', '.') }}</span>
                        </div>
                        <div class="h-1.5 rounded-full bg-slate-100 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-violet-600 transition-all"
                                style="width: {{ $pct }}%"></div>
                        </div>
                        <p class="text-[11px] text-slate-400 mt-1">{{ round($pct) }}% dari total</p>
                    </div>
                @empty
                    <x-empty-state title="Belum ada data" message="Belum ada pengeluaran tercatat." />
                @endforelse
            </div>
        </div>
    @endif

    {{-- Form Modal --}}
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-expense-list">
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
                            <button type="submit" class="btn-primary" wire:loading.attr="disabled"
                                wire:target="save">
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
