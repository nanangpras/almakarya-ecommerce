@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Edit Publisher</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Publisher</span></a></li>
            <li class="active"><span>Edit Publisher</span></li>
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
                            <form action="{{ route('settingapp.update',$item->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit Aplikasi</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">No Telp</label>
                                            <input type="text" id="no_telp" name="no_telp" value="{{old('no_telp') ? old('no_telp') : $item->no_telp}}"
                                            class="form-control @error('no_telp') is invalid @enderror" value="{{old('no_telp')}}">
                                            @error('no_telp')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">No WA</label>
                                            <input type="text" id="no_wa" name="no_wa" value="{{old('no_wa') ? old('no_wa') : $item->no_wa}}"
                                            class="form-control @error('no_wa') is invalid @enderror" value="{{old('no_wa')}}">
                                            @error('no_wa')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Email</label>
                                            <input type="email" id="email" name="email" value="{{old('email') ? old('email') : $item->email}}"
                                            class="form-control @error('email') is invalid @enderror" value="{{old('email')}}">
                                            @error('email')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Alamat</label>
                                            <input type="text" id="alamat" name="alamat" value="{{old('alamat') ? old('alamat') : $item->alamat}}"
                                            class="form-control @error('alamat') is invalid @enderror" value="{{old('alamat')}}">
                                            @error('alamat')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="seprator-block"></div>
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Sosial Media</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Twitter</label>
                                            <input type="text" id="link_twitter" name="link_twitter" value="{{old('link_twitter') ? old('link_twitter') : $item->link_twitter}}"
                                            class="form-control @error('link_twitter') is invalid @enderror" value="{{old('link_twitter')}}">
                                            @error('link_twitter')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Instagram</label>
                                            <input type="text" id="link_ig" name="link_ig" value="{{old('link_ig') ? old('link_ig') : $item->link_ig}}"
                                            class="form-control @error('link_ig') is invalid @enderror" value="{{old('link_ig')}}">
                                            @error('link_ig')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Facebook</label>
                                            <input type="text" id="link_fb" name="link_fb" value="{{old('link_fb') ? old('link_fb') : $item->link_fb}}"
                                            class="form-control @error('link_fb') is invalid @enderror" value="{{old('link_fb')}}">
                                            @error('link_fb')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Youtube</label>
                                            <input type="text" id="link_yt" name="link_yt" value="{{old('link_yt') ? old('link_yt') : $item->link_yt}}"
                                            class="form-control @error('link_yt') is invalid @enderror" value="{{old('link_yt')}}">
                                            @error('link_yt')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- Row -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
                                    <a href="{{ route('settingapp.index')}}" class="btn btn-warning pull-left">Cancel</a>
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
