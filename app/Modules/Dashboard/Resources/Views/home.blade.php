@extends('layouts.master')
@section('sheets')
    @parent
    <!-- Custom styles for this page -->
    <link href="/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            @if(auth()->user()->hasAnyRole('guest user'))
            <div class="row">
                <div class="col-md-4">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">Tickets</h4>
                            <p class="category">{{$ticket_count_client}}</p>
                        </div>
                        <div class="content">



                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">Resolved Tickets</h4>
                            <p class="category">{{$resolved_count_client}}</p>
                        </div>
                        <div class="content">



                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">Tickets</h4>
                            <p class="category">{{$in_progress_count_client}}</p>
                        </div>
                        <div class="content">



                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">System Notes</h4>
                                <hr>
                            <p>The application allow a user to log a ticket for support so a support agent can be able to<br> view a ticket and resole the query and also leave a note regarding the issue</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(auth()->user()->hasAnyRole('super admin','support'))
            <div class="row">
                        <div class="col-md-4">
                            <div class="card">

                                <div class="header">
                                    <h4 class="title">Tickets</h4>
                                    <p class="category">{{$ticket_count}}</p>
                                </div>
                                <div class="content">



                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">

                                <div class="header">
                                    <h4 class="title">Resolved Tickets</h4>
                                    <p class="category">{{$resolved_count}}</p>
                                </div>
                                <div class="content">



                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">

                                <div class="header">
                                    <h4 class="title">Tickets</h4>
                                    <p class="category">{{$in_progress_count}}</p>
                                </div>
                                <div class="content">



                                </div>
                            </div>
                        </div>
                    </div>
            <div class="row">
            <div class="col-md-12">

                <div class="header">
                    <h4 class="title">Logged Ticket Report</h4>

                </div>
                <div class="content">

                    <div class="table-responsive">
                        <table class="table table-hover" id="report-list" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Agent First Name</th>
                                <th>Agent Last Name</th>
                                <th>Address Captured</th>
                                <th>Ticket No:</th>
                                <th>status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            </div>
            @endif

        </div>
    </div>
@endsection
@section('scripts')
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
                ajax: '{!! route('report.dashboard') !!}',
                columns: [
                    { data: 'agent_first_name', value: 'agent_first_name' },
                    { data: 'agent_last_name', value: 'agent_last_name' },
                    { data: 'address_address', value: 'address_address' },
                    { data: 'reference', value: 'reference' },
                    { data: 'status', value: 'status' },
                    { data: 'start_date', value: 'start_date' },
                    { data: 'updated_at', value: 'updated_at' },
                    { data: 'actions', value: 'actions' }
                ]
            });
        });

    </script>
@endsection
