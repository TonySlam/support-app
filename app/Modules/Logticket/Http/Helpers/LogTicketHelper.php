<?php
/**
 * Created by PhpStorm.
 * User: Slamtony
 * Date: 2020/02/10
 * Time: 7:53 PM
 */

namespace App\Modules\Logticket\Http\Helpers;


use App\Modules\Logticket\Models\Support;

class LogTicketHelper
{

    public static function getLogTicket($id)
    {
        $log_ticket = Support::where('id',$id)->first();
        return $log_ticket->reference;
    }

    public static function getAllTickets()
    {
        $count_tickets = Support::all();
        return $count_tickets->count();
    }

    public static function getResolvedTicket()
    {
        $resolved = Support::where('status','resolved')->count();
        return $resolved;
    }

    public static function getInProgress()
    {
        $resolved = Support::where('status','in progress')->count();
        return $resolved;
    }




    public static function getAllTicketsClient($id)
    {
        $count_tickets = Support::where('user_id',$id);
        return $count_tickets->count();
    }

    public static function getResolvedTicketClient($id)
    {
        $resolved = Support::where('status','resolved')->where('user_id',$id)->count();
        return $resolved;
    }

    public static function getInProgressClient($id)
    {
        $resolved = Support::where('status','in progress')->where('user_id',$id)->count();
        return $resolved;
    }
}