<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $transaction = Transaction::with(['user'])
                ->orderBy('code_transaction','DESC')
                ->paginate(5);
        $produk = Book::count();
        $sukses = Transaction::where('transaction_status','Success')
                    ->count();
        $income = Transaction::where('transaction_status','Success')
                    ->sum('transaction_total');
        $pendingtransaksi = Transaction::where('transaction_status','Pending')
                    ->sum('transaction_total');
        $pending = Transaction::where('transaction_status','Pending')
                    ->count();
        $incart = Transaction::where('transaction_status','In_Cart')
                    ->count();
        $incarttransaksi = Transaction::where('transaction_status','In_Cart')
                    ->sum('transaction_total');
        return view('backend.pages.dashboard',[
            'transaction' => $transaction,
            'income' => $income,
            'produk' => $produk,
            'pending' => $pending,
            'pendingtransaksi' => $pendingtransaksi,
            'sukses' => $sukses,
            'incart' => $incart,
            'incarttransaksi' => $incarttransaksi,
        ]);
    }
}
