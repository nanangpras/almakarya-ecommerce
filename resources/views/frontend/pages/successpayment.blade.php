@extends('frontend.layout.login')
@section('main')
<!-- Main -->
<main class="bg_gray">

    <div class="container margin_30">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div class="box_account">
                    {{-- <h3 class="client">Terimakasih Pesanan Anda telah kami terima</h3> --}}
                    <div id="confirm">
						<div class="icon icon--order-success svg">
							<svg xmlns="http://www.w3.org/2000/svg" width="72" height="72">
								<g fill="none" stroke="#8EC343" stroke-width="2">
									<circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
									<path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
								</g>
							</svg>
						</div>
					    <h2>Order completed!</h2>
					    <p>You will receive a confirmation email soon!</p>
                        <div class="row no-gutters">
                            <div class="col-6 form-group pr-1">
                                    <a href="{{ route('beranda')}}" class="btn_1 full-width">Home</a>
                            </div>
                            <div class="col-6 form-group pl-1">
                                <a href="{{route('member-pesanan')}}" class="btn_1 outline full-width">Pesanan Saya</a>
                            </div>
                        </div>
					</div>
                    <!-- /form_container -->
                </div>
                <!-- /box_account -->
                
                <!-- /row -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!-- /Main -->
@endsection