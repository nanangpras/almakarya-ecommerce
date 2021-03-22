@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Edit User</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>User</span></a></li>
            <li class="active"><span>Edit User</span></li>
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
                            <form action="{{ route('user.store')}}" method="POST">
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Edit User</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Name</label>
                                            <input type="text" id="name" name="name" value="{{old('name')}}"
                                            class="form-control @error('name') is invalid @enderror" value="{{old('name')}}">
                                            @error('name')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Email</label>
                                            <input type="text" id="company_name" name="email" value="{{ old('email')}}"
                                                class="form-control @error('email') is invalid @enderror" value="{{old('email')}}">
                                            @error('email')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Password</label>
                                            <input type="password" id="password" name="password" value="{{ old('password')}}"
                                                class="form-control @error('email') is invalid @enderror" value="{{old('password')}}">
                                            @error('password')
                                                <span class="help-block"> {{$message}} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label mb-10">Roles</label>
                                            <select name="roles" class="form-control @error('roles') is invalid @enderror" tabindex="1">
                                                <option>-- Pilih Roles --</option>
                                                    <option value=USER>USER</option>
                                                    <option value=ADMIN>ADMIN</option>
                    
                                                {{-- <option value="2">Tas</option> --}}
                                            </select>
                                            @error('roles')
                                                    <span class="help-block"> {{$message}} </span>
                                                @enderror
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!-- Row -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>save</span></button>
                                    <a href="{{ route('user.index')}}" class="btn btn-warning pull-left">Cancel</a>
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
