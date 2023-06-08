<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::simplePaginate(15);
        return view('ticket.index', compact('tickets'));
    }
    /**
     * Display a listing of the resource.
     */
    public function history()
    {
        $tickets = Ticket::query()->where('status','=','Close')->simplePaginate(15);
        return view('ticket.index', compact('tickets'));
    }
    /**
     * Display a listing of the resource.
     */
    public function inProcess()
    {
        $tickets = Ticket::query()->where('status','=','InProcess')->simplePaginate(15);
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $user = Auth::user();
        Ticket::create([
            'floor' => $request->floor,
            'room' => $request->room,
            'device' => $request->device,
            'type' => $request->type,
            'device_number' => $request->device_number,
            'description' => $request->description,
            'priority' => $request->priority,
            'user_id' => $user->id,
        ]);
        return redirect('/tickets');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticket = new Ticket();
        return view('ticket.create_edit', compact('ticket'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.create_edit', compact('ticket'));
    }

    public function close_ticket(UpdateTicketRequest $request, Ticket $ticket)
    {

        $ticket->update([
            'status' => 'Close',
            'closed_at' => Carbon::now()
        ]);
        return redirect("tickets/$ticket->id");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $user = Auth::user();
        $ticket->update([
            'floor' => $request->floor,
            'room' => $request->room,
            'device' => $request->device ?? $ticket->device,
            'type' => $request->type ?? $ticket->type,
            'device_number' => $request->device_number,
            'description' => $request->description,
            'priority' => $request->priority ?? $ticket->priority,
            'user_id' => $user->id,
        ]);

        return redirect("tickets/$ticket->id");
    }

    public function open_ticket(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update([
            'status' => 'Open',
            'closed_at' => null
        ]);
        return redirect("tickets/$ticket->id");

    }

    public function in_process_ticket(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update([
            'status' => 'InProcess',
            'closed_at' => null
        ]);
        return redirect("tickets/$ticket->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('tickets');
    }
}
