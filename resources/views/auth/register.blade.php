@extends('frontend.layout.login')
@section('main')
<!-- Main -->
<main class="bg_gray">

    <div class="container margin_30">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    <h3 class="new_client">Daftar Member</h3> <small class="float-right pt-2">* Harus diisi</small>
                    <div class="form_container">
                        <form action="{{ route('register')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama*">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email*">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <hr>
                        <div class="private box">
                            <div class="row no-gutters">
                                <div class="col-6 pr-1">
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password*">
            
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                </div>
                                <div class="col-6 pl-1">
                                    <div class="form-group">            
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password*">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" placeholder="No Handphone*">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <hr>
                        <div class="form-group">
                            <input id="address" type="text" class="form-control @error('full_address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Alamat Lenkgap*">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-6 pr-1">
                                <div class="form-group ">
                                    <select name="province_id" id="province_id" class="form-control">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $row)
                                            <option value="{{ $row['province_id'] }}" name="{{ $row['province'] }}">
                                                {{ $row['province'] }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6 pl-1">
                                <select name="city_id" id="kota_id" class="form-control">
                                    <option value="">Pilih Kabupaten/Kota</option>
                                </select>
                                @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 pr-1">
                                <select name="subdistrict_id" id="kecamatan_id" class="form-control">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                                @error('subdistrict_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="col-6 pl-1">
                                <div class="form-group">
                                    <input id="kodepos" type="text" class="form-control @error('kodepos') is-invalid @enderror" name="postcode" required autocomplete="kodepos" placeholder="Kodepos*">

                                    @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <!-- /private -->
                        <hr>
                        <div class="text-center"><input type="submit" value="Daftar" class="btn_1 full-width"></div>
                        <div class="divider"><span>Atau</span></div>
                            <div class="col-12 form-group pl-1">
                                <a href="{{route('login')}}" class="btn_1 outline full-width">Masuk</a>
                            </div>
                        </form>
                        
                        
                    </div>
                    <!-- /form_container -->
                </div>
                <!-- /box_account -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /Main -->
@endsection
@push('after-scripts')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('select[name="province_id"]').on('change', function() {
            let provinceid = $(this).val();
            if (provinceid) {
                jQuery.ajax({
                    url: "/city/" + provinceid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        $('select[name="city_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city_id"]').append(
                                '<option value="' + value.city_id +
                                '" namakota="' + value.type + ' ' + value
                                .city_name + '">' + value.type + ' ' + value
                                .city_name + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="city_id"]').empty();
            }
        });

        $('select[name="city_id"]').on('change', function() {
            let kecamatanid = $(this).val();
            if (kecamatanid) {
                jQuery.ajax({
                    url: "/subdistrict/" + kecamatanid,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);

                        $('select[name="subdistrict_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subdistrict_id"]').append(
                                '<option value="' + value.subdistrict_id +
                                '" namakota="' + value.city + ' ' + value
                                .subdistrict_name + '">' + value.city +
                                ' ' + value.subdistrict_name + '</option>');
                        })
                    }
                })
            } else {
                $('select[name="subdistrict_id"]').empty();
            }
        });

        // ongkir

        $('select[name="kurir"]').on('change', function() {
            let origin = $("input[name=city_origin]").val();
            let destination = $("input[name=kecamatan_id]").val();
            let courier = $("input[name=kurir]").val();
            let weight = $("input[name=weight]").val();
            if (courier) {
                jQuery.ajax({
                    url: "/origin=" + origin + "&originType=" + 'subdistrict' +
                        "&destination=" + destination + "&destinationType=" +
                        'subdistricts' + "&weight=" + weight + "&courier=" + courier,
                    // url:"/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        // $('select[name="layanan"]').empty();
                        // $.each(data,function(key,value) {
                        //     $.each(value.costs, function (key1,value1) {
                        //         $.each(value1.cost, function(key2, value2){
                        //             $('select[name="layanan"]').append('<option value="'+ key +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
                        //         });
                        //     })
                        // })
                    }.fail(function(err) {
                        // console.log(err);
                    })
                })
            }
        })

    })

</script>
@endpush