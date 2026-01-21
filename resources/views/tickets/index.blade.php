<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мои заявки') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Кнопка создать -->
            <div class="mb-4 flex justify-end">
                <a href="{{ route('tickets.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500">
                    + Новая заявка
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($tickets->isEmpty())
                        <p>У вас пока нет заявок.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Тема</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Категория</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td class="px-6 py-4">{{ $ticket->title }}</td>
                                    <td class="px-6 py-4">{{ $ticket->category }}</td>
                                    <td class="px-6 py-4">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $ticket->status == 'new' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $ticket->status == 'in_progress' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $ticket->status == 'done' ? 'bg-gray-100 text-gray-800' : '' }}
                                                {{ $ticket->status == 'rejected' ? 'bg-red-100 text-red-800' : '' }}">
                                                {{ $ticket->status }}
                                            </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $ticket->created_at->format('d.m.Y H:i') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
