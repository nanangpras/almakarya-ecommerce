@extends('backend.layouts.member')
@section('content')
<div class="container-fluid">
				
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Riwayat Pesanan Anda</h5>
          
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Member</a></li>
            <li><a href="#"><span>Layanan</span></a></li>
            <li class="active"><span>Pesanan</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 ">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        {{-- <a href="{{ route('author.create')}}" class="btn btn-primary btn-sm btn-rounded"> + Add Author</a> --}}
                        <h5 class="txt-dark">Riwayat</h5>
                    </div>
                    <a href="{{ route('member-pesanan-barusaja')}}" class="btn btn-primary btn-xs btn-rounded"> 
                        <i class="fa fa-shopping-cart"></i>
                        Baru saja
                    </a>
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
                                            {{-- <th>Qty</th> --}}
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor Invoice</th>
                                            {{-- <th>Qty</th> --}}
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($order as $item)
                                            <tr>
                                                <td>{{ $item->code_transaction}}</td>
                                                {{-- <td>{{ $item->transaction_status}}</td> --}}
                                                {{-- <td>kosong</td> --}}
                                                <td>@currency($item->transaction_total)</td>
                                                <td>{{$item->transaction_status}}</td>
                                                <td>
                                                    {{-- @if (!$item->isPaid())    
                                                        <a href="{{ $item->payment_url}}" class="btn btn-warning btn-xs">Bayar</a>
                                                    @endif --}}
                                                    @if($item->transaction_status == 'In_Cart')
                                                        <a href="{{ $item->payment_url}}" class="btn btn-warning btn-xs btn-rounded">
                                                            <i class="fa fa-money"></i>
                                                        </a>
                                                    @elseif($item->transaction_status == 'Pending')
                                                        <a href="{{ $item->payment_url}}" class="btn btn-warning btn-xs btn-rounded">
                                                            <i class="fa fa-money"></i>
                                                        </a>
                                                    @elseif($item->transaction_status == 'Success')
                                                        <span class="badge badge-success">{{$item->transaction_status}}
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                    @elseif($item->transaction_status == 'Failed')
                                                        <span class="badge badge-success">{{$item->transaction_status}}</span>
                                                    @else
                                                        
                                                    @endif

                                                    <a href="{{ route('detail-pesanan',$item->id)}}" class="btn btn-primary btn-xs btn-rounded"> 
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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
