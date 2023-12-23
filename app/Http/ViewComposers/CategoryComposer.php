<?php

namespace App\Http\ViewComposers;

use App\MenuItem;
use App\Models\Category;
use App\Models\PackageCategory;
use App\Models\PackageContainType;
use Illuminate\View\View;

class CategoryComposer
{
    public function compose(View $view)
    {
        $categories = Category::where(['status'=>1])->get();
        $data_category = Category::with('news')
            ->where(['status'=>1])->orderBy('id','DESC')->take(4);
        $view->with(['categories'=>$categories,'data_category'=>$data_category]);
    }
}
