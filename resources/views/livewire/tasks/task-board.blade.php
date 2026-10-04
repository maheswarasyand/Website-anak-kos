@php
    $tasks = $tasks ?? collect();

    $todoTasks = collect($tasks)
        ->filter(function ($task) {
            $status = strtolower($task->status ?? 'pending');

            return in_array($status, ['pending', 'todo', 'not_started'], true);
        })
        ->values();

    $inProgressTasks = collect($tasks)
        ->filter(function ($task) {
            $status = strtolower($task->status ?? 'pending');

            return in_array($status, ['in_progress', 'in-progress', 'doing', 'started'], true);
        })
        ->values();

    $completedTasks = collect($tasks)
        ->filter(function ($task) {
            $status = strtolower($task->status ?? 'pending');

            return in_array($status, ['completed', 'done', 'finished'], true);
        })
        ->values();
@endphp

<div class="space-y-6">
    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Planning</p>
            <h3 class="mt-1 text-2xl font-bold tracking-[-0.05em] text-slate-900">Task board</h3>
        </div>

        <button type="button" wire:click="$set('showModal', true)" class="btn-primary">
            Add task
        </button>
    </div>

    <div class="grid gap-5 xl:grid-cols-3">
        <div class="card card-pad">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-slate-900">To do</h4>
                    <p class="text-xs text-slate-500">Ready to start</p>
                </div>
                <span class="badge-neutral">{{ $todoTasks->count() }}</span>
            </div>

            <div class="space-y-3">
                @forelse ($todoTasks as $task)
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-800">{{ $task->title ?? 'Untitled task' }}
                                </p>
                                @if (!empty($task->description))
                                    <p class="mt-1 line-clamp-2 text-xs text-slate-500">{{ $task->description }}</p>
                                @endif
                            </div>
                            <span class="badge-neutral">{{ strtoupper($task->priority ?? 'medium') }}</span>
                        </div>

                        <div class="mt-3 flex items-center justify-between text-[11px] text-slate-500">
                            <span>{{ $task->category ?? 'General' }}</span>
                            @if (!empty($task->due_date))
                                <span>{{ \Carbon\Carbon::parse($task->due_date)->format('d M') }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/60 p-4 text-center">
                        <p class="text-sm font-medium text-slate-700">No pending tasks</p>
                        <p class="mt-1 text-xs text-slate-500">Everything is clear for now.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="card card-pad">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-slate-900">In progress</h4>
                    <p class="text-xs text-slate-500">Currently active</p>
                </div>
                <span class="badge-neutral">{{ $inProgressTasks->count() }}</span>
            </div>

            <div class="space-y-3">
                @forelse ($inProgressTasks as $task)
                    <div class="rounded-2xl border border-indigo-200 bg-indigo-50/70 p-3 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-800">{{ $task->title ?? 'Untitled task' }}
                                </p>
                                @if (!empty($task->description))
                                    <p class="mt-1 line-clamp-2 text-xs text-slate-500">{{ $task->description }}</p>
                                @endif
                            </div>
                            <span class="badge-info">Active</span>
                        </div>

                        <div class="mt-3 flex items-center justify-between text-[11px] text-slate-500">
                            <span>{{ $task->category ?? 'General' }}</span>
                            @if (!empty($task->due_date))
                                <span>{{ \Carbon\Carbon::parse($task->due_date)->format('d M') }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/60 p-4 text-center">
                        <p class="text-sm font-medium text-slate-700">No active tasks</p>
                        <p class="mt-1 text-xs text-slate-500">Your work is clear and focused.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="card card-pad">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h4 class="text-lg font-semibold text-slate-900">Done</h4>
                    <p class="text-xs text-slate-500">Completed work</p>
                </div>
                <span class="badge-neutral">{{ $completedTasks->count() }}</span>
            </div>

            <div class="space-y-3">
                @forelse ($completedTasks as $task)
                    <div class="rounded-2xl border border-emerald-200 bg-emerald-50/70 p-3 shadow-sm">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <p class="text-sm font-semibold text-slate-800">{{ $task->title ?? 'Untitled task' }}
                                </p>
                                @if (!empty($task->description))
                                    <p class="mt-1 line-clamp-2 text-xs text-slate-500">{{ $task->description }}</p>
                                @endif
                            </div>
                            <span class="badge-info">Done</span>
                        </div>

                        <div class="mt-3 flex items-center justify-between text-[11px] text-slate-500">
                            <span>{{ $task->category ?? 'General' }}</span>
                            @if (!empty($task->due_date))
                                <span>{{ \Carbon\Carbon::parse($task->due_date)->format('d M') }}</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="rounded-2xl border border-dashed border-slate-200 bg-slate-50/60 p-4 text-center">
                        <p class="text-sm font-medium text-slate-700">No completed tasks</p>
                        <p class="mt-1 text-xs text-slate-500">Finish one task to add momentum.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
