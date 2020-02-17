<?php

namespace App\Modules\Logticket\Http\Controllers;

use App\Modules\Logticket\Http\Helpers\LogTicketHelper;
use App\Modules\Logticket\Models\LogActivity;
use App\Modules\Logticket\Models\Support;
use App\Modules\Logticket\Models\SupportComment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{

    protected $support;
    protected $notes;
    protected $logs;

    public function __construct(Support $support, SupportComment $notes, LogActivity $logs)
    {
        $this->support = $support;
        $this->notes = $notes;
        $this->logs = $logs;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = $this->support->orderBy('created_at', 'desc')->paginate(10);
        return view('logticket::support_user.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('logticket::support_user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment'  => 'required|max:255',
        ]);

        try{

            $comment = $request->comment;
            $this->notes->create(
            array_merge($request->only( 'support_id'), ['comment'=>$comment])
        );

        $reference = LogTicketHelper::getLogTicket($request->support_id);

        $data = array(
            'comment'   =>  $comment,
            'reference' =>  $reference,
            'status' => $request->status,
        );

        Mail::send('logticket::mail.email', $data, function ($message) {
            $message->to(Input::get('email'), 'Ticket support System')
                ->subject('Support Query');
            $message->from('noreply@support.co.za', 'Ticket support System');
        });
        return redirect()->back()->with('success','Comment successfully Created');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('warning', 'An error occurred! Please contact your administrator...') ;
        }
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
        $ticket = $this->support->find($id);
        $log = $this->logs->where('support_id',$ticket->id)->first();

        return view('logticket::support_user.thread',compact('ticket','log'));
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
        $request->validate([
            'address_address'  => 'required|max:255',
            'status'           => 'required',
        ]);

        $support = $this->support->findOrFail($id);
        $log = $this->logs->where('support_id',$support->id)->first();

        try{

        $input = array_merge($request->only('status'));
        $support->fill($input)->save();

        $this->logs->create(
            array_merge($request->only( 'status','address_address','address_latitude','address_longitude'),
                [
                    'support_id'  => $support->id,
                    'reference'   => $support->reference,
                    'user_id'      => auth()->user()->id,
                    'start_date'   => $support->start_date,
                    'end_date'     => $support->end_date,
                ])
        );

        $data = array(
            'agent_first_name'  =>  auth()->user()->first_name,
            'agent_last_name'   =>  auth()->user()->last_name,
            'address'           => $log->address_address,
            'lat'               =>  $log->address_latitude,
            'long'              =>  $log->address_longitude,
            'start_date'        =>  Carbon::now(),
            'end_date'          =>  $support->end_date,
            'reference'         =>  $support->reference,
            'status'            => $request->status,

        );
        Mail::send('logticket::mail.email_status', $data, function ($message) {
            $message->to(Input::get('email'), 'Ticket support System')
                ->subject('Support Query');
            $message->from('noreply@support.co.za', 'Ticket support System');
        });
        return redirect()->back()->with('success', 'Ticket status successfully updated');

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('warning', 'An error occurred! Please contact your administrator...') ;
        }
    }


}
