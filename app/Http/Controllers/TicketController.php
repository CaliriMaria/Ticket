<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $tickets = Ticket::all();
       return redirect()->route('adminHome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $tickets = Ticket::all();

        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'start_date'=>'required',
            'status'=> 'required',
            'category'=> 'required',
        ]);

        Ticket::create($request->post());
        return  redirect()->route('admineHome')->with('Il tuo ticket è stato modificato');

//        //dd($storeData);
//        $ticket = new Ticket();
//        $ticket->title = $request->title;
//        $ticket->start_date = $request->start_date;
//        $ticket->category_id = $request->category_id;
//
//        $ticket->save();

////        dd($ticket);
//
//        $message = new Message();
//        $message->ticket_id = $ticket->id;
//        $message->text = $request->message;
//        $message->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): \Illuminate\Http\Response
    {
        $ticket = Ticket::findOrFail($id);
        return response()->view('show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'title'=> 'required',
            'priority'=> 'required',
            'start_date'=>'required',
            'status'=> 'required',
            'category'=> 'required',
        ]);
        $ticket = new Ticket();
        $ticket->fill($request->post())->save();

        return redirect()->route('adminhome');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delate();

        return redirect()->route('adminHome')->with('Il ticket è stato cancellato');
    }
}