<div class="fixed-sidebar-left">
    <ul class="nav navbar-nav side-nav nicescroll-bar">
        <li class="navigation-header">
            <span>Main</span>
            <i class="zmdi zmdi-more"></i>
        </li>
        <li>
            <a class="active" href="/admin">
                <div class="pull-left"><i class="zmdi zmdi-landscape mr-20"></i><span
                        class="right-nav-text">Dashboard</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ecom_dr">
                <div class="pull-left"><i class="zmdi zmdi-mall mr-20"></i><span
                        class="right-nav-text">Transaksi</span></div>
                {{-- <div class="pull-right"><span class="label label-success">hot</span></div> --}}
                <div class="clearfix"></div>
            </a>
            <ul id="ecom_dr" class="collapse collapse-level-1">
                <li>
                    <a class="active-page" href="{{ route('transaction.index')}}">Data Transaksi</a>
                </li>
                {{-- <li>
                    <a class="active-page" href="{{ route('transaction.create')}}">Add Transactions</a>
                </li> --}}
            </ul>
        </li>
        <li>
            <hr class="light-grey-hr mb-10" />
        </li>
        <li class="navigation-header">
            <span>Data</span>
            <i class="zmdi zmdi-more"></i>
		</li>
        <li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#ui_dr">
				<div class="pull-left"><i class="zmdi zmdi-book mr-20"></i>
					<span class="right-nav-text">Produk</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="ui_dr" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('book.index')}}">Data Produk</a>
                </li>
                <li>
                    <a href="{{ route('book.create')}}">Tambah Produk</a>
                </li>
                <li>
                    <a href="{{ route('bookimage.index')}}">Gambar</a>
                </li>

            </ul>
		</li>
		<li>
            <a href="{{ route('author.index')}}">
                <div class="pull-left"><i class="zmdi zmdi-library mr-20"></i><span
                        class="right-nav-text">Perusahaan</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
		<li>
            <a href="{{ route('publisher.index')}}">
                <div class="pull-left"><i class="zmdi zmdi-graduation-cap mr-20"></i><span
                        class="right-nav-text">Made In</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
		<li>
            <a href="{{ route('category.index')}}">
                <div class="pull-left"><i class="zmdi zmdi-labels mr-20"></i><span
                        class="right-nav-text">Kategori</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li>
            <hr class="light-grey-hr mb-10" />
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
            <span>Settings</span>
            <i class="zmdi zmdi-more"></i>
		</li>
		<li>
            <a href="{{ route('settingapp.index')}}">
                <div class="pull-left"><i class="zmdi zmdi-settings mr-20"></i><span
                        class="right-nav-text">Aplikasi</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
		<li>
            <a href="javascript:void(0);" data-toggle="collapse" data-target="#banner">
				<div class="pull-left"><i class="zmdi zmdi-book mr-20"></i>
					<span class="right-nav-text">Banner</span></div>
                <div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div>
                <div class="clearfix"></div>
            </a>
            <ul id="banner" class="collapse collapse-level-1 two-col-list">
                <li>
                    <a href="{{ route('banner.index')}}">Banner Utama</a>
                </li>
                <li>
                    <a href="{{ route('portofolio.index')}}">Portofolio</a>
                </li>

            </ul>
        </li>
		<li>
            <a href="{{ route('user.index')}}">
                <div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span
                        class="right-nav-text">Data Akun</span></div>
                <div class="clearfix"></div>
            </a>
        </li>

        <li class="navigation-header">
            <span>Almakarya</span>
            <i class="zmdi zmdi-more"></i>
		</li>
		<li>
            <a href="/">
                <div class="pull-left"><i class="zmdi zmdi-dock mr-20"></i><span
                        class="right-nav-text">Halaman Web</span></div>
                <div class="clearfix"></div>
            </a>
        </li>
    </ul>
</div>
