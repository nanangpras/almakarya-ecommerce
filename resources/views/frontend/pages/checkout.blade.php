@extends('frontend.layout.checkout')
@section('main')
    <!-- Main -->

    <main class="bg_gray">


        <div class="container margin_30">
            <div class="page_header">
                <h1>Ringkasan Pemesanan</h1>

            </div>
            <!-- /page_header -->
            <form action="{{ route('checkout-process')}}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="step first">
                            <h3>1. Pengiriman</h3>
    
                            <div class="tab-content checkout">
                                <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                                    {{-- @if (Auth::user())
    
                                    @else
    
                                    @endif --}}
                                    <div class="form-group">
                                        <h6>Nama : {{Auth::user()->name}}</h6>
                                    </div>
                                    <div class="form-group">
                                        <h6>Email : {{Auth::user()->email}}</h6>
                                    </div>
                                    <div class="form-group">
                                        <h6>Telp : {{Auth::user()->phone}}</h6>
                                    </div>
                                    <div class="form-group">
                                        <h6>Alamat : {{Auth::user()->address}}</h6>
                                    </div>
                                    <div class="form-group">
                                        <h6>Provinsi : {{Auth::user()->province_id}}</h6>
                                        <input type="hidden" name="province_id" value="{{Auth::user()->province_id}}">
                                    </div>
                                    <div class="form-group">
                                        <h6>Kabupaten : {{Auth::user()->city_id}}</h6>
                                        <input type="hidden" name="city_id" value="{{Auth::user()->city_id}}">
                                    </div>
                                    <div class="form-group">
                                        <h6>Kecamatan : {{Auth::user()->subdistrict_id}}</h6>
                                        <input type="hidden" name="subdistrict_id" value="{{Auth::user()->subdistrict_id}}">
                                    </div>
                                    <hr>
                                    <input type="hidden" value="5" class="form-control" name="province_origin" id="province_origin">
                                    <input type="hidden" value="5782" class="form-control" id="origin" name="origin">
                                    <input type="hidden" value="{{$weight_total}}" class="form-control" id="weight" name="weight">
                                </div>
                                <!-- /tab_1 -->
                            </div>
                        </div>
                        <!-- /step -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="step middle payments">
                            <h3>2. Kurir</h3>
                            <h6 class="pb-2">Jasa Kurir</h6>
                            <div class="custom-select-form">
                                <select name="courier" id="courier" class="wide add_bottom_10">
                                    <option value="">Pilih Kurir</option>
                                    <option value="jne">JNE</option>
                                    <option value="jnt">JNT</option>
                                </select>
                            </div>
                            @error('courier')
                                <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <div class="step middle payments2">
                            <label>Pilih Layanan<span>*</span>
                            </label>
                            <select name="layanan" id="layanan" class="form-control">
                            <option value="">...tunggu sebentar...</option>
                            </select>
                        </div>
                        <div class="step middle payments2">
                            <label>Biaya Ongkos Kirim<span>*</span>
                            </label>
                            <input type="text" id="ongkir" name="ongkir" class="form-control" readonly>
                            </select>
                            @error('cost')
                                <span class="help-block"> {{$message}} </span>
                            @enderror
                        </div>
                        <!-- /step -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="step last">
                            <h3>3. Total Pembelanjaan</h3>
                            <div class="box_general summary">
                                @forelse ($cart as $item)
                                    <ul>
                                        <li class="clearfix"><em>{{ $item['qty']}}x {{ $item['title'] }}</em> <span>@currency($item['qty'] * $item['price'])</span></li>
                                    </ul>
                                @empty
                                    <span>belum ada barang</span>
                                @endforelse
                                <ul>
                                    <li class="clearfix"><em>Total Berat</em><span>{{$weight_total}} gr</span></li>
                                </ul>
                                <div class="total clearfix">TOTAL <span id="total">@currency($subtotal)</span></div>
                                <button class="btn_1 full-width">Pembayaran</button>
                            </div>
                            <!-- /box_general -->
                        </div>
                        <!-- /step -->
                    </div>
                </div>
                <!-- /row -->
            </form>
        </div>
        <!-- /container -->
    </main>
    <!--/main-->
    <!-- /Main -->
@endsection
@push('after-scripts')
<script>
    $(document).ready(function () {
        $('select[name="courier"]').on('change',function () {
            let origin = $("input[name=origin]").val();
            let destination = $("input[name=subdistrict_id]").val();
            let courier = $("select[name=courier]").val();
            let weight = $("input[name=weight]").val();
            if (courier) {
                jQuery.ajax({
                    url:"/origin="+origin+"&originType=subdistrict&destination="+destination+"&destinationType=subdistrict&weight="+weight+"&courier="+courier,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        console.log(data);

                        $('select[name="layanan"]').empty();
                        $('select[name="layanan"]').append('<option value="">Pilih Layanan</option>')
                        $.each(data, function(key, value){
                            $.each(value.costs, function(key1, value1){
                                $.each(value1.cost, function(key2, value2){
                                    $('select[name="layanan"]').append(
                                        '<option value="'+ key +'" layananku="'+value2.value+'">' +
                                            value1.description+
                                            '-' +value2.value
                                            + '</option>');
                                });
                            })
                        })
                    }
                })
            }else{
                $('select[name="layanan"]').empty();
                $('select[name="layanan"]').append('<option value="">Loading...</option>')
            }
        });

        $('select[name="layanan"]').on('change',function () {
            let layananku = $("#layanan option:selected").attr("layananku");
            $("#ongkir").val(layananku);
            // $('#ongkir').text('Rp' + layananku);

            let subtotal = "{{ $subtotal }}"
            let total = parseInt(subtotal) + parseInt(layananku)
            $('#total').text('Rp ' + total)
        });

})
</script>
@endpush
