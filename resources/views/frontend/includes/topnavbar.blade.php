<header class="version_1">
            <div class="layer"></div>
            <!-- Mobile menu overlay mask -->
            <div class="main_header">
                <div class="container">
                    <div class="row small-gutters">
                        <div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
                            <div id="logo">
                                <a href="{{ route('beranda')}}"><img src="{{url('frontend/img/logo.svg')}}" alt="" width="auto" height="auto"></a>
                            </div>
                        </div>
                        <nav class="col-xl-6 col-lg-7">
                            <a class="open_close" href="javascript:void(0);">
                                <div class="hamburger hamburger--spin">
                                    <div class="hamburger-box">
                                        <div class="hamburger-inner"></div>
                                    </div>
                                </div>
                            </a>
                            <!-- Mobile menu button -->
                            <div class="main-menu">
                                <div id="header_menu">
                                    <a href="{{ route('beranda')}}"><img src="{{url('frontend/img/logo.png')}}" alt="" width="100" height="35"></a>
                                    <a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
                                </div>
                                <ul>
                                    <li>
                                        <a href="{{ route('beranda')}}">Beranda</a>
                                    </li>
                                    <li>
                                        <a href="{{route('produk')}}">Produk</a>
                                    </li>
                                    <li>
                                        <a href="https://shopee.co.id/almakarya">Shopee</a>
                                    </li>
                                    <li>
                                        <a href="#">Artikel</a>
                                    </li>
                                    <li>
                                        <a href="#">Cara Order</a>
                                    </li>
                                </ul>
                            </div>
                            <!--/main-menu -->
                        </nav>
                        <div class="col-xl-3 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
                            @foreach ($app as $apps)
                                <a class="phone_top" href="https://api.whatsapp.com/send?phone={{ $apps->no_wa}}&text=Saya%20tertarik%20untuk%20Beli%20Buku"><strong><span>Butuh Bantuan?</span>{{ $apps->no_wa}}</strong></a>
                            @endforeach
                        </div>
                    </div>
                    <!-- /row -->
                </div>
            </div>
            <!-- /main_header -->

            <div class="main_nav Sticky">
                <div class="container">
                    <div class="row small-gutters">
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <nav class="categories">
                                <ul class="clearfix">
                                    <li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
                                        </span>
                                        </span>
                                        Kategori
                                        </a>
                                        </span>
                                        <div id="menu">
                                            <ul>
                                                @foreach ($categories as $category)
                                                    
                                                <li><span><a href="{{ route('category-produk',$category->slug)}}">{{ $category->name}}</a></span>
                                                </li>

                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
                            <div class="custom-search-input">
                                <form action="{{ route('search')}}" method="GET">
                                    <input type="text" name="keyword" placeholder="Cari Produk..." >
                                    <button type="submit"><i class="header-icon_search_custom"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-2 col-md-3">
                            <ul class="top_tools">
                                <li>
                                    <div class="dropdown dropdown-cart">
                                        <!-- <a href="cart.html" class="cart_bt"><strong>2</strong></a> -->
                                        <a href="{{ route('list-cart')}}" class="cart_bt"></a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                @forelse ($cart as $item)
                                                    
                                                <li>
                                                    <a href="#">
                                                        <figure><img src="{{url('frontend/img/products/product_placeholder_square_small.jpg')}}" data-src="{{url('frontend/img/products/shoes/thumb/1.jpg')}}" alt="" width="50" height="50" class="lazy"></figure>
                                                        <strong><span>{{$item['qty']}}x {{ $item['title']}}</span>@currency($item['price'])</strong>
                                                    </a>
                                                    <a href="{{ route('delete-cart',$item['book_id'])}}" class="action"><i class="ti-trash"></i></a>
                                                </li>
                                                @empty
                                                    <li> belum ada keranjang belanja</li>
                                                @endforelse
                                            </ul>
                                            <div class="total_drop">
                                                <div class="clearfix"><strong>Total</strong><span>@currency($subtotal)</span></div>
                                                <a href="{{ route('list-cart')}}" class="btn_1 outline">Lihat Keranjang</a><a href="{{ route ('checkout')}}" class="btn_1">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /dropdown-cart-->
                                </li>
                                <li>
                                    <a href="#" class="wishlist"><span>Wishlist</span></a>
                                </li>
                                <li>
                                    <div class="dropdown dropdown-access">
                                        <a href="{{ route('member-profil')}}" class="access_link"><span>Account</span></a>
                                        <div class="dropdown-menu">
                                            <ul>
                                                @if (Auth::user())
                                                    <li>
                                                        <a href="{{ route('member-profil')}}"><i class="ti-user"></i>{{ Auth::user()->name }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('member-pesanan')}}"><i class="ti-truck"></i>Pesanan Saya</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                        <i class="ti-help-alt"></i>Keluar
                                                        </a>
    
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                            @csrf
                                                        </form>
                                                        {{-- <a href="#"><i class="ti-help-alt"></i>Keluar</a> --}}
                                                    </li>
                                                @else
                                                    <a href="{{ route('login')}}" class="btn_1">Masuk</a>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /dropdown-access-->
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
                                </li>
                                <li>
                                    <a href="#menu" class="btn_cat_mob">
                                        <div class="hamburger hamburger--spin" id="hamburger">
                                            <div class="hamburger-box">
                                                <div class="hamburger-inner"></div>
                                            </div>
                                        </div>
                                        Kategori
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <div class="search_mob_wp">
                    <form action="{{ route('search')}}" method="GET">
                        <input type="text" name="keyword" placeholder="Cari Produk..." >
                        <button type="submit"><i class="header-icon_search_custom"></i></button>
                    </form>

                    {{-- <input type="text" class="form-control" placeholder="Cari Produk..."> --}}
                    {{-- <input type="submit" class="btn_1 full-width" value="Search"> --}}
                </div>
                <!-- /search_mobile -->
            </div>
            <!-- /main_nav -->
        </header>
        <!-- /header -->