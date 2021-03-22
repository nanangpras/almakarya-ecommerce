<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\SettingApp;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

use Midtrans\Config;
use Midtrans\Snap;


class CheckoutController extends Controller
{

    private function getCarts()
    {
        $cart = json_decode(request()->cookie('jitus-carts'), true);
        // $cart = $this->getCarts();
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function index(Request $request)
    {
        // $items = Transaction::with(['detils','user'])->findOrFail($id);
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });
        $weight_total = collect($cart)->sum(function($q){
            return $q['qty'] * $q['weight'];
        });
        $app = SettingApp::all();
        return view('frontend.pages.checkout',[
            'cart' => $cart,
            'subtotal' => $subtotal,
            'weight_total' => $weight_total,
            'app' => $app,
        ]);
    }

    // memasukan ke tabel transaksi
    public function process(Request $request)
    {
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function ($q)
            {
                return $q['qty'] * $q['price'];
            });

        // $book = Book::findOrFail($id);
        $transaction = Transaction::create([
            // 'code_transaction' => 'INV'- Carbon::now(),
            'code_transaction' => 'INV' . '-' . time(),
            'user_id' => Auth::user()->id,
            'transaction_total' => $subtotal + $request->ongkir,
            'transaction_status' => 'In_Cart',
            'bank_name' => 'BNI',
            'va_number' => 12,
            'courier' => $request->courier,
            'cost' => $request->ongkir
        ]);
        foreach ($cart as $item) {
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'qty' => $item['qty'],
                'book_id' => $item['book_id'],
                'transaction_subtotal' => $subtotal,
            ]);
        }
        //
        $cart = [];
        $cookie = cookie('jitus-carts',json_encode($cart),2880);
        return redirect()->route('checkout-success', $transaction->code_transaction)->cookie($cookie);
    }

    public function success($code_transaction)
    {
        $transaction = Transaction::with(['user','details'])->where('code_transaction', $code_transaction)->first();
        // $transaction->save();
            // config midtrans
        Config::$serverKey    = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized  = config('midtrans.isSanitized');
        Config::$is3ds        = config('midtrans.is3ds');

        // array untuk dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id' => 'MDTRN-' . $transaction->id,
                'gross_amount' => (int) $transaction->transaction_total,
            ],
            'customer_details' => [
                'first_name' => $transaction->user->name,
                'email' => $transaction->user->email,
                'phone' => $transaction->user->phone,
            ],
            'enabled_payments' => ['gopay','bca_va','bni_va'],
            'expiry' => [
                'start_time' => date('Y-m-d H:i:s T'),
                'unit' => 'days',
                'duration' => 2,
            ],
            'vtweb' => []
        ];
        $paymentUrl = Snap::createTransaction($midtrans_params);
        if ($paymentUrl->token) {
			$transaction->payment_token = $paymentUrl->token;
			$transaction->payment_url = $paymentUrl->redirect_url;
			// $transaction->bank_name = $paymentUrl->va_number;
			$transaction->save();
		}
        // dd($paymentUrl);exit;

        

        // try {
        //     // amabil halaman midtrans
        //     $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;
        //     // redirect
        //     header('Location: ' . $paymentUrl);
        //     // dd($paymentUrl);exit;

        // } catch (Exception $e) {
        //     echo $e->getMessage();
        // }


        return view('frontend.pages.success',[
            'transaction' => $transaction
        ]);
    }

    public function getOngkir($origin, $destination, $weight, $courier)
    {
      $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://pro.rajaongkir.com/api/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        // CURLOPT_POSTFIELDS => "origin=5782&originType=subdistrict&destination=2095&destinationType=subdistrict&weight=200&courier=jne",
        CURLOPT_POSTFIELDS => "origin=$origin&originType=subdistrict&destination=$destination&destinationType=subdistrict&weight=$weight&courier=$courier",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
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
        $data_ongkir = $response['rajaongkir']['results'];
        return json_encode($data_ongkir);
      }
    }
}
