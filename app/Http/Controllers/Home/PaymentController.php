<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Notification;

class PaymentController extends Controller
{
    public function notificationHandler(Request $request)
    {
            // config midtrans
        Config::$serverKey    = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized  = config('midtrans.isSanitized');
        Config::$is3ds        = config('midtrans.is3ds');

        $notification = new Notification();

        // pecah order id untuk diterima database
        $order = explode('-', $notification->order_id);

        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $order[1];

        $vaNumber = null;
		$vendorName = null;
		if (!empty($notification->va_numbers[0])) {
			$vaNumber = $notification->va_numbers[0]->va_number;
			$vendorName = $notification->va_numbers[0]->bank;
		}

        $transaction = Transaction::findOrFail($order_id);

        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->transaction_status = 'CHALLENGE';
                }else{
                    $transaction->transaction_status = 'SUCCESS';
                }
            }
        }
        else if ($status == 'settlement') {
            $transaction->transaction_status = 'Success';
            $transaction->va_number = $vaNumber;
            $transaction->bank_name = $vendorName;
        }
        else if ($status == 'pending') {
            $transaction->transaction_status = 'Pending';
            $transaction->va_number = $vaNumber;
            $transaction->bank_name = $vendorName;
        }
        else if ($status == 'deny') {
            $transaction->transaction_status = 'Failed';
            $transaction->va_number = $vaNumber;
            $transaction->bank_name = $vendorName;
        }
        else if ($status == 'expire') {
            $transaction->transaction_status = 'Expired';
            $transaction->va_number = $vaNumber;
            $transaction->bank_name = $vendorName;
        }
        else if ($status == 'cancel') {
            $transaction->transaction_status = 'Failed';
            $transaction->va_number = $vaNumber;
            $transaction->bank_name = $vendorName;
        }

        // simpan transaksi
        $transaction->save();

        if ($transaction) {
            if ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            }
            else if ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Not Settlement'
                    ]
                ]);
            }
            else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Notifcation Success'
                    ]
                ]);
            }

            
            
        }
        
    }

    public function finishRedirect()
    {
        return view('frontend.pages.successpayment');
    }

    public function unfinishRedirect()
    {
        return view('frontend.pages.unfinish');
    }

    public function errorRedirect()
    {
        return view('frontend.pages.failed');
    }
}
