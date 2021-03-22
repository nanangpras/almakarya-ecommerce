<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<title>checkout</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2>Halaman Checkout</h2>
</div>
</div>
<form class="ps-checkout__form" action="" method="post">
@csrf
<div class="row">
<div class="col-md-8">
<h3 class="mt-5 mb-5">Alamat Pengiriman</h3>
<div class="form-group ">
<label>Provinsi asal</label>
<input type="text" value="5" class="form-control" name="province_origin">
</div>
<div class="form-group ">
<label>Kota Asal</label>
<input type="text" value="5782" class="form-control" id="city_origin" name="city_origin">
</div>
<div class="form-group ">
<label>Alamat<span>*</span>
</label>
<textarea name="address" class="form-control" rows="5" placeholder="Alamat Lengkap pengiriman" ></textarea>
</div>
<div class="form-group ">
<label>Provinsi Tujuan<span>*</span>
</label>
<select name="provinsi_id" id="provinsi_id" class="form-control">
    <option value="">Pilih Provinsi</option>
    @foreach ($provinsi  as $row)
    <option value="{{$row['province_id']}}" name="{{$row['province']}}">{{$row['province']}}</option>
    @endforeach
</select>
</div>
<div class="form-group">
<input type="text" class="form-control" nama="nama_provinsi" placeholder="ini untuk menangkap nama provinsi ">
</div>
<div class="form-group ">
<label>Kota Tujuan<span>*</span>
</label>
<select name="kota_id" id="kota_id" class="form-control">
    <option value="">Pilih Kota</option>
</select>
</div>
<div class="form-group">
<input type="text" class="form-control" nama="nama_kota" placeholder="ini untuk menangkap nama kota">
</div>
    <div class="form-group ">
        <label>Kecamatan Tujuan<span>*</span></label>
        <select name="kecamatan_id" id="kecamatan_id" class="form-control">
            <option value="">Pilih Kota</option>
        </select>
    </div>
    <div class="form-group">
        <input type="text" class="form-control" nama="nama_kecamatan" placeholder="ini untuk menangkap nama kecamatan">
    </div>
    <div class="form-group">
        <label>Ekspedisi</label>
        <select name="kurir" id="kurir" class="form-control">
            <option value="">pilih kurir</option>
            <option value="jne">JNE</option>
        </select>
    </div>
    <div class="form-group">
        <label>pilih layanan</label>
        <select name="layanan" id="layanan" class="form-control">
            <option value="">pilih layanan</option>
        </select>
    </div>
<div class="form-group ">
<label>Kode Pos<span>*</span>
</label>
<input type="text" name="kode_pos" class="form-control" >
</div>
</div>
<div class="col-md-4">
<div class="form-group ">
<label>Total Belanja<span>*</span>
</label>
<input type="text" name="totalbelanja" class="form-control" >
</div>
<div class="form-group ">
<label>total berat (gram) </label>
<input class="form-control" type="text" value="200" id="weight" name="weight">
</div>
<div class="form-group ">
<label>total ongkos kirim </label>
<input class="form-control" type="text" id="ongkos_kirim" name="ongkos_kirim">
</div>
<div class="form-group ">
<label>total keseluruhan </label>
<input class="form-control" type="text" id="ongkos_kirim" name="ongkos_kirim">
</div>
<div class="form-group">
<button class="btn btn-primary" type="submit">Proses Order</button>
</div>
</div>
</div>
</form>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('select[name="provinsi_id"]').on('change',function () {
            let provinceid = $(this).val();
            if (provinceid) {
                jQuery.ajax({
                    url:"/city/"+provinceid,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        console.log(data);

                        $('select[name="kota_id"]').empty();
                        $.each(data,function (key,value) {
                            $('select[name="kota_id"]').append('<option value="'+ value.city_id +'" namakota="'+ value.type +' ' +value.city_name+ '">' + value.type + ' ' + value.city_name + '</option>');
                        })
                    }
                })
            }else{
                $('select[name="kota_id"]').empty();
            }
        });

        $('select[name="kota_id"]').on('change',function () {
            let kecamatanid = $(this).val();
            if (kecamatanid) {
                jQuery.ajax({
                    url:"/subdistrict/"+kecamatanid,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        console.log(data);

                        $('select[name="kecamatan_id"]').empty();
                        $.each(data,function (key,value) {
                            $('select[name="kecamatan_id"]').append('<option value="'+ value.subdistrict_id +'" namakota="'+ value.city +' ' +value.subdistrict_name+ '">' + value.city + ' ' + value.subdistrict_name + '</option>');
                        })
                    }
                })
            }else{
                $('select[name="kecamatan_id"]').empty();
            }
        });

        // ongkir

        $('select[name="kurir"]').on('change',function(){
            let origin = $("input[name=city_origin]").val();
            let destination = $("input[name=kecamatan_id]").val();
            let courier = $("input[name=kurir]").val();
            let weight = $("input[name=weight]").val();
            if (courier) {
                jQuery.ajax({
                    url:"/origin="+origin+"&originType="+'subdistrict'+"&destination="+destination+"&destinationType="+'subdistricts'+"&weight="+weight+"&courier="+courier,
                    // url:"/origin="+origin+"&destination="+destination+"&weight="+weight+"&courier="+courier,
                    type:'GET',
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        // $('select[name="layanan"]').empty();
                        // $.each(data,function(key,value) {
                        //     $.each(value.costs, function (key1,value1) {
                        //         $.each(value1.cost, function(key2, value2){
                        //             $('select[name="layanan"]').append('<option value="'+ key +'">' + value1.service + '-' + value1.description + '-' +value2.value+ '</option>');
                        //         });
                        //     })
                        // })
                    }.fail(function (err) {
                        console.log(err);
                    })
                })
            }
        })

    })
</script>


</body>
</html>
