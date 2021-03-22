@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Add Book</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Books</span></a></li>
            <li class="active"><span>Add Book</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="{{ route('book.store')}}" method="POST">
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>about product</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Publisher</label>
                                            <select name="publisher" class="form-control @error('author') is invalid @enderror">
                                                <option>-- Pilih Publisher --</option>
                                                @foreach ($publisher as $id => $name)
                                                <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                                                <a href="google.com" class=""><option value="">-- Buat Publisher --</option> </a>
                    
                                                {{-- < value="2">Tas</> --}}
                                            </select>
                                            @error('publisher')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Author</label>
                                            <select name="author" class="form-control @error('author') is invalid @enderror" tabindex="1">
                                                @foreach ($author as $id => $name)
                                                <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                                                <option value="{{ route('author.index')}}">-- Buat Author --</option>
                    
                                                {{-- <option value="2">Tas</option> --}}
                                            </select>
                                            @error('author')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">ISBN</label>
                                            <input type="text" name="isbn" placeholder="ISBN"
                                                    class="form-control @error('isbn') is invalid @enderror" value="{{old('isbn')}}">
                                            @error('isbn')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Book Title</label>
                                            <input type="text" name="title" placeholder="Book Name"
                                                    class="form-control @error('title') is invalid @enderror" value="{{old('title')}}">
                                            @error('title')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Category</label>
                                            <select name="category_id" class="form-control @error('category_id') is invalid @enderror" tabindex="1">
                                                <option>-- Pilih Category --</option>
                                                @foreach ($category as $id => $name)
                                                    <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                    
                                                {{-- <option value="2">Tas</option> --}}
                                            </select>
                                            @error('category_id')
                                                    <span class="help-block"> {{$message}} </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Recomendation</label>
                                            <div class="radio-list">
                                                <div class="radio-inline pl-0">
                                                    <div class="radio radio-success">
                                                        <input type="radio" 
                                                            class="form-check-input @error('recommendation') is invalid @enderror"    
                                                            name="recommendation" value="1">
                                                        <label>Ya</label>
                                                    </div>
                                                </div>
                                                <div class="radio-inline">
                                                    <div class="radio radio-success ">
                                                        <input type="radio" 
                                                            class="form-check-input @error('recommendation') is invalid @enderror"
                                                            name="recommendation" value="0" checked>
                                                        <label>Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @error('recommendation')
                                            <span class="help-block"> {{$message}} </span>
                                        @enderror
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                                <input type="number" name="price" placeholder="Rp 45.000"
                                                    class="form-control @error('price') is invalid @enderror" value="{{old('price')}}">
                                            </div>
                                            @error('price')
                                                    <span class="help-block"> {{$message}} </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Discount</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                <input type="text" class="form-control" placeholder="36%">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="seprator-block"></div>
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Product Description</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control @error('description') is invalid @enderror" value="{{old('description')}}" name="description" rows="4">Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. but the majority have suffered alteration in some form, by injected humour</textarea>
                                            @error('description')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="seprator-block"></div>
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-calendar-note mr-10"></i>general info</h6>
                                <hr class="light-grey-hr"/>
                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Publisher</label>
                                            <select name="publisher" class="form-control @error('author') is invalid @enderror">
                                                <option>-- Pilih Publisher --</option>
                                                @foreach ($publisher as $id => $name)
                                                    <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                    
                                                {{-- <option value="2">Tas</option> --}}
                                            {{-- </select>
                                            @error('publisher')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Author</label>
                                            <select name="author" class="form-control @error('author') is invalid @enderror" tabindex="1">
                                                <option>-- Pilih Author --</option>
                                                @foreach ($author as $id => $name)
                                                    <option value="{{$id}}">{{$name}}</option>
                                                @endforeach
                    
                                                {{-- <option value="2">Tas</option> --}}
                                            {{-- </select>
                                            @error('author')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>  --}} 

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Publication book</label>
                                            <input type="text" name="publication_date" placeholder="Publication date book"
                                                class="form-control @error('publication_date') is invalid @enderror" value="{{old('publication_date')}}">
                                            @error('publication_date')
                                                    <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Publication Ebook</label>
                                            <input type="text" name="publication_ebook" placeholder="Publication date ebook"
                                                class="form-control @error('publication_ebook') is invalid @enderror" value="{{old('publication_ebook')}}">
                                            @error('publication_ebook')
                                                    <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Weight</label>
                                            <input type="text" name="weight" placeholder="Weight"
                                                class="form-control @error('weight') is invalid @enderror" value="{{old('weight')}}">
                                            @error('weight')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Size</label>
                                            <input type="text" name="size" placeholder="Size"
                                                class="form-control @error('size') is invalid @enderror" value="{{old('size')}}">
                                            @error('size')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Quantity</label>
                                            <input type="text" name="available_qty" placeholder="Available quantity"
                                                class="form-control @error('available_qty') is invalid @enderror" value="{{old('available_qty')}}">
                                            @error('available_qty')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col md-12">
                                        <div class="form-group">
                                            <label class="control-label mb-5">slug</label>
                                            <input type="text" name="slug" placeholder="Available quantity"
                                                class="form-control @error('slug') is invalid @enderror" value="{{old('slugs')}}">
                                            @error('slug')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
                                    <a href="{{ route('book.index')}}" type="button" class="btn btn-warning pull-left">Cancel</a>
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
