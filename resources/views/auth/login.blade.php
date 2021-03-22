@extends('frontend.layout.login')
@section('main')
<!-- Main -->
<main class="bg_gray">

    <div class="container margin_30">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-8">
                <div>
                    
                </div>
                <div class="box_account">
                    
                    <h3 class="client" style="align-content: center">Masuk</h3>

                    <div class="form_container">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password_in" placeholder="Password*">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="clearfix add_bottom_15">
                                <div class="checkboxes float-left">
                                    <label class="container_check">Remember me
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                                </div>
                                <div class="float-right"><a id="forgot" href="javascript:void(0);">Lupa Password?</a></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn_1 full-width">Masuk</button>
                            </div>
                            <div class="divider"><span>Atau</span></div>
                            <div class="col-12 form-group pl-1">
                                <a href="{{route('signup')}}" class="btn_1 outline full-width">Daftar</a>
                            </div>

                            {{-- <div class="row no-gutters">
                                <div class="col-6 form-group pr-1">
                                    <a href="#0" class="social_bt google">Login with Google</a>
                                </div>
                                <div class="col-6 form-group pl-1">
                                    <a href="{{route('signup')}}" class="btn_1 outline full-width">Daftar</a>
                                </div>
                            </div> --}}

                            <div id="forgot_pw">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email_forgot" id="email_forgot" placeholder="Type your email">
                                </div>
                                <p>Password terlalu pendek</p>
                                <div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
                            </div>
                        </form>
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