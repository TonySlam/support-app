@if(Session::has('success'))
    <div class="alert alert-success alert-with-icon" data-notify="container">

        <span data-notify="message">
    {{ session('success') }}
        </span>
</div>
@endif

@if(Session::has('danger'))
    <div class="alert alert-danger alert-with-icon" data-notify="container">
        <span data-notify="message">
    {{ session('danger') }}
        </span>
</div>
@endif

@if(Session::has('warning'))
    <div class="alert alert-warning alert-with-icon" data-notify="container">
        <span data-notify="message">
    {{ session('warning') }}
        </span>
</div>
@endif

@if(Session::has('info'))
    <div class="alert alert-info alert-with-icon" data-notify="container">
        <span data-notify="message">
    {{ session('info') }}
        </span>
</div>
@endif



