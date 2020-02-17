<?php

namespace App\Modules\Dashboard\Http\Controllers;

use App\Modules\Logticket\Http\Helpers\LogTicketHelper;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ticket_count = LogTicketHelper::getAllTickets();
        $resolved_count = LogTicketHelper::getResolvedTicket();
        $in_progress_count = LogTicketHelper::getInProgress();

        $ticket_count_client = LogTicketHelper::getAllTicketsClient(auth()->user()->id);
        $resolved_count_client = LogTicketHelper::getResolvedTicketClient(auth()->user()->id);
        $in_progress_count_client = LogTicketHelper::getInProgressClient(auth()->user()->id);

        return view('dashboard::home',compact('ticket_count','resolved_count','in_progress_count','ticket_count_client','resolved_count_client','in_progress_count_client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
