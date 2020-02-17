<?php

namespace App\Modules\Logticket\Http\Controllers;

use App\Modules\Logticket\Models\Support;
use App\Modules\Logticket\Models\SupportComment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LogTicketController extends Controller
{

    protected $support;
    protected $comments;
    protected $users;


    public function __construct(Support $support,SupportComment $comments,User $users)
    {
        $this->support = $support;
        $this->comments = $comments;
        $this->users    = $users;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //This function show all tickets related to a user

        $tickets = $this->support->where('user_id',auth()->user()->id)->paginate(10);


        return view('logticket::guest_user.index',compact('tickets'));
    }

    /**
     * This function return the screen to log a ticket
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_ticketlog()
    {
        //query to fetch all department categories
        $categories = DB::table('catagories')->get();
        return view('logticket::guest_user.add_ticket',compact('categories'));
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'           => 'required|max:255',
            'address_address'       => 'required',

        ]);

        try{
        //random generated reference number for a ticket
        $log_ref = "VTF".rand(0,123);
        //inserting ticket query to support table
        $this->support->create(
            array_merge($request->only( 'description','category_id','address_address','address_latitude','address_longitude'), ['reference'=>$log_ref,'user_id' => auth()->user()->id,'start_date'=>Carbon::now(), 'end_date'=>Carbon::now()])
        );
        //response message
        return redirect()->back()->with('success','Support Ticket Created Successfully');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('warning', 'An error occurred! Please contact your administrator...') ;
        }
    }


}
