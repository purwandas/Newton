<ul>
    @if(Auth::user()->role == 'user')
    <li class="start">
        <a href="{{ url('user-home') }}">
            <span class="menu">
                <i class="fa fa-home"></i> <span class="title">Home</span> <span class="selected"></span>
            </span>
        </a>
    </li>
    <li class="">
        <a href="{{ url('user-service') }}">
            <span class="menu">
                <i class="fa fa-cube"></i> <span class="title">Service</span>
            </span>
        </a>
    </li>
    <li class="">
        <a href="{{ url('user-order') }}">
            <span class="menu">
                <i class="fa fa-check-square-o"></i> <span class="title">Order</span>
            </span>
        </a>
    </li>
    <li>
        <a href="{{ url('user-invoice') }}">
            <span class="menu">
                <i class="fa fa-file-text"></i> <span class="title">Invoice</span>
            </span> 
        </a>
    </li>    
    <li class="">
        <a href="{{ url('user-profile') }}">
            <span class="menu">
                <i class="fa fa-gear"></i> <span class="title">User Profile</span>
            </span>
        </a>
    </li>
    @endif
    <!-- -------------------------------------------------------------- -->
    @if(Auth::user()->role == 'admin')
    <li class="start">
        <a href="{{ url('home') }}">
            <span class="menu">
                <i class="fa fa-home"></i> <span class="title">Home</span> <span class="selected"></span>
            </span>
        </a>
    </li>
    <li class="">
        <a href="{{ url('listorder') }}">
            <span class="menu">
                <i class="fa fa-check-square-o"></i> <span class="title">Order</span>
            </span>
        </a>
    </li>
    <li>
        <a href="{{ url('invoice') }}">
            <span class="menu">
                <i class="fa fa-file-text"></i> <span class="title">Invoice</span>
            </span> 
        </a>
    </li>
    <li class="">
        <a href="{{ url('paket') }}">
            <span class="menu">
                <i class="fa fa-cube"></i> <span class="title">Packet</span>
            </span>
        </a>
    </li>
    <li class="">
        <a href="{{ url('operatingsystem') }}">
            <span class="menu">
                <i class="fa fa-gear"></i> <span class="title">Operating System</span>
            </span>
        </a>
    </li>
    <li class="">
        <a href="{{ url('slider') }}">
            <span class="menu">
                <i class="fa fa-picture-o"></i> <span class="title">Slider</span>
            </span>
        </a>
    </li>

    <li class="">
        <a href="{{ url('contacts') }}">
            <span class="menu">
                <i class="fa fa-users"></i> <span class="title">Contact</span>
            </span>
        </a>
    </li>
    <li>
        <a href="{{ url('user') }}">
            <span class="menu">
                <i class="fa fa-user-circle-o"></i> <span class="title">User</span>
            </span> 
        </a>
    </li>
    @endif
    <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            id="user-options">
            <span class="menu">
                <i class="fa fa-sign-out"></i> <span class="title">Sign Out</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </span> 
        </a>
    </li>
</ul>
