<div class="space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Timeline</p>
            <h3 class="mt-1 text-2xl font-bold tracking-[-0.05em] text-slate-900">Schedule</h3>
        </div>
        <button type="button" class="btn-primary">New event</button>
    </div>

    <div class="card card-pad">
        <div class="mb-5 flex items-center justify-between">
            <h3 class="text-xl font-semibold text-slate-900">This week</h3>
            <span class="badge-neutral">7 days</span>
        </div>

        <div class="grid gap-3 sm:grid-cols-7">
            @php $days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']; @endphp
            @foreach ($days as $day)
                <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3 text-center">
                    <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">{{ $day }}
                    </p>
                    <p class="mt-2 text-2xl font-bold text-slate-900">{{ 7 + $loop->index }}</p>
                    <div class="mt-3 space-y-2">
                        @if ($loop->index % 2 === 0)
                            <div class="rounded-lg bg-indigo-100 px-2 py-1 text-[10px] font-semibold text-indigo-700">
                                Laundry</div>
                        @endif
                        @if ($loop->index === 2)
                            <div class="rounded-lg bg-emerald-100 px-2 py-1 text-[10px] font-semibold text-emerald-700">
                                Groceries</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
