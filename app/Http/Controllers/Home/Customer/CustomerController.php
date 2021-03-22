<?php

namespace App\Http\Controllers\Home\Customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        // $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $transaction = Transaction::selectRaw('COALESCE(sum(CASE WHEN transaction_status = "In_Cart" THEN transaction_total END), 0) as pending, 
        COALESCE(count(CASE WHEN transaction_status = "Pending"  THEN transaction_total END), 0) as shipping,
        COALESCE(count(CASE WHEN transaction_status = "Success" THEN transaction_total END), 0) as completeOrder')
        ->where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.member.utama',compact('transaction'));
    }

    public function memberProfile()
    {
        return view('frontend.pages.member.profil');
    }
    public function memberUtama()
    
    {
        $transaction = Transaction::selectRaw('COALESCE(sum(CASE WHEN transaction_status = "In_Cart" THEN transaction_total END), 0) as pending, 
        COALESCE(count(CASE WHEN transaction_status = "Pending"  THEN transaction_total END), 0) as shipping,
        COALESCE(count(CASE WHEN transaction_status = "Success" THEN transaction_total END), 0) as completeOrder')
        ->where('user_id', Auth::user()->id)->get();

        $order = Transaction::with(['details','user'])
                ->where('user_id', Auth::user()->id)
                ->orderBy('code_transaction','DESC')
                ->paginate(5);
                // ->get();
        return view('frontend.pages.member.utama', [
            'order' => $order,
            'transaction' => $transaction,
        ]);
    }
    
    public function memberPesanan()
    {
        $order = Transaction::with(['details','user'])
                ->where('user_id', Auth::user()->id)
                ->orderBy('code_transaction','DESC')
                // ->paginate(5);
                ->get();
        return view('frontend.pages.member.pesanan', [
            'order' => $order
        ]);
    }

    public function memberDetailPesanan(Request $request, $id)
    {
        // $order = Transaction::with(['details.transaction','user'])
        $order = Transaction::with(['details.transaction','user'])->findOrFail($id);
                // ->where('user_id', Auth::user()->id)
                // ->findOrFail($id);
        return view('frontend.pages.member.detail_pesanan', [
            'order' => $order
        ]);
    }

    public function memberPesananBarusaja()
    {
        $order = Transaction::with(['details','user'])
                ->where('user_id', Auth::user()->id)
                ->orderBy('code_transaction','DESC')
                ->first();
                // ->paginate(5);
                // ->get();
        return view('frontend.pages.member.pesanan_barusaja', [
            'order' => $order
        ]);
    }
    public function memberPesananResi()
    {
        $order = Transaction::with(['details','user'])
                ->where([
                    ['user_id', '=', Auth::user()->id],
                    ['transaction_status', '=', 'Success'],
                ])
                ->orderBy('code_transaction','DESC')
                ->get();
        return view('frontend.pages.member.pesanan_resi', [
            'order' => $order
        ]);
    }
}
