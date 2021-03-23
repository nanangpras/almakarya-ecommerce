<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookImage;
use App\Models\Category;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    private function getCarts()
    {

        // $cookie_data = stripslashes(Cookie::get('shopping_cart'));
        // $cart = json_decode($cookie_data, true);
        $cart = json_decode(request()->cookie('jitus-carts'), true);
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function addToCart(Request $request)
    {
        $this->validate($request,[
            'book_id' => 'required|exists:books,id',
            'qty'   => 'required|integer',
            'weight'   => 'required|integer'
        ]);

        $cart = $this->getCarts();
        // $cart = json_decode($request->cookie('jitus-carts'),true);

        if ($cart && array_key_exists($request->book_id, $cart)) {
            $cart[$request->book_id]['qty'] += $request->qty;
        }else{
            $book = Book::with(['imagebook'])
                        ->findOrFail($request->book_id);
            // $imagebook = BookImage::findOrFail($request->book_id);
            $cart [$request->book_id] = [
                'qty' => $request->qty,
                'book_id' => $book->id,
                'title' => $book->title,
                'price' => $book->price,
                'weight' => $book->weight,
                'imagebook' => $book->id
            ];
        }

        $cookie = cookie('jitus-carts',json_encode($cart),2880);

        return redirect()->back()->with(['success' => 'Produk ditambahkan ke keranjang'])->cookie($cookie);

    }

    public function listCart()
    {
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
            return $q['qty'] * $q['price'];
        });

        $app = SettingApp::all();
        // return $cart;

        $categories = Category::orderBy('name', 'ASC')
            ->get();

        return view('frontend.pages.cart',[
            'cart' => $cart,
            'subtotal' => $subtotal,
            'categories' => $categories,
            'app' => $app,
        ]);
    }

    public function updateCart(Request $request)
    {
        $cart = json_decode(request()->cookie('jitus-carts'), true);
        foreach ($request->book_id as $key => $item) {
            if ($request->qty[$key] == 0) {
                unset($cart[$item]);
            }else{
                $cart[$item]['qty']=$request->qty[$key];
            }
        }

        $cookie = cookie('jitus-carts',json_encode($cart),2880);
        return redirect()->back()->cookie($cookie);
    }

    public function deleteCart(Request $request, $id)
    {
        $cart = json_decode(request()->cookie('jitus-carts'), true);
        foreach ($cart as $key => $item) {
            if ($item['book_id'] == $id) {

                // unset($cart[$item]);
                unset($cart [$key]);
            }else{
                
            }
        }
        $cookie = cookie('jitus-carts',json_encode($cart),2880);
        // $cookie = $request->session()->push('jitus-carts', $cart);
        return redirect()->back()->cookie($cookie);
    }
}
