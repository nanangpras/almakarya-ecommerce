<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Jitus.id | Signup Member</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Signup Member</h2>
            </div>
        </div>
        <form action="{{ route('register')}}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xl-8 col-lg-8 col-md-8">
                            <div class="row">
                                <div class="col-6 pr-1">
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name*">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-6 pl-1">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email*">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
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
                            <div class="form-group">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" placeholder="Phone*">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <hr>
                            <div class="form-group">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('full_address') }}" required autocomplete="full_address" autofocus placeholder="Alamat Lenkgap*">
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
                            <button type="submit" class="btn btn-primary">Signup</button>
                        </div>
                    </div>
                  </div>
            </div>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

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
                            console.log(data);

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
                            console.log(data);

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
                            console.log(err);
                        })
                    })
                }
            })

        })

    </script>


</body>

</html>
