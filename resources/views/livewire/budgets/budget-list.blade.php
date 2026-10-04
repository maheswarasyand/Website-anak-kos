<div class="animate-fade-in">
    @section('title', 'Budget')
    @section('subtitle', 'Kelola anggaran bulanan kamu')

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <x-stat-card label="Total Budget" :value="'Rp ' . number_format($totalAll, 0, ',', '.')" :icon="'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1'" tone="indigo" />

        <x-stat-card label="Total Terpakai" :value="'Rp ' . number_format($spentAll, 0, ',', '.')" :icon="'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2'" tone="rose" />

        <x-stat-card label="Sisa Total" :value="'Rp ' . number_format(max(0, $totalAll - $spentAll), 0, ',', '.')" :icon="'M5 13l4 4L19 7'" tone="emerald" />

        <x-stat-card label="Periode Aktif" :value="$budgets->count() . ' bulan'" :icon="'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'" tone="amber" />
    </div>

    {{-- 3D Chart --}}
    @if ($budgets->isNotEmpty())
        <div class="card card-pad mb-6">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <h3 class="section-title">Visualisasi Budget 3D</h3>
                    <p class="section-sub">Perbandingan total budget tiap periode</p>
                </div>
                <span class="badge-neutral">3D · Interaktif</span>
            </div>

            @php
                $chartData = $budgets
                    ->take(6)
                    ->reverse()
                    ->map(function ($b) {
                        return [
                            'label' =>
                                \Carbon\Carbon::create()->month($b->month)->translatedFormat('M') . ' ' . $b->year,
                            'value' => (float) $b->total_budget,
                        ];
                    })
                    ->values()
                    ->toArray();
            @endphp

            <livewire:three.orb-canvas type="budget-chart" height="h-72" :chart-data="$chartData" :key="'budget-chart-' . md5(json_encode($chartData))" />
        </div>
    @endif

    {{-- Header + Action --}}
    <x-page-header title="Daftar Budget" subtitle="Semua budget yang sudah kamu buat">
        <button class="btn-primary" wire:click="openCreate">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Budget Baru
        </button>
    </x-page-header>

    {{-- Table --}}
    <div class="card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table-modern">
                <thead>
                    <tr>
                        <th class="px-6 py-4">Periode</th>
                        <th class="px-6 py-4">Total Budget</th>
                        <th class="px-6 py-4">Terpakai</th>
                        <th class="px-6 py-4">Sisa</th>
                        <th class="px-6 py-4">Target Tabungan</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($budgets as $b)
                        @php
                            $spent = $b->total_spent;
                            $rest = $b->total_budget - $spent;
                            $pct = $b->total_budget > 0 ? min(100, ($spent / $b->total_budget) * 100) : 0;
                        @endphp
                        <tr wire:key="budget-{{ $b->id }}">
                            <td class="px-6">
                                <p class="font-semibold text-slate-800">
                                    {{ \Carbon\Carbon::create()->month($b->month)->translatedFormat('F') }}
                                    {{ $b->year }}
                                </p>
                                <div class="h-1.5 mt-2 w-32 rounded-full bg-slate-100 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-indigo-500 to-violet-600 transition-all"
                                        style="width: {{ $pct }}%"></div>
                                </div>
                                <p class="text-[11px] text-slate-400 mt-1">{{ round($pct) }}% terpakai</p>
                            </td>
                            <td class="px-6 font-medium text-slate-800">
                                Rp {{ number_format($b->total_budget, 0, ',', '.') }}
                            </td>
                            <td class="px-6 text-rose-600 font-medium">
                                Rp {{ number_format($spent, 0, ',', '.') }}
                            </td>
                            <td class="px-6 font-semibold {{ $rest >= 0 ? 'text-emerald-600' : 'text-rose-600' }}">
                                Rp {{ number_format($rest, 0, ',', '.') }}
                            </td>
                            <td class="px-6 text-slate-500">
                                Rp {{ number_format($b->saving_target, 0, ',', '.') }}
                            </td>
                            <td class="px-6 text-right">
                                <div class="inline-flex items-center gap-1">
                                    <button wire:click="openEdit({{ $b->id }})" class="btn-ghost btn-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $b->id }})" wire:confirm="Hapus budget ini?"
                                        class="btn-ghost btn-sm hover:!text-rose-600 hover:!bg-rose-50">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">
                                <x-empty-state title="Belum ada budget"
                                    message="Buat budget pertama kamu untuk mulai melacak pengeluaran." />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Form Modal --}}
    @if ($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="modal-budget-list">
            <div class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm" wire:click="$set('showModal', false)"></div>

            <div class="relative min-h-full flex items-center justify-center p-4">
                <div class="relative w-full max-w-lg card card-pad animate-slide-up">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h3 class="text-base font-semibold text-slate-800">
                                {{ $editingId ? 'Edit Budget' : 'Budget Baru' }}
                            </h3>
                            <p class="text-xs text-slate-400 mt-0.5">Atur anggaran bulanan kamu</p>
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
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="label">Bulan</label>
                                <select wire:model="month" class="input">
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}">
                                            {{ \Carbon\Carbon::create()->month($m)->translatedFormat('F') }}
                                        </option>
                                    @endfor
                                </select>
                                @error('month')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="label">Tahun</label>
                                <input type="number" wire:model="year" class="input" min="2020"
                                    max="2100">
                                @error('year')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="label">Total Budget</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm">Rp</span>
                                <input type="number" wire:model="total_budget" class="input pl-10" min="0"
                                    step="1000" placeholder="0">
                            </div>
                            @error('total_budget')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="label">Target Tabungan (opsional)</label>
                            <div class="relative">
                                <span
                                    class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-sm">Rp</span>
                                <input type="number" wire:model="saving_target" class="input pl-10" min="0"
                                    step="1000" placeholder="0">
                            </div>
                            @error('saving_target')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-2 pt-3 border-t border-slate-100">
                            <button type="button" wire:click="$set('showModal', false)"
                                class="btn-secondary">Batal</button>
                            <button type="submit" class="btn-primary" wire:loading.attr="disabled"
                                wire:target="save">
                                <span wire:loading.remove wire:target="save">Simpan Budget</span>
                                <span wire:loading wire:target="save">Menyimpan…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
