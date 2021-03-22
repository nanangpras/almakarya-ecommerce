@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
				
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Data Portofolio</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Portofolio</span></a></li>
            <li class="active"><span>Data Portofolio</span></li>
          </ol>
        </div>
        <!-- /Breadcrumb -->
    </div>
    <!-- /Title -->
    
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <a href="{{ route('portofolio.create')}}" class="btn btn-primary btn-sm btn-rounded"> + Add Portofolio</a>
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
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Link</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->slug }}</td>
                                            <td><img src="{{ asset($item->image) }}" height="50" width="50" alt=""></td>

                                            <td>
                                                <a href="{{ route('portofolio.edit',$item->id)}}" class="btn btn-success btn-xs btn-rounded"> 
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" 
                                                    class="btn btn-danger btn-xs btn-rounded delete" 
                                                    data-toggle="modal" id="smallButton"
                                                    data-target="#smallModal"
                                                    data-title="Peringatan"
                                                    {{-- data-id="{{$item->id}}" --}}
                                                    data-remote="{{ route('portofolio.show', $item->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
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
{{-- /modal --}}
<div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="smallBody">
                <div>
                    <!-- the result to be displayed apply here -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection()
@push('after-scripts')
<script>
    // display a modal (small modal)
    $(document).on('click', '#smallButton', function(event) {
        event.preventDefault();
        let href = $(this).attr('data-attr');
        $.ajax({
            url: href
            , beforeSend: function() {
                $('#loader').show();
            },
            // return the result
            success: function(result) {
                $('#smallModal').modal("show");
                $('#smallBody').html(result).show();
            }
            , complete: function() {
                $('#loader').hide();
            }
            , error: function(jqXHR, testStatus, error) {
                console.log(error);
                alert("Page " + href + " cannot open. Error:" + error);
                $('#loader').hide();
            }
            , timeout: 8000
        })
    });

</script>
@endpush
