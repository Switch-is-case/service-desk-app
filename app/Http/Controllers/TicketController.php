<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Список заявок текущего пользователя
    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())->latest()->get();
        return view('tickets.index', compact('tickets'));
    }

    // Форма создания заявки
    public function create()
    {
        return view('tickets.create');
    }

    // Сохранение заявки в БД
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'priority' => 'required|string',
        ]);

        // Создаем заявку от имени текущего пользователя
        $request->user()->tickets()->create($validated);

        return redirect()->route('tickets.index')->with('status', 'Заявка создана!');
    }
}
