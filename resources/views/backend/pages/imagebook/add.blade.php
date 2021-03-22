@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Add Image</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Image</span></a></li>
            <li class="active"><span>Add Image Book</span></li>
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
                            <form action="{{ route('bookimage.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Add Book Image</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Name</label>
                                            <select name="book_id" class="form-control @error('book_id') is invalid @enderror" tabindex="1">
                                                <option>-- Book --</option>
                                                @foreach ($book as $id => $title)
                                                    <option value="{{$id}}">{{$title}}</option>
                                                @endforeach
                    
                                                {{-- <option value="2">Tas</option> --}}
                                            </select>
                                            @error('category_id')
                                                    <span class="help-block"> {{$message}} </span>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Image</label>
                                            <input type="file" name="image" placeholder="Company Name"
                                                class="upload form-control @error('image') is invalid @enderror" value="{{old('image')}}"
                                                onchange="previewFile(this)">
                                            @error('image')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img id="previewImg" style="max-width:100px">
                                        </div>
                                    </div>
                                </div>
                                <!-- Row -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
                                    <a href="{{ route('bookimage.index')}}" class="btn btn-warning pull-left">Cancel</a>
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
