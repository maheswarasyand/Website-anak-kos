<div>
    @if ($recipe)
        <div class="fixed inset-0 z-50 overflow-y-auto" wire:key="recipe-detail-{{ $recipe->id }}">
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" wire:click="closeDetail"></div>

            <div class="relative min-h-full flex items-start justify-center p-4 py-10">
                <div class="relative w-full max-w-3xl card overflow-hidden animate-slide-up">

                    {{-- Header image --}}
                    <div class="aspect-[16/7] bg-gradient-to-br from-indigo-500 via-violet-500 to-pink-500 relative">
                        @if ($recipe->image_url)
                            <img src="{{ $recipe->image_url }}" alt="{{ $recipe->title }}"
                                class="w-full h-full object-cover">
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>

                        <button wire:click="closeDetail"
                            class="absolute top-4 right-4 p-2 rounded-lg bg-white/20 backdrop-blur text-white hover:bg-white/30">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="p-6 sm:p-8">
                        <h2 class="text-2xl font-bold text-slate-800">{{ $recipe->title }}</h2>
                        <p class="text-slate-500 mt-2">{{ $recipe->description }}</p>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <span class="badge-info">⏱ {{ $recipe->cooking_time }} menit</span>
                            <span class="badge-neutral">💰 Rp
                                {{ number_format($recipe->estimated_cost, 0, ',', '.') }}</span>
                            @php
                                $diffMap = ['easy' => 'Mudah', 'medium' => 'Sedang', 'hard' => 'Sulit'];
                                $diffClass = match ($recipe->difficulty) {
                                    'easy' => 'badge-success',
                                    'medium' => 'badge-warning',
                                    'hard' => 'badge-danger',
                                };
                            @endphp
                            <span class="{{ $diffClass }}">🎯 {{ $diffMap[$recipe->difficulty] }}</span>
                        </div>

                        {{-- Ingredients --}}
                        @if ($recipe->ingredients->isNotEmpty())
                            <div class="mt-6">
                                <h3 class="section-title mb-3">Bahan-bahan</h3>
                                <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                    @foreach ($recipe->ingredients as $ing)
                                        <li
                                            class="flex items-center gap-2 text-sm text-slate-700 p-2 rounded-lg bg-slate-50">
                                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500"></span>
                                            <span class="font-medium">{{ $ing->pivot->quantity }}</span>
                                            <span class="text-slate-400">{{ $ing->unit }}</span>
                                            <span>·</span>
                                            <span>{{ $ing->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Instructions --}}
                        @if ($recipe->instructions)
                            <div class="mt-6">
                                <h3 class="section-title mb-3">Cara Memasak</h3>
                                <div
                                    class="prose prose-slate max-w-none text-sm leading-relaxed whitespace-pre-line text-slate-700">
                                    {{ $recipe->instructions }}
                                </div>
                            </div>
                        @endif

                        {{-- Actions --}}
                        <div class="mt-8 pt-5 border-t border-slate-100 flex gap-2">
                            <button class="btn-primary">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                                Tambah ke Daftar Belanja
                            </button>
                            <button wire:click="closeDetail" class="btn-secondary">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
