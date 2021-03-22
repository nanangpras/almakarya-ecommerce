@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Edit Banner</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Banner</span></a></li>
            <li class="active"><span>Edit Banner</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    
    <!-- Row -->
    <div class="row">
        <div class="col-sm-8">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="{{ route('banner.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit Banner</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Name</label>
                                            <input type="text" id="name" name="name" placeholder="Banner Name"
                                            class="form-control @error('name') is invalid @enderror"
                                            value="{{old('name') ? old('name') : $item->name}}">
                                            @error('name')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Description</label>
                                            <input type="text" id="name" name="description" placeholder="Banner Name"
                                            class="form-control @error('description') is invalid @enderror" 
                                            value="{{old('description') ? old('description') : $item->description}}">
                                            @error('description')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Link (Optional)</label>
                                            <input type="text" id="name" name="link" placeholder="Banner Link"
                                            class="form-control @error('link') is invalid @enderror" 
                                            value="{{old('link') ? old('link') : $item->link}}">
                                            @error('link')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Image</label>
                                            <input type="file" name="banner_image" placeholder="Company Name"
                                                class="upload form-control @error('banner_image') is invalid @enderror"
                                                value="{{old('banner_image') ? old('banner_image') : $item->banner_image}}"
                                                onchange="previewFile(this)">
                                            @error('banner_image')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img id="previewImg" src="{{ $item->banner_image}}" style="max-width:100px">
                                        </div>
                                    </div>
                                </div>
                                <!-- Row -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
                                    <a href="{{ route('banner.index')}}" class="btn btn-warning pull-left">Cancel</a>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

</div>
@endsection()

@push('after-scripts')
    <script>
        function previewFile(input) {
            var file=$("input[type=file]").get(0).files[0];
            if (file)
            {
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
    
@endpush
