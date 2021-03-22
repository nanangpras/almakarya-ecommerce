@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Add Produk</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Produk</span></a></li>
            <li class="active"><span>Add Produk</span></li>
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
                            <form action="{{ route('book.update',$item->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>tentang produk</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">No Produk</label>
                                            <input type="text" name="isbn" placeholder="No Produk"
                                                    class="form-control @error('isbn') is invalid @enderror" value="{{old('isbn') ? old('isbn') : $item->isbn}}">
                                            @error('isbn')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Nama Produk</label>
                                            <input type="text" name="title" placeholder="Nama Produk"
                                                    class="form-control @error('title') is invalid @enderror" value="{{old('title') ? old('title') : $item->title}}">
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
                                                @foreach ($category as $row)
                                                    <option value="{{ $row->id }}" {{ $item->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                                @endforeach
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
                                            <label class="control-label mb-10">Harga</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-money"></i></div>
                                                <input type="number" name="price" placeholder="Rp 45.000"
                                                    class="form-control @error('price') is invalid @enderror" value="{{old('price') ? old('price') : $item->price}}">
                                            </div>
                                            @error('price')
                                                    <span class="help-block"> {{$message}} </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Diskon (%)</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-cut"></i></div>
                                                <input type="text" class="form-control" placeholder="36%">
                                            </div>
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <div class="seprator-block"></div>
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-comment-text mr-10"></i>Produk Diskripsi</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control @error('description') is invalid @enderror" value="{{old('description') ? old('description') : $item->description}}" name="description" rows="4">{{ $item->description}}</textarea>
                                            @error('description')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="seprator-block"></div>
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-calendar-note mr-10"></i>Informasi Dasar
 </h6>
                                <hr class="light-grey-hr"/>
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Made In</label>
                                            <select name="publisher" class="form-control @error('author') is invalid @enderror">
                                                <option>-- Pilih Made In --</option>
                                                @foreach ($publisher as $row)
                                                    <option value="{{ $row->id }}" {{ $item->publisher == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('publisher')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Nama Perusahaan</label>
                                            <select name="author" class="form-control @error('author') is invalid @enderror" tabindex="1">
                                                <option>-- Pilih Nama Perusahaan --</option>
                                                @foreach ($author as $row)
                                                    <option value="{{ $row->id }}" {{ $item->author == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('author')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Tahun Versi Terbaru</label>
                                            <input type="text" name="publication_date" placeholder="2007"
                                                class="form-control @error('publication_date') is invalid @enderror" value="{{old('publication_date') ? old('publication_date') : $item->publication_date}}">
                                            @error('publication_date')
                                                    <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Tahun Revisi</label>
                                            <input type="text" name="publication_ebook" placeholder="2010"
                                                class="form-control @error('publication_ebook') is invalid @enderror" value="{{old('publication_ebook') ? old('publication_ebook') : $item->publication_ebook}}">
                                            @error('publication_ebook')
                                                    <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Berat (gram)</label>
                                            <input type="text" name="weight" placeholder="1000"
                                                class="form-control @error('weight') is invalid @enderror" value="{{old('weight') ? old('weight') : $item->weight}}">
                                            @error('weight')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Dimensi </label>
                                            <input type="text" name="size" placeholder="(p x l x t)"
                                                class="form-control @error('size') is invalid @enderror" value="{{old('size') ? old('size') : $item->size}}">
                                            @error('size')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label mb-5">Jumlah Produk</label>
                                            <input type="text" name="available_qty" placeholder="Jumlah Produk"
                                                class="form-control @error('available_qty') is invalid @enderror" value="{{old('available_qty') ? old('available_qty') : $item->available_qty}}">
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
