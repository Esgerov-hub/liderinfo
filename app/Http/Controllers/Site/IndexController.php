<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index()
    {
        $newsItems = News::with('category')->where('status',1)->orderBy('created_at','DESC')->paginate(10);
        $slider_news = News::with('category')->where('status',1)
            ->orderBy('created_at','DESC')->take(4)->get();
        $lastNews = News::where(['status'=>1])->orderBy('created_at','DESC')->take(3)->get();
//        @dd($newsItems);
        return view('site.index',compact('newsItems','slider_news','lastNews'));
    }


    public function categoryNews($slogan)
    {
        $news_category = Category::with('news')->where(['status'=>1,'slogan->az'=>$slogan])->first();

        if (count($news_category->news) < 1)
        {
            return self::not_found();
        }
        $newsItems = $news_category->news()->paginate(2);
        $lastNews = News::where(['status'=>1,'category_id'=>$news_category->id])->orderBy('created_at','DESC')->take(3)->get();
        return view('site.category-news',compact('news_category','newsItems','lastNews'));
    }

    public function news()
    {
        return view('site.news');
    }

    public function newsDetail($slogan)
    {
        $news = News::with('category')->where(['status'=>1,'slogan->az'=>$slogan])->first();
        if (empty($news))
        {
            return self::not_found();
        }


        $viewed = Session::get('reads', []);
        if (!in_array($news->id, $viewed)) {
            $news->increment('reads');
            Session::push('reads', $news->id);
        }
        $lastNews = News::where(['status'=>1])->orderBy('created_at','DESC')->take(3)->get();
        return view('site.news-detail',compact('news','lastNews'));
    }

    public function not_found()
    {
        return view('site.404');
    }
}
