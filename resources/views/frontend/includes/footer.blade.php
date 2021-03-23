<footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_1">Menu</h3>
                        <div class="collapse dont-collapse-sm links" id="collapse_1">
                            <ul>
                                <li><a href="about.html">About</a></li>
                                <li><a href="help.html">FAQ</a></li>
                                <li><a href="help.html">Cara Belanja</a></li>
                                <li><a href="account.html">My account</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_2">Kategori</h3>
                        <div class="collapse dont-collapse-sm links" id="collapse_2">
                            <ul>
                                @foreach ($categories as $item)
                                    
                                <li><a href="{{ route('category-produk',$item->slug)}}">{{ $item->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_3">Kontak</h3>
                        <div class="collapse dont-collapse-sm contacts" id="collapse_3">
                            <ul>
                                @foreach ($app as $apps)
                                    <li><i class="ti-home"></i>{{ $apps->alamat }}<br>Indonesia</li>
                                    <li><i class="ti-headphone-alt"></i>{{ $apps->no_telp}}</li>
                                    <li><i class="ti-email"></i><a href="#0">{{ $apps->email}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h3 data-target="#collapse_4">Keep in touch</h3>
                        <div class="collapse dont-collapse-sm" id="collapse_4">
                            <div id="newsletter">
                                <div class="form-group">
                                    <input type="email" name="email_newsletter" id="email_newsletter" class="form-control" placeholder="Your email">
                                    <button type="submit" id="submit-newsletter"><i class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                            <div class="follow_us">
                                <h5>Follow Us</h5>
                                <ul>
                                    @foreach ($app as $apps)
                                        <li>
                                            <a href="{{ $apps->link_twitter}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{ url('frontend/img/twitter_icon.svg')}}" alt="" class="lazy"></a>
                                        </li>
                                        <li>
                                            <a href="{{ $apps->link_fb}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{ url('frontend/img/facebook_icon.svg')}}" alt="" class="lazy"></a>
                                        </li>
                                        <li>
                                            <a href="{{ $apps->link_ig}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{ url('frontend/img/instagram_icon.svg')}}" alt="" class="lazy"></a>
                                        </li>
                                        <li>
                                            <a href="{{ $apps->link_yt}}"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="{{ url('frontend/img/youtube_icon.svg')}}" alt="" class="lazy"></a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <hr>
                <!-- <div class="row add_bottom_25">
                    <div class="col-lg-6">
                        <ul class="footer-selector clearfix">
                            <li>
                                <div class="styled-select lang-selector">
                                    <select>
									<option value="English" selected>English</option>
									<option value="French">French</option>
									<option value="Spanish">Spanish</option>
									<option value="Russian">Russian</option>
								</select>
                                </div>
                            </li>
                            <li>
                                <div class="styled-select currency-selector">
                                    <select>
									<option value="US Dollars" selected>US Dollars</option>
									<option value="Euro">Euro</option>
								</select>
                                </div>
                            </li>
                            <li><img src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" data-src="img/cards_all.svg" alt="" width="198" height="30" class="lazy"></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul class="additional_links">
                            <li><a href="#0">Terms and conditions</a></li>
                            <li><a href="#0">Privacy</a></li>
                            <li><span>© 2021 almakarya.com</span></li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </footer>
        <!--/footer-->