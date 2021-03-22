@extends('frontend.layout.home')
@section('main')
<!-- Main -->
<main class="bg_gray">
    <div class="container margin_30">
        <div class="page_header">
            <h1> Keranjang Saya</h1>
        </div>
        <!-- /page_header -->
        <form action="{{ route('update-cart')}}" method="POST">
            @csrf
            <table class="table table-striped cart-list">
                <thead>
                    <tr>
                        <th>
                            Produk
                        </th>
                        <th>
                            Harga
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Subtotal
                        </th>
                        <th>
    
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart as $item)    
                        <tr>
                            <td>
                                <div class="thumb_cart">
                                    <img src="{{ $item['imagebook']}}" data-src="{{ Storage::url($item['imagebook'])}}" class="lazy" alt="Image">
                                </div>
                                <span class="item_cart">{{ $item['title']}}</span>
                            </td>
                            <td>
                                <strong>@currency($item['price'])</strong>
                            </td>
                            <td>
                                <div class="numbers-row">
                                    <input type="text" id="qty{{ $item['book_id'] }}" value="{{ $item['qty'] }}" id="qty" class="qty2" name="qty[]">
                                    <div class="inc button_inc">+</div>
                                    <div class="dec button_inc">-</div>
                                </div>
                                <input type="hidden" name="book_id[]" value="{{ $item['book_id'] }}" class="form-control">
                            </td>
                            <td>
                                <strong>@currency( $item['price'] * $item['qty'])</strong>
                            </td>
                            <td class="options">
                                <a href="{{ route('delete-cart',$item['book_id'])}}"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"> Tidak ada keranjang belanja</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    
            <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                <div class="col-sm-4 text-right">
                    <button class="btn_1 gray">Update Keranjang</button>
                </div>
                {{-- <div class="col-sm-8">
                    <div class="apply-coupon">
                        <div class="form-group form-inline">
                            <input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control"><button type="button" class="btn_1 outline">Apply Coupon</button>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- /cart_actions -->
        </form>

    </div>
    <!-- /container -->

    <div class="box_cart">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <ul>
                        <li>
                            <span>Subtotal</span> @currency($subtotal)
                        </li>
                        <li>
                            <span>Total</span> @currency($subtotal)
                        </li>
                    </ul>
                    <a href="{{ route('checkout')}}" class="btn_1 full-width cart">Lanjut Pembayaran</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /box_cart -->

</main>
<!--/main-->
<!-- /Main -->
@endsection