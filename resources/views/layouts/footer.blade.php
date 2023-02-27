<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area footer-style6">
    <div class="footer-main">
        <div class="container">
            <div class="row row-gutter-0">
                <div class="col-md-4 col-lg-2">
                    <div class="widget-item widget-column1">
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <!-- <li><a href="{{ route('eshop_path') }}">E-Shop</a></li>
                                <hr> -->
                                <li><a href="{{ route('story_path') }}">Our Story</a></li>
                                <hr>
                                <li><a href="{{ route('all_products_path') }}">Our Products</a></li>
                                <hr>
                                <li><a href="{{ route('news_path') }}">Latest News</a></li>
                                <hr>
                                <li><a href="{{ route('csr_path') }}">Opportunities</a></li>
                                <hr>
                                <li><a href="{{ route('work_path') }}">Work with us</a></li>
                                <hr>
                                <li><a href="{{ route('contact_path') }}">Contact us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget-item widget-column2">
                        <h4 class="connecthere">{{ app('footer')->components->connect_title->value }}</h4>
                        <hr>
                        <ul class="widget-contact-info">
                            <li><a
                                    href="mailto:{{ app('settings')->store_address->customer_email }}">{{ app('settings')->store_address->customer_email }}</a>
                            </li>
                            <li class="mt-10">
                                <p class="d-inline mr-20">{{ app('footer')->components->social_media_name->value }}</p>
                                <div class="widget-social-icons d-inline">
                                    <a href="{{ app('settings')->store_address->insta_link }}" target="_blank"><i
                                            class="lastudioicon lastudioicon-b-instagram"></i></a>
                                    <a href="{{ app('settings')->store_address->fb_link }}" target="_blank"><i
                                            class="lastudioicon lastudioicon-b-facebook"></i></a>
                                    <a href="{{ app('settings')->store_address->linkedin_link }}" target="_blank"><i
                                            class="lastudioicon lastudioicon-b-linkedin"></i></a>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <br>
                        <h4 class="subscribe-title">{{ app('footer')->components->subscribe_title->value }}</h4>
                        <p class="subscribe-p">{{ app('footer')->components->subscribe_text->value }}</p>
                        <div class="newsletter-content-wrap">
                            <form class="newsletter-form" action="#">
                                <input class="form-control rounded-pill" type="text" id="email"
                                    placeholder="Enter your email">
                                <button class="btn btn-theme btn-rounded text-uppercase"
                                    type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-md-4 col-lg-3 footer-office">
                    <div class="widget-item widget-column3">
                        @foreach (app('footer')->components->locations->value as $location)
                            <h5 class="title-add">{{ $location->components->title->value }}</h5>
                            <div class="footer-address"> {!! $location->components->address->value !!}</div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-3 col-lg-3">
                    <div class="footer-logo-area">
                        <a href="/">
                            <img class="logo-main" src="{{ app('settings')->logo_lg }}"
                                alt="{{ app('settings')->store_address->legal_name }}" />
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="widget-item">
                        <div class="widget-menu-wrap">
                            <ul class="nav-menu nav">
                                <li><a href="{{ route('terms_path') }}">Terms & Conditions</a> &nbsp; | &nbsp;</li>
                                <li><a href="{{ route('privacy_path') }}">Privacy Policy</a> &nbsp; | &nbsp;</li>
                                <li>Copyright © LePré </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="widget-item">
                        @foreach (app('footer')->components->certificates->value as $certificate)
                            <img src="{{ $certificate->components->logo->sm_img }}"
                                alt="{{ $certificate->components->title->value }}" height="90" class="pr-20" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--== End Footer Area Wrapper ==-->
