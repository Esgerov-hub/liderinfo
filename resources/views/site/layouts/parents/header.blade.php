<div class="trending-bar d-md-block d-lg-block d-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="trending-title">Liderinfo.org</h3>
                <div id="trending-slide" class="owl-carousel owl-theme trending-slide">
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-small">
                                <a href="#">@lang('web.copyright')</a>
                            </h2>
                        </div><!-- Post content end -->
                    </div><!-- Item 1 end -->
                    {{--<div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-small">
                                <a href="#">Soaring through Southern Patagonia with the Premium Byrd drone</a>
                            </h2>
                        </div><!-- Post content end -->
                    </div><!-- Item 2 end -->
                    <div class="item">
                        <div class="post-content">
                            <h2 class="post-title title-small">
                                <a href="#">Super Tario Run isn’t groundbreaking, but it has Mintendo charm</a>
                            </h2>
                        </div><!-- Post content end -->
                    </div><!-- Item 3 end -->--}}
                </div><!-- Carousel end -->
            </div><!-- Col end -->
        </div><!--/ Row end -->
    </div><!--/ Container end -->
</div><!--/ Trending end -->

<div id="top-bar" class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="ts-date">
                    <?php
                    setlocale(LC_TIME, 'az'); // Set Turkish locale

                    $string = \Illuminate\Support\Carbon::now();
                    $time = new DateTime($string);
                    $date = strftime("%B %e, %Y", $time->getTimestamp());

                    ?>
                    <i class="fa fa-calendar-check-o"></i>{{$date}}
                </div>
{{--                <ul class="unstyled top-nav">--}}
{{--                    <li><a href="#">About</a></li>--}}
{{--                    <li><a href="#">Write for Us</a></li>--}}
{{--                    <li><a href="#">Advertise</a></li>--}}
{{--                    <li><a href="#">Contact</a></li>--}}
{{--                </ul>--}}
            </div><!--/ Top bar left end -->

            <div class="col-md-4 top-social text-lg-right text-md-center">
                <ul class="unstyled">
                    <li>
                        <p class="footer-info-phone"><i class="fa fa-phone"></i> @lang('social.phone')</p>
{{--                        <p class="footer-info-email"><i class="fa fa-envelope-o"></i> @lang('social.email')</p>--}}
                        <a title="Facebook" href="@lang('social.facebook')">
                            <span class="social-icon"><i class="fa fa-facebook"></i></span>
                        </a>
                        <a title="Telegram" href="@lang('social.telegram')">
                            <span class="social-icon"><i class="fa fa-telegram"></i></span>
                        </a>
                        <a title="Twitter" href="@lang('social.twitter')">
                            <span class="social-icon"><i class="fa fa-twitter"></i></span>
                        </a>
                        <a title="Instagram" href="@lang('social.instagram')">
                            <span class="social-icon"><i class="fa fa-instagram"></i></span>
                        </a>
                        <a title="Youtube" href="@lang('social.youtube')">
                            <span class="social-icon"><i class="fa fa-youtube"></i></span>
                        </a>

                    </li>
                </ul><!-- Ul end -->
            </div><!--/ Top social col end -->
        </div><!--/ Content row end -->
    </div><!--/ Container end -->
</div><!--/ Topbar end -->

<!-- Header start -->
<header id="header" class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <div class="logo">
                    <a href="{{ route('site.index') }}">
                        <img src="{{ asset('site/logo.jpeg') }}" style="max-width: 87px;!important;" alt="liderinfor.org">
                    </a>
                </div>
            </div><!-- logo col end -->

            <div class="col-md-9 col-sm-12 header-right">
                <div class="ad-banner float-right">
                    <a href="#">
                        <img src="{{ asset("site/images/banner-ads/ad-content-one.jpg") }}" class="img-fluid" alt="">
                    </a>
                </div>
            </div><!-- header right end -->
        </div><!-- Row end -->
    </div><!-- Logo and banner area end -->
</header><!--/ Header end -->

<div class="main-nav clearfix">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-lg col">
                <div class="site-nav-inner float-left">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- End of Navbar toggler -->

                    <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{ request()->is('/') ? 'active' : '' }}">
                                <a href="{{ route('site.index') }}" >
                                    @lang('web.home')
                                </a>
                            </li>

                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    <?php $slogan_cat = json_decode($category, true)['slogan']['az'];?>
                                    <li class="{{ request()->is('category-news/'.$slogan_cat) ? 'active' : '' }}">
                                        <a href="{{ route('site.category-news',$slogan_cat) }}" target="_blank">{{ json_decode($category, true)['name']['az'] }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul><!--/ Nav ul end -->
                    </div><!--/ Collapse end -->

                </div><!-- Site Navbar inner end -->
            </nav><!--/ Navigation end -->

        </div><!--/ Row end -->
    </div><!--/ Container end -->

</div><!-- Menu wrapper end -->
<div class="gap-40"></div>
