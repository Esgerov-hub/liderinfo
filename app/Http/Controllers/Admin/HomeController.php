<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $newsActive = News::where('status',1)->count();
        $newsNoActive = News::where('status',0)->count();
        return view('admin.home',compact('newsActive','newsNoActive'));
    }
}
