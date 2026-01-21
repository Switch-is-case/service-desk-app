<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель Администратора - Все заявки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Автор</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Тема</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Статус</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Действие</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($tickets as $ticket)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-500">#{{ $ticket->id }}</td>
                                <td class="px-6 py-4 font-bold">{{ $ticket->user->name }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 font-semibold">{{ $ticket->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $ticket->description }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('admin.tickets.update', $ticket) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" onchange="this.form.submit()" class="text-sm border-gray-300 rounded-md shadow-sm">
                                            <option value="new" {{ $ticket->status == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="in_progress" {{ $ticket->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                            <option value="done" {{ $ticket->status == 'done' ? 'selected' : '' }}>Done</option>
                                            <option value="rejected" {{ $ticket->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $ticket->created_at->format('d.m.Y') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
