@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
    <div class="space-y-6">
        <x-page-header title="Tasks" subtitle="Keep your to-do list clear, focused, and moving every day."
            icon="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />

        <div class="grid gap-5 xl:grid-cols-3">
            <div class="card card-pad">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">To do</h3>
                    <span class="badge-neutral">4</span>
                </div>
                <div class="space-y-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-800">Review monthly budget</p>
                        <p class="mt-1 text-xs text-slate-500">High priority</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-800">Wash towels</p>
                        <p class="mt-1 text-xs text-slate-500">Today</p>
                    </div>
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">In progress</h3>
                    <span class="badge-neutral">2</span>
                </div>
                <div class="space-y-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-800">Prepare grocery list</p>
                        <p class="mt-1 text-xs text-slate-500">Due today</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-800">Finish room reset</p>
                        <p class="mt-1 text-xs text-slate-500">Almost done</p>
                    </div>
                </div>
            </div>

            <div class="card card-pad">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Done</h3>
                    <span class="badge-neutral">6</span>
                </div>
                <div class="space-y-3">
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-800">Pay internet bill</p>
                        <p class="mt-1 text-xs text-slate-500">Completed</p>
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-slate-50/80 p-3">
                        <p class="text-sm font-semibold text-slate-800">Restock detergent</p>
                        <p class="mt-1 text-xs text-slate-500">Completed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
