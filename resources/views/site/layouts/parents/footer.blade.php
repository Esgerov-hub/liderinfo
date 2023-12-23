{{--<footer id="footer" class="footer">--}}

{{--    <div class="footer-info text-center">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="footer-info-content">--}}
{{--                        <div class="footer-logo">--}}
{{--                            <img class="img-fluid" src="{{ asset('site/logo.jpg') }}" alt="" />--}}
{{--                        </div>--}}
{{--                    </div><!-- Footer info content end -->--}}
{{--                </div><!-- Col end -->--}}
{{--            </div><!-- Row end -->--}}
{{--        </div><!-- Container end -->--}}
{{--    </div><!-- Footer info end -->--}}

{{--</footer>--}}
<!-- Footer end -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="copyright-info">
                    <span> <?php echo \Illuminate\Support\Carbon::now()->year ?> © @lang('web.copyright_footer')</span>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="footer-menu">
                    <ul class="unstyled footer-social">
                        <li>
                            <p class="footer-info-phone"><i class="fa fa-phone"></i> @lang('social.phone')</p>
                            <a title="Facebook" href="@lang('social.facebook')">
                                <span class="social-icon"><i class="fa fa-facebook"></i></span>
                            </a>
                            <a title="telegram" href="@lang('social.telegram')">
                                <span class="social-icon"><i class="fa fa-telegram"></i></span>
                            </a>
                            <a title="twitter" href="@lang('social.twitter')">
                                <span class="social-icon"><i class="fa fa-twitter"></i></span>
                            </a>
                            <a title="youtube" href="@lang('social.youtube')">
                                <span class="social-icon"><i class="fa fa-youtube"></i></span>
                            </a>
                            <a title="instagram" href="@lang('social.instagram')">
                                <span class="social-icon"><i class="fa fa-instagram"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
{{--            <div class="col-sm-6 col-md-6">--}}

{{--                <div class="footer-menu">--}}
{{--                    <ul class="nav unstyled">--}}
{{--                        <li><a href="#">Privacy</a></li>--}}
{{--                        <li><a href="#">Advertisement</a></li>--}}
{{--                        <li><a href="#">Cookies Policy</a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div><!-- Row end -->

        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-primary" title="Back to Top">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>

    </div><!-- Container end -->
</div><!-- Copyright end -->
