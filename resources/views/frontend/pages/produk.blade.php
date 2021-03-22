@extends('frontend.layout.home')
@section('main')
<!-- Main -->
<main>
    <div class="container margin_30">
        <div class="row">
            <aside class="col-lg-3" id="sidebar_fixed">
                <form action="{{ route('filter')}}">
                    
                    <div class="filter_col">
                        <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                        <div class="filter_type version_2">
                            <h4><a href="#filter_1" data-toggle="collapse" class="opened">Kategori</a></h4>
                            <div class="collapse show" id="filter_1">
                                <ul>
                                    @foreach ($categories as $category)
                                        <li>
                                            <label class="container_check">{{ $category->name}}
                                            <input type="checkbox" name="kategori" value="{{ $category->name}}">
                                            <span class="checkmark"></span>
                                        </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- /filter_type -->
                        </div>
                        <div class="filter_type version_2">
                            <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
                            <div class="collapse" id="filter_4">
                                <ul>
                                    <li>
                                        <label class="container_check">Rp0 — Rp50.000<small>11</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Rp 50.000 — Rp 100.000<small>08</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Rp 100.000 — Rp 150.000<small>05</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    </li>
                                    <li>
                                        <label class="container_check">Rp 150.000 — Rp 200.000<small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    </li>
                                    <li>
                                        <label class="container_check"> Rp 200.000 <<small>18</small>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /filter_type -->
                        <div class="buttons">
                            <button type="submit" class="btn_1">Filter</button> <a href="#0" class="btn_1 gray">Reset</a>
                        </div>
                    </div>
                </form>
            </aside>
            <!-- /col -->
            <div class="col-lg-9">
                <div class="top_banner">
                    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                        <div class="container pl-lg-5">
                            <div class="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Kategori</a></li>
                                    <li>Buku</li>
                                </ul>
                            </div>
                            <h1>Buku - Produk Pilihan</h1>
                        </div>
                    </div>
                    @foreach ($bannerProduk as $item)
                        <img src="{{ $item->banner_image}}" class="img-fluid" alt="">
                    @endforeach
                </div>
                <!-- /top_banner -->
                <div id="stick_here"></div>
                <div class="toolbox elemento_stick add_bottom_30">
                    <div class="container">
                        <ul class="clearfix">
                            <li>
                                <div class="sort_select">
                                    <select name="sort" id="sort">
                                    <option value="popularity" selected="selected">Sort by rekomendasi</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to
                                </select>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /toolbox -->
                <div class="row small-gutters">
                    @forelse ($products as $book)
                        <div class="col-6 col-md-4">
                            <div class="grid_item">
                                <figure>
                                    <a href="{{ route('produk-detail',$book->slug)}}">
                                        <img class="img-fluid lazy" src="{{ url ('frontend/img/products/product_placeholder_square_medium.jpg')}}" data-src="{{ $book->imagebook->count() ? Storage::url($book->imagebook->first()->image) : '' }}" alt="">
                                    </a>
                                    {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                                </figure>
                                <a href="{{ route('produk-detail',$book->slug)}}">
                                    <h3>{{ $book->title}}</h3>
                                </a>
                                <div class="price_box">
                                    <span class="new_price">@currency($book->price)</span>
                                </div>
                                <ul>
                                    {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li> --}}
                                </ul>
                            </div>
                            <!-- /grid_item -->
                        </div>
                        <!-- /col -->
                    
                    @empty
                        
                    @endforelse

                </div>
                <!-- /row -->
                <div class="pagination__wrapper">
                    {{-- {{!! $products->links() !!}} --}}
                    <ul class="pagination">

                        <li><a href="#0" class="prev" title="previous page">&#10094;</a></li>
                        <li>
                            <a href="#0" class="active">1</a>
                        </li>
                        
                        <li><a href="#0" class="next" title="next page">&#10095;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /main -->
<!-- /Main -->
@endsection