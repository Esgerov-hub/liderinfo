@extends('site.layouts.app')
@section('site.css')
@endsection
@section('site.content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('site.index') }}">@lang('web.home')</a></li>
                        <li>{{ json_decode($news->category, true)['name']['az'] }}</li>
                    </ol>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Page title end -->

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="single-post">

                        <div class="post-title-area">
                            <a class="post-cat" href="#">{{ json_decode($news->category, true)['name']['az'] }}</a>
                            <h2 class="post-title">
                                {{ json_decode($news, true)['title']['az'] }}
                            </h2>
                            <div class="post-meta">
{{--								<span class="post-author">--}}
{{--									By <a href="#">John Doe</a>--}}
{{--								</span>--}}
                                <?php
                                setlocale(LC_TIME, 'az'); // Set Turkish locale

                                $string = $news->created_at;
                                $time = new DateTime($string);
                                $newsDate = strftime("%B %e, %Y", $time->getTimestamp());

                                ?>
                                <span class="post-date"><i class="fa fa-clock-o"></i> {{ $newsDate }}</span>
{{--                                <span class="post-hits"><i class="fa fa-eye"></i> 21</span>--}}
{{--                                <span class="post-comment"><i class="fa fa-comments-o"></i>--}}
{{--								<a href="#" class="comments-link"><span>01</span></a></span>--}}
                            </div>
                        </div><!-- Post title end -->

                        <div class="post-content-area">
                            <div class="post-media post-featured-image">
                                <a href="{{ asset('uploads/newsimage/'.$news->image) }}" class="gallery-popup"><img src="{{ asset('uploads/newsimage/'.$news->image) }}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="entry-content">
                             {!! json_decode($news, true)['full_text']['az'] !!}
                            </div><!-- Entery content end -->

                            {{--<div class="share-items clearfix">
                                <ul class="post-social-icons unstyled">
                                    <li class="facebook">
                                        <a href="#">
                                            <i class="fa fa-facebook"></i> <span class="ts-social-title">Facebook</span></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#">
                                            <i class="fa fa-twitter"></i> <span class="ts-social-title">Twitter</span></a>
                                    </li>
                                    <li class="gplus">
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i> <span class="ts-social-title">Google +</span></a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="#">
                                            <i class="fa fa-pinterest"></i> <span class="ts-social-title">Pinterest</span></a>
                                    </li>
                                </ul>
                            </div>--}}<!-- Share items end -->

                        </div><!-- post-content end -->
                    </div><!-- Single post end -->

                </div><!-- Content Col end -->

                <div class="col-lg-4 col-md-12">
                    <div class="sidebar sidebar-right">
                        <div class="widget">
                            <h3 class="block-title"><span>@lang('web.follow_us')</span></h3>

                            <ul class="social-icon">
                                <li><a href="@lang('social.facebook')" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="@lang('social.telegram')" target="_blank"><i class="fa fa-telegram"></i></a></li>
                                <li><a href="@lang('social.twitter')" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="@lang('social.instagram')" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#@lang('social.youtube')" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div><!-- Widget Social end -->

                        <div class="widget color-default">
                            <h3 class="block-title"><span>@lang('web.last_news')</span></h3>

                            <div class="list-post-block">
                                <ul class="list-post">
                                    @foreach($lastNews as $last)

                                        <?php $sloganLastNews = json_decode($last, true)['slogan']['az'] ?>
                                        <?php
                                        setlocale(LC_TIME, 'az'); // Set Turkish locale

                                        $dateString = $last->created_at;
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = strftime("%B %e, %Y", $dateTime->getTimestamp());

                                        ?>
                                        <li class="clearfix">
                                            <div class="post-block-style post-float clearfix">
                                                <div class="post-thumb">
                                                    <a href="{{ route('site.news-detail',$sloganLastNews) }}">
                                                        <img class="img-fluid" src="{{ asset('uploads/newsimage/'.$last->image) }}" alt="" />
                                                    </a>
                                                </div><!-- Post thumb end -->

                                                <div class="post-content">
                                                    <h2 class="post-title title-small">
                                                        <a href="{{ route('site.news-detail',$sloganLastNews) }}">{{ json_decode($last, true)['title']['az'] }}</a>
                                                    </h2>
                                                    <div class="post-meta">
                                                        <span class="post-date">{{ $formattedDate }}</span>
                                                    </div>
                                                </div><!-- Post content end -->
                                            </div><!-- Post block style end -->
                                        </li><!-- Li 1 end -->
                                    @endforeach
                                </ul><!-- List post end -->
                            </div><!-- List post block end -->

                        </div><!-- Popular news widget end -->

                        <div class="widget text-center">
                            <img class="banner img-fluid" src="http://demo.themewinter.com/html/news247-bs4/images/banner-ads/ad-sidebar.png" alt="" />
                        </div><!-- Sidebar Ad end -->

                    </div><!-- Sidebar right end -->
                </div><!-- Sidebar Col end -->

            </div><!-- Row end -->
        </div><!-- Container end -->
    </section><!-- First block end -->


@endsection
@section('site.js')
@endsection
