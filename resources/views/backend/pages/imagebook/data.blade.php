@extends('backend.layouts.admin')
@section('content')
<div class="container-fluid">
				
    <!-- Title -->
    <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark">Data Image</h5>
        </div>
        <!-- Breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
          <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#"><span>Image Book</span></a></li>
            <li class="active"><span>Data Image Book</span></li>
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
                        <a href="{{ route('bookimage.create')}}" class="btn btn-primary btn-sm btn-rounded"> + Add Book Image</a>
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
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @forelse ($image as $item)
                                        <tr>
                                            <td>{{ $item->book->title }}</td>
                                            <td><img src="{{ Storage::url($item->image) }}" height="100" width="100" class="img-thumbnail"></td>
                                            <td>
                                                <a href="{{ route('bookimage.edit',$item->id)}}" class="btn btn-success btn-xs btn-rounded"> 
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="#" 
                                                    class="btn btn-danger btn-xs btn-rounded delete" 
                                                    data-toggle="modal" id="smallButton"
                                                    data-target="#smallModal"
                                                    data-title="Peringatan"
                                                    {{-- data-id="{{$item->id}}" --}}
                                                    data-remote="{{ route('bookimage.show', $item->id) }}">
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
            @foreach ($image as $item)
                <div class="modal-body" id="smallBody">
                    <form action="{{ route('bookimage.destroy',$item->id) }}"
                        method="post"
                        class="d-inline"
                        id="delete{{$item->id}}">
                        @csrf
                        @method('delete')
                        <input type="hidden" id="id" name="id">
                        <p class="text-center">Are you sure you want to delete </p>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script>
    $(document).on('click','.delete',function(){
         let id = $(this).attr('data-id');
         $('#id').val(id);
    });
</script>
@endsection()
