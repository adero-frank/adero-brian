@extends('layouts.admin')

@section('page-title', 'Subscribers')
@section('page-subtitle', 'Manage your newsletter audience')

@section('content')
    <div class="bg-white rounded-lg border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200 flex justify-between items-center">
            <h2 class="font-bold text-slate-900">All Subscribers ({{ $subscribers->total() }})</h2>
            <div class="flex items-center">
                <a href="{{ route('admin.subscribers.email') }}"
                    class="px-4 py-2 bg-white text-slate-900 border border-slate-300 rounded-lg text-sm font-bold hover:bg-slate-50 transition-colors flex items-center gap-2 mr-3">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Compose Email
                </a>
                <a href="{{ route('admin.subscribers.export') }}"
                    class="px-4 py-2 bg-slate-900 text-white rounded-lg text-sm font-bold hover:bg-slate-800 transition-colors flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Export CSV
                </a>
            </div>
        </div>

        @if($subscribers->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-slate-900 font-bold uppercase tracking-wider text-xs">
                        <tr>
                            <th class="px-6 py-4">Email Address</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Joined Date</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($subscribers as $subscriber)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 font-medium text-slate-900">
                                    {{ $subscriber->email }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($subscriber->is_active)
                                        <span class="px-2 py-1 rounded bg-green-100 text-green-700 text-xs font-bold">Active</span>
                                    @else
                                        <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-700 text-xs font-bold">Pending</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $subscriber->created_at->format('M d, Y') }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('admin.subscribers.destroy', $subscriber) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirmDelete(event, this, 'Remove Subscriber', 'Are you sure you want to remove this subscriber?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 font-medium text-xs">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($subscribers->hasPages())
                <div class="p-6 border-t border-slate-200">
                    {{ $subscribers->links() }}
                </div>
            @endif
        @else
            <div class="p-12 text-center text-slate-500">
                <p>No subscribers yet.</p>
            </div>
        @endif
    </div>
@endsection