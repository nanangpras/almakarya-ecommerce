@extends('backend.layouts.member')
@section('content')
<div class="container-fluid">
				
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Halo, Member</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Member</a></li>
            <li><a href="#"><span>Main</span></a></li>
            <li class="active"><span>Dashboard</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    				<!-- Row -->
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="sm-data-box">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                        <span class="txt-dark block counter"><span class="counter-anim">@currency( $transaction[0]->pending)</span></span>
                                                        <span class="weight-500 uppercase-font block font-13">Belum Terbayar</span>
                                                    </div>
                                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                        <i class="icon-user-following data-right-rep-icon txt-light-grey"></i>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="sm-data-box">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                        <span class="txt-dark block counter"><span class="counter-anim">{{$transaction[0]->shipping}}</span></span>
                                                        <span class="weight-500 uppercase-font block">Pengiriman</span>
                                                    </div>
                                                    <div class="col-xs-6 text-center  pl-0 pr-0 pt-25  data-wrap-right">
                                                        <div class="sp-small-chart" id="sparkline_4" ></div>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="sm-data-box">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                        <span class="txt-dark block counter"><span class="counter-anim">{{ $transaction[0]->completeOrder }}</span></span>
                                                        <span class="weight-500 uppercase-font block"> Selesai</span>
                                                    </div>
                                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                        <i class="icon-control-rewind data-right-rep-icon txt-light-grey"></i>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        {{-- <a href="{{ route('author.create')}}" class="btn btn-primary btn-sm btn-rounded"> + Add Author</a> --}}
                        <h5 class="txt-dark">Riwayat</h5>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="">
                                <table id="myTable1" class="table table-hover display  pb-30" >
                                    <thead>
                                        <tr>
                                            <th>Nomor Invoice</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor Invoice</th>
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($order as $item)
                                            <tr>
                                                <td>{{ $item->code_transaction}}</td>
                                                {{-- <td>kosong</td> --}}
                                                <td>@currency($item->transaction_total)</td>
                                                <td>
                                                    @if($item->transaction_status == 'In_Cart')
                                                        <span class="badge badge-warning">
                                                    @elseif($item->transaction_status == 'Success')
                                                        <span class="badge badge-success">
                                                    @elseif($item->transaction_status == 'Failed')
                                                        <span class="badge badge-danger">
                                                    @else
                                                        <span>
                                                    @endif
                                                        {{$item->transaction_status}}
                                                        </span>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="5">belum ada pesanan</td>
                                        @endforelse
                                    </tbody>
                                </table>
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
