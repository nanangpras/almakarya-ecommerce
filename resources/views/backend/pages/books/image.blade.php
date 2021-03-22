@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">add-products</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>e-commerce</span></a></li>
            <li class="active"><span>add-products</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    
    <!-- Row -->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title inline-block txt-dark">Book Image</h6>
                        <span class="label label-info capitalize-font inline-block ml-10">{{ $book->title }}</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="gallery-wrap">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="portfolio-wrap project-gallery">
                                        <ul id="portfolio_1" class="portf auto-construct  project-gallery" data-col="4">
                                            @forelse ($items as $item)
                                            <a href="">
                                                <img
                                            src="{{ Storage::url($item->image)}}"
                                            class="item img-responsive img-thumbnail-fluid mx-auto d-block"
                                            height="100"
                                            width="100"
                                            />
                                            </a>
                                            
                                            {{-- <li  class="item"   data-src="{{ Storage::url($item->image)}}" data-sub-html="<h6>Bagwati</h6><p>Classic view from Rigwood Jetty on Coniston Water an old archive shot similar to an old post but a little later on.</p>" >
                                                <a href="">
                                                <img class="img-responsive img-thumbnail-fluid float-left mr-5 mb-5" src="{{ Storage::url($item->image)}}"  alt="Image description" height="100px" width="100px" />
                                                <span class="hover-cap">{{ $book->title }}</span>
                                                </a>
                                            </li> --}}
                                            @empty
                                            <p class="card-text text-center">
                                                Belum ada gambar
                                            </p>
                                            @endforelse
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('book.index')}}" class="btn btn-primary waves-effect waves-light">Back</a>
            <a href="{{ route('bookimage.create')}}" class="btn btn-success waves-effect waves-light">Add Image</a>
        </div>
    </div>
    <!-- /Row -->

</div>
@endsection()
