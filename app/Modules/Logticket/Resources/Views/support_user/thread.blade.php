@extends('layouts.master')
@section('sheets')
    @parent
    <!-- Custom styles for this page -->
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('layouts.alert.response')
                </div>
            </div>
            <div class="card-header ">
                <h4 class="card-title">Client Logged Tickets</h4>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Logged Tickets</h4>

                        </div>

                        <div class="content">
                            <div class="table-responsive">
                                <table class="table table-hover" id="report-list" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Agent First Name</th>
                                        <th>Agent Last Name</th>
                                        <th>Ticket No:</th>
                                        <th>status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ticket No- {{$ticket->reference}}</h4>
                                <p>{{$ticket->created_at->diffForHumans()}}</p>
                                <hr>
                                <h5 class="title">Recipient Details</h5>
                                <br>
                                <p class="category">Full Name: {{$ticket->user->first_name}} {{$ticket->user->last_name}}</p><br>
                                <p class="category">Phone: {{$ticket->user->phone}} </p><br>
                                <p class="category">Email: {{$ticket->user->email}} </p><br>
                                <p class="category">Address: {{$ticket->address_address}} </p><br>

                            </div>

                            <div class="content">
                                <blockquote>
                                    <p>{{$ticket->description}}</p>
                                </blockquote>
                                <strong>Ticket Duration Status: </strong>
                                <small>{{$ticket->updated_at->diffForHumans()}}</small>

                                <div >

                                        @if($ticket->status == 'newly logged')
                                            <i class="fa fa-circle text-info"></i>{{$ticket->status}}
                                        @elseif( $ticket->status == 'in progress')
                                            <i class="fa fa-circle text-success"></i>{{$ticket->status}}
                                        @else
                                            <i class="fa fa-circle text-danger"></i>{{$ticket->status}}
                                        @endif

                                    <hr>
                                    <div class="stats">
                                        <form action="{{route('update.support',$ticket->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="address_latitude" id="address-latitude" value="0" />
                                            <input type="hidden" name="address_longitude" id="address-longitude" value="0" />
                                            <input TYPE="hidden" name="email" value="{{$ticket->user->email}}">
                                            <div class="footer">

                                                <label>Address</label>
                                                <input type="text" required class="form-control map-input @error('address_address') is-invalid @enderror" id="address-input" name="address_address" id="exampleInputPassword4"  placeholder="address">
                                                @error('address_address')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror

                                                <div class="hidden" id="address-map-container" style="width:100%;height:400px; ">
                                                    <div style="width: 100%; height: 100%" id="address-map"></div>
                                                </div>
                                                <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" required class="form-control @error('status') is-invalid @enderror">
                                                    <option value="newly logged">Newly logged</option>
                                                    <option value="in progress">In progress</option>
                                                    <option value="resolved">resolved</option>
                                                </select>
                                                    @error('status')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <br>
                                                <div class="stats">
                                                    <div class="form-group">
                                                    <button type="submit" class="btn btn-dark">Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Leave Notes</h4>

                        </div>

                        <div class="content">
                            <form action="{{route('store.support',$ticket->id)}}" method="post">
                                @csrf

                                <input TYPE="hidden" name="support_id" value="{{$ticket->id}}">
                                <input TYPE="hidden" name="email" value="{{$ticket->user->email}}">
                                <input TYPE="hidden" name="status" value="{{$ticket->status}}">

                                <div class="footer">
                                        <label>Comment</label>
                                        <textarea required name="comment" class="form-control"></textarea>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="/assets/plugins/datedropper/datedropper.min.js"></script>
    <script src="/assets/js/form-picker.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDYA-M8i6uWAA4w4KiDsPfD6xgqVXMbqw8&libraries=places&callback=initialize" async defer></script>
    <script src="/js/mapInput.js"></script>
    <!-- Page level plugins -->
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/assets/js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#report-list').DataTable({
                processing: true,
                ordering: true,
                ajax: '{!! route('logged.ticket',$ticket->id) !!}',
                columns: [
                    { data: 'agent_first_name', value: 'agent_first_name' },
                    { data: 'agent_last_name', value: 'agent_last_name' },

                    { data: 'reference', value: 'reference' },
                    { data: 'status', value: 'status' },

                ]
            });
        });

    </script>
@endsection