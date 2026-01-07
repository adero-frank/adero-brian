@extends('layouts.admin')

@section('page-title', 'Contact Submissions')
@section('page-subtitle', 'Messages from your contact form')

@section('content')
    <div class="mb-6">
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
    </div>

    @if($submissions->count() > 0)
        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @foreach($submissions as $submission)
                        <tr class="{{ $submission->is_read ? '' : 'bg-blue-50' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if(!$submission->is_read)
                                        <span class="w-2 h-2 bg-blue-600 rounded-full mr-2"></span>
                                    @endif
                                    <span class="text-sm font-medium text-slate-900">{{ $submission->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                <a href="mailto:{{ $submission->email }}" class="hover:text-slate-900">{{ $submission->email }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">
                                {{ $submission->phone ?? 'N/A' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                <div class="max-w-xs truncate">{{ Str::limit($submission->message, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                {{ $submission->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('admin.contact-submissions.show', $submission) }}"
                                    class="text-blue-600 hover:text-blue-900">View</a>
                                <form action="{{ route('admin.contact-submissions.destroy', $submission) }}" method="POST"
                                    class="inline"
                                    onsubmit="return confirmDelete(event, this, 'Delete Submission', 'Are you sure you want to delete this contact submission?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $submissions->links() }}
        </div>
    @else
        <div class="bg-white border border-slate-200 rounded-lg p-12 text-center">
            <p class="text-slate-500">No contact submissions yet.</p>
        </div>
    @endif
@endsection