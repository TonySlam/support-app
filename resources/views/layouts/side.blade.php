<div class="sidebar-wrapper">
    <div class="logo">
        <a href="{{route('home')}}" class="simple-text">
            Support Ticket System
        </a>
    </div>

    <ul class="nav">
        @if(auth()->user()->hasAnyRole('super admin','support'))
        <li class="active">
            <a href="{{route('home')}}">
                <i class="pe-7s-graph"></i>
                <p>Dashboard</p>
            </a>
        </li>
            <li>
                <a href="{{route('index.support')}}">
                    <i class="pe-7s-user"></i>
                    <p>Logged Tickets</p>
                </a>
            </li>
        @elseif(auth()->user()->hasAnyRole('support'))

            <li class="active">
                <a href="{{route('home')}}">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{route('index.support')}}">
                    <i class="pe-7s-user"></i>
                    <p>Logged Tickets</p>
                </a>
            </li>
            @else
        <li>
            <a href="{{route('index.log',auth()->user()->id)}}">
                <i class="pe-7s-user"></i>
                <p>My Logged Tickets</p>
            </a>
        </li>
        @endif
       {{-- <li>
            <a href="">
                <i class="pe-7s-note2"></i>
                <p>Table List</p>
            </a>
        </li>
        <li>
            <a href="">
                <i class="pe-7s-news-paper"></i>
                <p>Typography</p>
            </a>
        </li>--}}

    </ul>
</div>