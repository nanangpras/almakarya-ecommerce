@extends('backend.layouts.member')
@section('content')
<div class="container-fluid">
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h5 class="txt-dark">invoice</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="index.html">Dashboard</a></li>
                <li><a href="#"><span>special pages</span></a></li>
                <li class="active"><span>invoice</span></li>
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
                        <h6 class="panel-title txt-dark">Invoice</h6>
                    </div>
                    <div class="pull-right">
                        <h6 class="txt-dark">Order {{ $order->code_transaction}}</h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="txt-dark head-font inline-block capitalize-font mb-5">Billed to:</span>
                                <address class="mb-15">
                                    <span class="address-head mb-5">{{ $order->user->name}}</span>
                                    {{-- {{ $transaction->user->email}} <br> --}}
                                    {{-- San Francisco, CA 94107 <br> --}}
                                    {{-- <abbr title="Phone">P:</abbr>(133) 456-7890 --}}
                                </address>
                            </div>
                            {{-- <div class="col-xs-6 text-right">
                                <span class="txt-dark head-font inline-block capitalize-font mb-5">shiped to:</span>
                                <address class="mb-15">
                                    <span class="address-head mb-5">Xyz, Inc.</span>
                                    795 Folsom Ave, Suite 600 <br>
                                    San Francisco, CA 94107 <br>
                                    <abbr title="Phone">P:</abbr>(123) 456-7890
                                </address>
                            </div> --}}
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <span class="txt-dark head-font capitalize-font mb-5">Payment Method:</span>
                                    <br>
                                    {{ $order->va_number}}<br>
                                    {{ $order->bank_name}}<br>
                                    {{ $order->user->email}}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <address>
                                    <span class="txt-dark head-font capitalize-font mb-5">order date:</span><br>
                                    {{ $order->created_at}}<br><br>
                                </address>
                            </div>
                        </div>
                        
                        <div class="seprator-block"></div>
                        
                        <div class="invoice-bill-table">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Totals</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->details as $list)
                                        <tr>
                                            <td>{{ $list->book->title}}</td>
                                            <td>@currency($list->book->price)</td>
                                            <td>{{ $list->qty}}</td>
                                            <td>@currency( $list->book->price * $list->qty)</td>
                                        </tr>
                                        @endforeach
                                        <tr class="txt-dark">
                                            <td></td>
                                            <td></td>
                                            <td>Kurir</td>
                                            <td>@currency( $order->cost)</td>
                                        </tr>
                                        <tr class="txt-dark">
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td>@currency( $order->transaction_total)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="button-list pull-right">
                                @if ($order->transaction_status == 'In_Cart')
                                    <a href="{{ $order->payment_url}}" class="btn btn-success mr-10">
                                        <i class="fa fa-money"></i>
                                        Proceed to payment 
                                    </a>
                                @elseif ($order->transaction_status == 'Pending')
                                    <a href="{{ $order->payment_url}}" class="btn btn-success mr-10">
                                        <i class="fa fa-money"></i>
                                        Proceed to payment 
                                    </a>
                                @elseif ($order->transaction_status == 'Success')
                                    <span class="badge badge-success">{{$order->transaction_status}}
                                        <i class="fa fa-check"></i>
                                    </span>
                                @endif
                                <button type="button" class="btn btn-primary btn-outline btn-icon left-icon" onclick="javascript:window.print();"> 
                                    <i class="fa fa-print"></i><span> Print</span> 
                                </button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
    
</div>
@endsection()
