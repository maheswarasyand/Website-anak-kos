@extends('layouts.app')

@section('title', 'AI Chat')

@section('content')
    <div class="space-y-6">
        <x-page-header title="AI Chat"
            subtitle="Talk with the SmartKos assistant for quick planning, recipes, and home insights."
            icon="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />

        <div class="grid gap-5 xl:grid-cols-[320px_1fr]">
            <aside class="card card-pad">
                <div class="mb-4 flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-slate-900">Recent chats</h3>
                    <button type="button" class="btn-ghost">New</button>
                </div>

                <div class="space-y-2">
                    <button type="button" class="w-full rounded-2xl border border-indigo-200 bg-indigo-50 p-3 text-left">
                        <p class="text-sm font-semibold text-slate-900">Meal planning</p>
                        <p class="mt-1 text-xs text-slate-500">2 messages ago</p>
                    </button>
                    <button type="button" class="w-full rounded-2xl border border-slate-200 bg-white p-3 text-left">
                        <p class="text-sm font-semibold text-slate-900">Budget reminder</p>
                        <p class="mt-1 text-xs text-slate-500">Yesterday</p>
                    </button>
                    <button type="button" class="w-full rounded-2xl border border-slate-200 bg-white p-3 text-left">
                        <p class="text-sm font-semibold text-slate-900">Cleaning schedule</p>
                        <p class="mt-1 text-xs text-slate-500">3 days ago</p>
                    </button>
                </div>
            </aside>

            <div class="card overflow-hidden">
                <div class="border-b border-slate-200 bg-slate-50/70 p-4">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">Assistant</p>
                            <h3 class="mt-1 text-lg font-semibold text-slate-900">Meal planning</h3>
                        </div>
                        <span class="badge-info">Online</span>
                    </div>
                </div>

                <div class="space-y-4 p-4">
                    <div class="max-w-[80%] rounded-2xl rounded-bl-none bg-slate-100 p-3 text-sm text-slate-700">
                        I suggest a balanced menu for the next 3 days with one low-cost recipe and one protein-heavy option.
                    </div>
                    <div
                        class="ml-auto max-w-[80%] rounded-2xl rounded-br-none bg-gradient-to-r from-[#6C63FF] to-[#8B83FF] p-3 text-sm text-white">
                        Great. Please include a cheap lunch and a simple grocery list.
                    </div>
                    <div class="max-w-[80%] rounded-2xl rounded-bl-none bg-slate-100 p-3 text-sm text-slate-700">
                        Done. I’ll prioritize rice, eggs, spinach, chicken, and local seasonal vegetables to keep costs low.
                    </div>
                </div>

                <div class="border-t border-slate-200 p-4">
                    <div class="flex gap-3">
                        <input type="text" class="input" placeholder="Ask SmartKos anything..." />
                        <button type="button" class="btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
