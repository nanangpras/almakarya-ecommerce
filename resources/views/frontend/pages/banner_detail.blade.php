@extends('frontend.layout.home')
@section('main')
<!-- Main -->
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Banner</a></li>
                    <li>Details</li>
                </ul>
            </div>
            <h1>{{ $banner->name}}</h1>
        </div>
        <!-- /page_header -->
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="owl-carousel owl-theme prod_pics magnific-gallery">
                    <div class="item">
                        <a href="{{ Storage::url($banner->banner_image)}}" title="{{$banner->name}}" data-effect="mfp-zoom-in"><img src="{{ Storage::url($banner->banner_image)}}" alt=""></a>
                    </div>
                </div>
                <!-- /carousel -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    
    <div class="bg_white">
        <div class="container margin_60_35">
            <div class="row justify-content-between">
                <div class="col-lg-12">
                    <div class="prod_info version_2">
                        <p>{{ $banner->description}}</p>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </div>
    <!-- /bg_white -->

</main>
<!-- /main -->


<!-- /Main -->
@endsection