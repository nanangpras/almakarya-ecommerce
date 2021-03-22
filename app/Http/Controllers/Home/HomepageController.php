<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use App\Models\Portofolio;
use App\Models\SettingApp;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    private function getCarts()
    {
        $cart = json_decode(request()->cookie('jitus-carts'), true);
        // $cart = $this->getCarts();
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function getProvince()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: f0cb4f4cfd91f647ebb1e867313e404d"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
        //   echo $response;
            //ini kita decode data nya terlebih dahulu
            $response=json_decode($response,true);
            //ini untuk mengambil data provinsi yang ada di dalam rajaongkir resul
            $data_pengirim = $response['rajaongkir']['results'];
            return $data_pengirim;
        }
    }

    public function getCity($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/city?/&province=$id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: f0cb4f4cfd91f647ebb1e867313e404d"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response;
            $response=json_decode($response,true);
            $data_kota = $response['rajaongkir']['results'];
            return json_encode($data_kota);
        }
    }

    public function getSubdistrict($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?/&city=$id",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key: f0cb4f4cfd91f647ebb1e867313e404d"
          ),
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          // echo $response;
            $response=json_decode($response,true);
            $data_kecamatan = $response['rajaongkir']['results'];
            return json_encode($data_kecamatan);
        }
    }

    public function index()
    {
        $items = Book::with(['imagebook'])
            ->where('recommendation',1)
            // ->get();
            ->paginate(4);
            // ->get();

        $terbaru = Book::with(['imagebook'])
            ->orderBy('created_at', 'DESC')
            ->paginate(6);
            // ->get();

        $categories = Category::orderBy('name', 'ASC')
            // ->get();
            ->paginate(5);

        $banner = Banner::where([
          ['for', '=', 'utama'],
          ['status', '=', 1],
        ])
        ->get();

        $app = SettingApp::all();

        $portofolio = Portofolio::all();

        $bannerpromosi = Banner::where([
          ['for', '=', 'promosi'],
          ['status', '=', 1],
      ])
              ->paginate(1);
        // $categoriesfooter = Category::orderBy('name', 'ASC')
        //     ->limit(5)
        //     ->get();
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });

        return view('frontend.pages.main',[
            'items' => $items,
            'terbaru' => $terbaru,
            'categories' => $categories,
            'cart' => $cart,
            'subtotal' => $subtotal,
            'banner' => $banner,
            'app' => $app,
            'portofolio' => $portofolio,
            'bannerpromosi' => $bannerpromosi,
            // 'categoriesfooter' => $categoriesfooter,
        ]);
    }
    public function signup()
    {
        $provinsi = $this->getProvince();
        return view('auth.register',[
          'provinsi' => $provinsi
        ]);
    }

    public function rajaongkir()
    {
      $provinsi = $this->getProvince();
      return view('rajaongkir',[
        'provinsi' => $provinsi
      ]);
    
    }
    public function bannerDetail(Request $request, $slug)
    {
      $categories = Category::orderBy('name', 'ASC')
            ->get();
      $cart = $this->getCarts();
      $subtotal = collect($cart)->sum(function($q){
        return $q['qty'] * $q['price'];
      });
      $banner = Banner::where('slug',$slug)
                ->firstOrFail();
      return view('frontend.pages.banner_detail',[
          'banner' => $banner,
          'cart' => $cart,
          'categories' => $categories,
          'subtotal' => $subtotal,
      ]);
    }

    public function login()
    {
        return view('frontend.pages.login');
    }
}
