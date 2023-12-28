@extends('site.layouts.app')
@section('site.css')
@endsection
@section('site.content')
<section class="featured-post-area no-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 pad-r">
                <div id="featured-slider" class="owl-carousel owl-theme featured-slider">
                    @foreach($slider_news as $slide)
                        <?php $sloganNews = json_decode($slide, true)['slogan']['az'] ?>
                        <div class="item" style="background-image:url({{ asset('uploads/newsimage/'.$slide->image) }})">
                            <div class="featured-post">
                                <div class="post-content">
                                    <a class="post-cat" href="{{ route('site.news-detail',$sloganNews) }}">{{ json_decode($slide->category, true)['name']['az'] }}</a>
                                    <h2 class="post-title title-extra-large">
                                        <a href="{{ route('site.news-detail',$sloganNews) }}">{{ json_decode($slide, true)['title']['az'] }}</a>
                                    </h2>
                                    <?php
                                    setlocale(LC_TIME, 'az'); // Set Turkish locale

                                    $slide_string = $slide->created_at;
                                    $slide_time = new DateTime($slide_string);
                                    $slideDate = strftime("%B %e, %Y", $slide_time->getTimestamp());

                                    ?>
                                    <span class="post-date">{{$slideDate}}</span>
{{--                                    <span class="post-hits"><i class="fa fa-eye"></i> {{$slide->reads}}</span>--}}
                                </div>
                            </div><!--/ Featured post end -->

                        </div>
                    @endforeach
                </div><!-- Featured owl carousel end-->
            </div><!-- Col 7 end -->

        </div><!-- Row end -->
    </div><!-- Container end -->
</section><!-- Trending post end -->
<section class="block-wrapper p-bottom-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="more-news block color-default">
                    <h3 class="block-title"><span>@lang('web.our_news')</span></h3>

                    <div class="">
                        <div class="item">
                            @foreach($newsItems as $news)
                                <?php $sloganNews = json_decode($news, true)['slogan']['az'] ?>
                            <div class="post-block-style post-float-half clearfix">
                                <div class="post-thumb">
                                    <a href="{{ route('site.news-detail',$sloganNews) }}">
                                        <img class="img-fluid" src="{{ asset('uploads/newsimage/'.$news->image) }}" alt="" />
                                    </a>
                                </div>
                                <a class="post-cat" href="#">{{ json_decode($news->category, true)['name']['az'] }}</a>
                                <div class="post-content">
                                    <h2 class="post-title">
                                        <a href="{{ route('site.news-detail',$sloganNews) }}">{{ json_decode($news, true)['title']['az'] }}</a>
                                    </h2>
                                    <div class="post-meta">
{{--                                        <span class="post-author"><a href="#">John Doe</a></span>--}}
                                        <?php
                                        setlocale(LC_TIME, 'az'); // Set Turkish locale

                                        $string = $news->created_at;
                                        $time = new DateTime($string);
                                        $newsDate = strftime("%B %e, %Y", $time->getTimestamp());

                                        ?>
                                        <span class="post-date">{{$newsDate}}</span>
{{--                                        <span class="post-hits"><i class="fa fa-eye"></i> {{$news->reads}}</span>--}}
                                    </div>
                                    <p>{{ json_decode($news, true)['text']['az'] }}</p>
                                </div><!-- Post content end -->
                            </div>

                            <div class="gap-30"></div>
                            @endforeach
                        </div><!-- Item 1 end -->
                        <div class="paging">
                            <ul class="pagination">
                                @if ($newsItems->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $newsItems->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif

                                @for ($i = 1; $i <= $newsItems->lastPage(); $i++)
                                    <li class="{{ ($newsItems->currentPage() == $i) ? 'active' : '' }}">
                                        <a href="{{ $newsItems->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($newsItems->hasMorePages())
                                    <li><a href="{{ $newsItems->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="disabled"><span>&raquo;</span></li>
                                @endif
                            </ul>
                        </div>

                    </div><!-- More news carousel end -->
                </div><!--More news block end -->
            </div><!-- Content Col end -->

            <div class="col-lg-4 col-md-12">
                <div class="sidebar sidebar-right">
                    <div class="widget">
                        <h3 class="block-title"><span>@lang('web.follow_us')</span></h3>

                        <ul class="social-icon">
                            <li><a href="@lang('social.facebook')" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="@lang('social.telegram')" target="_blank"><i class="fa fa-telegram-plane"></i></a></li>
                            <li><a href="@lang('social.twitter')" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="@lang('social.instagram')" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="@lang('social.youtube')" target="_blank"><i class="fa fa-youtube"></i></a></li>
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
{{--                                                    <span class="post-hits"><i class="fa fa-eye"></i> {{$last->reads}}</span>--}}
                                                </div>
                                            </div><!-- Post content end -->
                                        </div><!-- Post block style end -->
                                    </li><!-- Li 1 end -->
                                @endforeach
                            </ul><!-- List post end -->
                        </div><!-- List post block end -->

                    </div><!-- Popular news widget end -->

                    <div class="widget text-center">
                        <img class="banner img-fluid" src="{{ asset('site/images/banner-ads/ad-sidebar.png') }}" alt="" />
                    </div><!-- Sidebar Ad end -->

                </div><!-- Sidebar right end -->
            </div><!-- Sidebar Col end -->

        </div><!-- Row end -->
    </div><!-- Container end -->
</section><!-- 3rd block end -->



<section class="ad-content-area text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid" src="{{ asset("site/images/banner-ads/ad-content-one.jpg") }}" alt="" />
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</section><!-- Ad content two end -->
@endsection
@section('site.js')
@endsection
