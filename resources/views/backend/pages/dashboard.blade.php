@extends('backend.layouts.admin')
@section('content')
    <div class="container-fluid pt-25">

        <!-- Row -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pt-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-white">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">Rp <span
                                                    class="counter-anim">{{$income}}</span></span>
                                            <span class="block"><span
                                                    class="weight-500 uppercase-font txt-grey font-13">Sukses</span><i
                                                    class="zmdi zmdi-caret-down txt-danger font-21 ml-5 vertical-align-middle"></i></span>
                                        </div>
                                        <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                            <div class="sp-small-chart">
                                                <span class="badge badge-success">
                                                    dari {{$sukses}} transaksi
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pt-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-white">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">Rp <span
                                                    class="counter-anim">{{$pendingtransaksi}}</span></span>
                                            <span class="block"><span
                                                    class="weight-500 uppercase-font txt-grey font-13">Pending</span><i
                                                    class="zmdi zmdi-caret-up txt-success font-21 ml-5 vertical-align-middle"></i></span>
                                        </div>
                                        <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                            <div class="sp-small-chart">
                                                <span class="badge badge-warning">
                                                dari {{$pending}} transaksi
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pt-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-white">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter">Rp <span
                                                    class="counter-anim">{{$incarttransaksi}}</span></span>
                                            <span class="block"><span
                                                    class="weight-500 uppercase-font txt-grey font-13">In Cart</span><i
                                                    class="zmdi zmdi-caret-up txt-success font-21 ml-5 vertical-align-middle"></i></span>
                                        </div>
                                        <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                            <div class="sp-small-chart">
                                                <span class="badge badge-danger">
                                                dari {{$incart}} transaksi
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-default card-view pt-0">
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body pa-0">
                            <div class="sm-data-box bg-white">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xs-6 text-left pl-0 pr-0 data-wrap-left">
                                            <span class="txt-dark block counter"><span
                                                    class="counter-anim">{{$produk}}</span></span>
                                            <span class="block"><span
                                                    class="weight-500 uppercase-font txt-grey font-13">Produk</span><i
                                                    class="zmdi zmdi-caret-down txt-danger font-21 ml-5 vertical-align-middle"></i></span>
                                        </div>
                                        {{-- <div class="col-xs-6 text-left  pl-0 pr-0 pt-25 data-wrap-right">
                                            <div id="sparkline_6" class="sp-small-chart"></div>
                                        </div> --}}
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
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="panel panel-default card-view panel-refresh">
                    <div class="refresh-container">
                        <div class="la-anim-1"></div>
                    </div>
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Transaksi</h6>
                        </div>
                        <div class="pull-right">
                            <a href="{{ route('transaction.index')}}" class="pull-left btn btn-success btn-xs mr-15">view all</a>
                            <a href="#" class="pull-left inline-block refresh mr-15">
                                <i class="zmdi zmdi-replay"></i>
                            </a>
                            <a href="#" class="pull-left inline-block full-screen mr-15">
                                <i class="zmdi zmdi-fullscreen"></i>
                            </a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body row pa-0">
                            <div class="table-wrap">
                                <div class="table-responsive">
                                    <table id="myTable1" class="table  display table-hover border-none">
                                        <thead>
                                            <tr>
                                                <th>#Invoice</th>
                                                <th>User</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>issue date</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($transaction as $item)
                                                <tr>
                                                    <td>{{ $item->code_transaction}}</td>
                                                    <td>{{ $item->user->name}}</td>
                                                    <td>@currency($item->transaction_total)</td>
                                                    <td>
                                                        @if ($item->transaction_status == 'Pending')
                                                            <span class="badge badge-warning">
                                                        @elseif($item->transaction_status == 'In_Cart')
                                                            <span class="badge badge-default">
                                                        @elseif($item->transaction_status == 'Success')
                                                            <span class="badge badge-success">
                                                        @elseif($item->transaction_status == 'Failed')
                                                            <span class="badge badge-danger">
                                                        @else
                                                            <span>
                                                        @endif
                                                        {{ $item->transaction_status }}
                                                        </span>
                                                        {{-- <span class="label label-danger">unpaid</span> --}}
                                                    </td>
                                                    <td>{{ $item->created_at}}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4"> Belum ada pesanan</td>
                                                </tr>
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
