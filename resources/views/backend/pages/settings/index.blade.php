@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Setting Aplikasi</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#"><span>Setting Aplikasi</span></a></li>
            <li class="active"><span>Update Aplikasi</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    
    <!-- Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Aplikasi</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Info Aplikasi</h6>
                                            <hr class="light-grey-hr"/>
                                            @foreach ($item as $setting)
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">No Telp:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->no_telp }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Email:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->email }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">No WA:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->no_wa }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Alamat:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->alamat }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                            <!-- /Row -->
                                            
                                            <div class="seprator-block"></div>
                                            
                                            <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Sosial Media</h6>
                                            <hr class="light-grey-hr"/>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Twitter:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->link_twitter }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Instagram:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->link_ig }} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Row -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Facebook:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->link_fb}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Youtube:</label>
                                                        <div class="col-md-9">
                                                            <p class="form-control-static"> {{ $setting->link_yt}} </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-actions mt-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <a href="{{ route('settingapp.edit', $setting->id)}}" class="btn btn-info btn-icon left-icon  mr-10"> <i class="zmdi zmdi-edit"></i> <span>Edit</span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->

</div>
@endsection()
