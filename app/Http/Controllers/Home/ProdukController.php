<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Category;
use App\Models\SettingApp;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProdukController extends Controller
{

    private function getCarts()
    {
        $cart = json_decode(request()->cookie('jitus-carts'), true);
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function produk(Request $request)
    {
        $products = Book::with(['imagebook'])
                    ->orderBy('title', 'DESC')
                    ->paginate(12);

        $categories = Category::orderBy('name', 'DESC')
                    ->paginate(5);
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
                return $q['qty'] * $q['price'];
        });

        $bannerProduk = Banner::where([
            ['for', '=', 'produk'],
            ['status', '=', 1],
          ])
          ->get();

        $app = SettingApp::all();

        $searching = $this->search($request);

        $filter = $this->filterProduk($request);

        return view('frontend.pages.produk',[
            'products' => $products,
            'categories' => $categories,
            'cart' => $cart,
            'subtotal' => $subtotal,
            'searching' => $searching,
            'app' => $app,
            'filter' => $filter,
            'bannerProduk' => $bannerProduk,
        ]);
    }

    public function produkDetail(Request $request, $slug)
    {
        $items = Book::with(['imagebook'])
                    ->where('slug',$slug)
                    ->firstOrFail();

        $categories = Category::orderBy('name', 'DESC')
                    ->paginate(5);
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
                return $q['qty'] * $q['price'];
        });
        $app = SettingApp::all();
        return view('frontend.pages.produk_detail',[
            'items' => $items,
            'categories' => $categories,
            'cart' => $cart,
            'subtotal' => $subtotal,
            'app' => $app,
        ]);
    }

    public function categoryProduk(Request $request, $slug)
    {
        // $items = Category::with(['book'])
        //             ->where('slug',$slug)
        //             ->orderBy('created_at','DESC')
        //             ->firstOrFail();

        $items = Category::where('slug', $slug)->first()->book()->orderBy('created_at', 'DESC')->paginate(12);

        $categories = Category::orderBy('name', 'DESC')
                    ->paginate(5);
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function($q){
                return $q['qty'] * $q['price'];
        });

        return view('frontend.pages.produk_category',[
            'items' => $items,
            'categories' => $categories,
            'cart' => $cart,
            'subtotal' => $subtotal,
        ]);
    }

    private function search(Request $request)
    {
        // $book = Book::with(['imagebook']);
        if ($keyword = $request->query('keyword')) {
            $keyword = str_replace('-',' ', Str::slug($keyword));
            // var_dump($cari);exit;
            $products = Book::with(['imagebook'])
                    // ->whereRaw('MATCH(title, slug, description) AGAINST (? IN NATURAL LANGUAGE MODE)', [$keyword])
                    ->where('title','like',"%".$keyword."%")
                    ->paginate(10);
            // $product = $book->whereRaw('MATCH(title, slug, description) AGAINST (? IN NATURAL LANGUAGE MODE)', [$keyword]);
            $this->data['keyword'] = $keyword;
        }
        // $categories = Category::orderBy('name', 'DESC')
        //             ->get();
        // $cart = $this->getCarts();
        // $subtotal = collect($cart)->sum(function($q){
        //         return $q['qty'] * $q['price'];
        // });
        // return view('frontend.pages.produk',[
        //     'products' => $products,
        //     'categories' => $categories,
        //     'cart' => $cart,
        //     'subtotal' => $subtotal,
        // ]);
    }

    private function filterProduk(Request $request)
    {
        if ($kategori = $request->get('kategori')) {
            # code...
            $result = Book::with(['imagebook'])
                        ->where('category_id',$kategori)
                        ->get();
        }
        
        // return $result;
    }

    private function filterProdukKategori(Request $request)
    {
        if ($kategoriID = $request->query('kategori')) {
			$attributeOption = Category::findOrFail($kategoriID);

			$products = Book::with(['imagebook'])

            (
				function ($query) use ($attributeOption) {
					$query->where('category_id', $attributeOption->category_id);
						
				}
			);
		}

		// return $products;
    }
}
