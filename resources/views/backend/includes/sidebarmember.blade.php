<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="active" href="{{ route('member-utama')}}">
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                        class="right-nav-text">Dashboard</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        {{-- <li class="navigation-header">
            <span>Transactions</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a href="{{ route('transaction.index')}}">
                <div class="pull-left"><i class="zmdi zmdi-money mr-20"></i><span
                        class="right-nav-text">Transactions</span></div>
                <div class="clearfix"></div>
            </a>
        </li> --}}

        <li class="navigation-header">
            <span>Layanan</span>
            <i class="zmdi zmdi-more"></i>
		</li>
		<li>
            <a href="{{ route('member-pesanan')}}">
                <div class="pull-left"><i class="zmdi zmdi-shopping-cart mr-20"></i><span
                        class="right-nav-text">Pesanan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
		<li>
            <a href="{{ route('member-pesanan-resi')}}">
                <div class="pull-left"><i class="zmdi zmdi-truck mr-20"></i><span
                        class="right-nav-text">Resi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
		<li>
            <a href="{{ route('member-profil')}}">
                <div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span
                        class="right-nav-text">Akun Saya</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="navigation-header">
            <span>Jitus</span>
            <i class="zmdi zmdi-more"></i>
		</li>
		<li>
            <a href="/">
                <div class="pull-left"><i class="zmdi zmdi-dock mr-20"></i><span
                        class="right-nav-text">Halaman Jitus</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="navigation-header">
            <span>Setting</span>
            <i class="zmdi zmdi-more"></i>
		</li>
		<li>
            <a href="{{ route('logout')}}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <div class="pull-left"><i class="zmdi zmdi-power mr-20"></i><span
                        class="right-nav-text">Keluar</span></div>
                <div class="clearfix"></div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>
