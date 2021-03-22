@extends('backend.layouts.member')
@section('content')
<div class="container-fluid">
				
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Resi Pesanan Anda</h5>
          
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Member</a></li>
            <li><a href="#"><span>Pesanan</span></a></li>
            <li class="active"><span>Resi</span></li>
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
                                            <th>Kurir</th>
                                            <th>Resi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nomor Invoice</th>
                                            {{-- <th>Qty</th> --}}
                                            <th>Total Pembayaran</th>
                                            <th>Status</th>
                                            <th>Kurir</th>
                                            <th>Resi</th>
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
                                                <td>
                                                    <span class="badge badge-success">{{$item->transaction_status}}
                                                        <i class="fa fa-check"></i>
                                                    </span>
                                                </td>
                                                <td>{{ $item->courier}}</td>
                                                <td>{{ $item->tracking_number}}</td>
                                                <td>
                                                    @if ($item->courier == 'jne')
                                                        <a href="https://www.jne.co.id/id/tracking/trace" target="_blank" class="btn btn-primary btn-xs btn-rounded"> 
                                                            <i class="fa fa-truck"></i>
                                                        </a>                                                        
                                                    @elseif($item->courier == 'jnt')
                                                        <a href="https://www.jet.co.id/track" target="_blank" class="btn btn-primary btn-xs btn-rounded"> 
                                                            <i class="fa fa-truck"></i>
                                                        </a>
                                                    @endif

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
