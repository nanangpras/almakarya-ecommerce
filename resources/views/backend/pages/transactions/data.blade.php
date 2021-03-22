@extends('backend.layouts.admin')
@section('content')
    <div class="container-fluid">

        <!-- Title -->
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Data Transaction</h5>
            </div>
            <!-- Breadcrumb -->
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#"><span>Transaction</span></a></li>
                    <li class="active"><span>Data Transaction</span></li>
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
                            <div class="table-wrap">
                                <div class="">
                                    <table id="myTable1" class="table table-hover display  pb-30">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Customer</th>
                                                <th>VA Number</th>
                                                <th>Resi</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Customer</th>
                                                <th>VA Number</th>
                                                <th>Resi</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @forelse ($transaction as $item)
                                                <tr>
                                                    <td>{{ $item->code_transaction }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->va_number }}</td>
                                                    <td>{{ $item->tracking_number }}</td>
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

                                                    </td>
                                                    <td>
                                                        <a href="{{ route('transaction.show', $item->id) }}"
                                                            class="btn btn-default btn-xs btn-rounded">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('transaction.edit', $item->id) }}"
                                                            class="btn btn-success btn-xs btn-rounded">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        @if ($item->transaction_status == 'Success')
                                                            <a  href="mymodal"
                                                                data-remote="{{ route('transaction.resi',$item->id) }}"
                                                                data-target="#mymodal"
                                                                data-toggle="modal"
                                                                data-title="Detail Transaksi {{$item->uuid}}"
                                                                class="btn btn-primary btn-xs btn-rounded">
                                                                <i class="fa fa-truck"></i>
                                                            </a>
                                                        @endif
                                                    </td>

                                                </tr>
                                            @empty

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

@push('after-scripts')
<script>
    jQuery(document).ready(function ($) {
       $('#mymodal').on('show.bs.modal',function(e){
           var button = $(e.relatedTarget);
           var modal = $(this);

           modal.find('.modal-body').load(button.data("remote"));
           modal.find('.modal-title').html(button.data("title"));
       });
    });
</script>
{{-- Modal --}}
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <i class="fa fa-spinner fa-spin"></i>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
      </div>
    </div>
  </div>
@endpush
