
                    <div class="panel-body">
                        <div class="form-wrap">
                            <form action="{{ route('transaction.update',$transaction->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-info-outline mr-10"></i>Input Resi Pesanan {{ $transaction->code_transaction }}</h6>
                                <hr class="light-grey-hr"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="datatable" class="table table-hover dt-responsive nowrap">
                                            <tr>
                                                <th>Nama</th>
                                                <td>{{$transaction->user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><span class="badge badge-success">{{$transaction->transaction_status}}</span></td>
                                            </tr>
                                        </table>
                                            <div class="form-group">
                                                <label class="control-label mb-10">Input Resi</label>
                                                <input type="text" id="tracking_number" name="tracking_number" placeholder="resi"
                                                class="form-control @error('name') is invalid @enderror" value="{{old('tracking_number')}}">
                                                @error('tracking_number')
                                                    <span class="help-block"> {{$message}} </span>
                                                @enderror
                                            </div>
                                    </div>
                                </div>
                                <!-- Row -->
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-success btn-icon left-icon mr-10 pull-left"> <i class="fa fa-check"></i> <span>Save</span></button>
                                    <button class="btn btn-danger btn-icon left-icon mr-10 pull-left"> <i class="fa fa-close"></i> <span>Cancel</span></button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                