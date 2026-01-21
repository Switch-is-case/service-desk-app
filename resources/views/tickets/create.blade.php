<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создать новую заявку') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('tickets.store') }}" method="POST">
                        @csrf

                        <!-- Название -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Тема заявки</label>
                            <input type="text" name="title" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1" required>
                        </div>

                        <!-- Категория -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Категория</label>
                            <select name="category" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="it">IT / Компьютеры</option>
                                <option value="repair">Ремонт / Хозчасть</option>
                                <option value="other">Другое</option>
                            </select>
                        </div>

                        <!-- Приоритет -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Приоритет</label>
                            <select name="priority" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1">
                                <option value="low">Низкий</option>
                                <option value="medium">Средний</option>
                                <option value="high">Высокий</option>
                            </select>
                        </div>

                        <!-- Описание -->
                        <div class="mb-4">
                            <label class="block font-medium text-sm text-gray-700">Описание проблемы</label>
                            <textarea name="description" rows="4" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full mt-1" required></textarea>
                        </div>

                        <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Отправить заявку
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
