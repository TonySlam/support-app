@extends('layouts.master')
@section('sheets')
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="card-header ">
                <h4 class="card-title">Client Logged Tickets</h4>
            </div>

            <div class="row">
                @foreach($tickets as $ticket)
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ticket Ref- {{$ticket->reference}}</h4>
                                <p class="category">{{$ticket->created_at->diffForHumans()}}</p>
                            </div>

                            <div class="content">
                                <p>{{$ticket->description}}</p>
                                <div class="footer">
                                    <div class="legend">
                                        @if($ticket->status == 'newly logged')
                                            <i class="fa fa-circle text-info"></i>{{$ticket->status}}
                                        @elseif( $ticket->status == 'in progress')
                                            <i class="fa fa-circle text-success"></i>{{$ticket->status}}
                                        @else
                                            <i class="fa fa-circle text-danger"></i>{{$ticket->status}}
                                        @endif
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <a href="{{route('show.support',$ticket->id)}}" class="btn btn-dark">View Ticket</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$tickets->links()}}
        </div>
    </div>
@endsection
@section('scripts')

@endsection