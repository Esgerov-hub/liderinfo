@extends('site.layouts.app')
@section('site.css')
@endsection
@section('site.content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('site.index') }}">@lang('web.home')</a></li>
                        <li>{{ json_decode($news_category, true)['name']['az'] }}</li>
                    </ol>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Page title end -->

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">

                    <div class="block category-listing">
                        <h3 class="block-title"><span>{{ json_decode($news_category, true)['name']['az'] }}</span></h3>


                        <div class="row">
                            @foreach($newsItems as $news)
                                <?php $sloganNews = json_decode($news, true)['slogan']['az'] ?>
                            <div class="col-md-6">
                                <div class="post-block-style post-grid clearfix">
                                    <div class="post-thumb">
                                        <a href="{{ route('site.news-detail',$sloganNews) }}">
                                            <img class="img-fluid" src="{{ asset('uploads/newsimage/'.$news->image) }}" alt="" />
                                        </a>
                                    </div>
                                    <a class="post-cat" href="#">{{ json_decode($news_category, true)['name']['az'] }}</a>
                                    <div class="post-content">
                                        <h2 class="post-title title-large">
                                            <a href="{{ route('site.news-detail',$sloganNews) }}">{{ json_decode($news, true)['title']['az'] }}</a>
                                        </h2>
                                        <div class="post-meta">
{{--                                            <span class="post-author"><a href="#">John Doe</a></span>--}}
                                            <?php
                                            setlocale(LC_TIME, 'az'); // Set Turkish locale

                                            $string = $news->created_at;
                                            $time = new DateTime($string);
                                            $newsDate = strftime("%B %e, %Y", $time->getTimestamp());

                                            ?>
                                            <span class="post-date">{{ $newsDate }}</span>
{{--                                            <span class="post-hits"><i class="fa fa-eye"></i> {{$news->reads}}</span>--}}
                                            {{--<span class="post-comment pull-right"><i class="fa fa-comments-o"></i>
											<a href="#" class="comments-link"><span>03</span></a></span>--}}
                                        </div>
                                        <p>{{ json_decode($news, true)['text']['az'] }}</p>
                                    </div><!-- Post content end -->
                                </div><!-- Post Block style end -->
                            </div>
                            @endforeach
                            <!-- Col 1 end -->
                        </div><!-- Row end -->
                    </div><!-- Block Lifestyle end -->

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
    </section><!-- First block end -->
@endsection
@section('site.js')
@endsection
