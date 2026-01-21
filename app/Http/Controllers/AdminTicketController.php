<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    // Список ВСЕХ заявок
    public function index()
    {
        // Подгружаем автора заявки (with user), чтобы не было лишних запросов к БД
        $tickets = Ticket::with('user')->latest()->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    // Обновление статуса
    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,done,rejected',
        ]);

        $ticket->update(['status' => $request->status]);

        return back()->with('status', 'Статус обновлен!');
    }
}
