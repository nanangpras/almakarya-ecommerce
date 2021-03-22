@extends('frontend.layout.home')
@section('main')
<main>
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            @foreach ($banner as $item)
            <div class="owl-slide cover" style="background-image: url('{{ $item->banner_image}}')">
                {{-- <div class="owl-slide cover" style="background-image: url {{ $item->banner_image}}"> --}}
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
                        <div class="container">
                            <div class="row justify-content-center justify-content-md-start">
                                <div class="col-lg-6 static">
                                    <div class="slide-text white">
                                        <h2 class="owl-slide-animated owl-slide-title">{{ $item->name}}</h2>
                                        <p class="owl-slide-animated owl-slide-subtitle">
                                            Limited items available at this price
                                        </p>
                                        <div class="owl-slide-animated owl-slide-cta">
                                            <a class="btn_1" href="{{ $item->link}}" role="button">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->

    <ul id="banners_grid" class="clearfix">
        <li>
            <a href="#0" class="img_container">
                <img src="img/banners_cat_placeholder.jpg" data-src="{{ url('frontend/img/products/banner1.jpg')}}" alt="" class="lazy" width="600" height="400">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Koleksi Komik</h3>
                    <div><span class="btn_1">Belanja Sekarang</span></div>
                </div>
            </a>
        </li>
        <li>
            <a href="#0" class="img_container">
                <img src="img/banners_cat_placeholder.jpg" data-src="{{ url('frontend/img/products/banner2.jpg')}}" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Koleksi Novel</h3>
                    <div><span class="btn_1">Belanja Sekarang</span></div>
                </div>
            </a>
        </li>
        <li>
            <a href="#0" class="img_container">
                <img src="img/banners_cat_placeholder.jpg" data-src="{{ url('frontend/img/products/banner3.jpg')}}" alt="" class="lazy">
                <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <h3>Koleksi Sastra</h3>
                    <div><span class="btn_1">Belanja Sekarang</span></div>
                </div>
            </a>
        </li>
    </ul>
    <!--/banners_grid -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Rekomendasi Jitus</h2>
            <span>Books</span>
            <p>Rekomendasi yang layak Anda baca dari kami</p>
        </div>
        <div class="row small-gutters">
            @foreach ($items as $book)
                
            <!-- /col -->
            <div class="col-6 col-md-4 col-xl-3">
                <div class="grid_item">
                    <span class="ribbon hot">Rekomendasi</span>
                    <figure>
                        <a href="{{ route('produk-detail',$book->slug)}}">
                            <img class="img-fluid lazy" src="{{ url('frontend/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{ $book->imagebook->count() ? Storage::url($book->imagebook->first()->image) : '' }}" alt="" width="auto" height="400">
                            {{-- <img class="img-fluid lazy" src="{{ url('frontend/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{ url('frontend/img/products/buku_8.png')}}" alt="" width="auto" height="400"> --}}
                        </a>
                    </figure>
                    {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
                    <a href="{{ route('produk-detail',$book->slug)}}">
                        <h3>{{ $book->title}}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">@currency($book->price)</span>
                    </div>
                    <ul>
                        {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
                        {{-- <li><a href="{{ route('addto-cart')}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li> --}}
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            <!-- /col -->
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    @foreach ($bannerpromosi as $item)
        <div class="featured lazy" data-bg="url('{{$item->banner_image}}')">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <div class="container margin_60">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-6 wow" data-wow-offset="150">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->description}}</p>
                            <div class="feat_text_block">
                                <a class="btn_1" href="{{$item->link}}" role="button">Belanja Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <!-- /featured -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Buku-buku Terbaru</h2>
            <span>Books</span>
            <p>Buku terbaru dari Jitus</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($terbaru as $item)
            <div class="item">
                <div class="grid_item">
                    <span class="ribbon new">Baru</span>
                    <figure>
                        <a href="{{ route('produk-detail',$item->slug)}}">
                            <img class="owl-lazy" src="{{ url('frontend/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{ $item->imagebook->count() ? Storage::url($item->imagebook->first()->image) : '' }}" alt="" width="auto" height="auto">
                        </a>
                    </figure>
                    {{-- <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div> --}}
                    <a href="{{ route('produk-detail',$item->slug)}}">
                        <h3>{{ $item->title }}</h3>
                    </a>
                    <div class="price_box">
                        <span class="new_price">@currency($item->price)</span>
                    </div>
                    <ul>
                        {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
                        {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li> --}}
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            @endforeach
        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->


    <!-- /ISI BRAND PARTNER DISINI -->


    <div class="bg_white">
        <div class="container margin_30 ">
            <div id="brands" class="owl-carousel owl-theme">
                @foreach ($portofolio as $item)
                    <div class="item">
                        <a href="#0"><img src="{{ url('frontend/img/brands/placeholder_brands.png')}}" data-src="{{ Storage::url($item->image)}}" alt="" width="auto" height="110" class="owl-lazy"></a>
                    </div>
                @endforeach
                
            </div>
            <!-- /carousel -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_gray -->

    <!-- <div class="container margin_60_35">
        <div class="main_title">
            <h2> Artikel Gramedia</h2>
            <span>Blog</span>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure>
                        <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-1.jpg" alt="" width="400" height="266" class="lazy">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>by Budi</li>
                        <li>20.11.2021</li>
                    </ul>
                    <h4>Pri oportere scribentur eu</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div>
            <!-- /box_news -->
    <!-- <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure>
                        <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-2.jpg" alt="" width="400" height="266" class="lazy">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>By Ani</li>
                        <li>20.11.2021li>
                    </ul>
                    <h4>Duo eius postea suscipit ad</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div> -->
    <!-- /box_news -->
    <!-- <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure>
                        <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-3.jpg" alt="" width="400" height="266" class="lazy">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>By Sprapto</li>
                        <li>20.11.2021</li>
                    </ul>
                    <h4>Elitr mandamus cu has</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div> -->
    <!-- /box_news -->
    <!-- <div class="col-lg-6">
                <a class="box_news" href="blog.html">
                    <figure>
                        <img src="img/blog-thumb-placeholder.jpg" data-src="img/blog-thumb-4.jpg" alt="" width="400" height="266" class="lazy">
                        <figcaption><strong>28</strong>Dec</figcaption>
                    </figure>
                    <ul>
                        <li>By Paula Rodrigez</li>
                        <li>20.11.2017</li>
                    </ul>
                    <h4>Id est adhuc ignota delenit</h4>
                    <p>Cu eum alia elit, usu in eius appareat, deleniti sapientem honestatis eos ex. In ius esse ullum vidisse....</p>
                </a>
            </div> -->
    <!-- /box_news -->
    <!-- </div> -->
    <!-- /row -->
    <!-- </div> -->
    <!-- /container -->
</main>
<!-- /main -->

<!-- /main -->
@endsection