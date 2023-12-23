<?php

namespace App\Helpers;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsHelper
{
    public static function saveData($request,$news)
    {
        $title = [];
        $text = [];
        $full_text = [];
        $locales = ['az'];
        $category_id = Category::where(['status' => 1, 'id' => $request->category_id])->first();
//        dd($category_id);
        if (empty($category_id)){
            return ['messages' => 'Kateqorya tapılmadı.'];
        }
        foreach ($locales as $locale) {
            $title[$locale] = $request->input("title.$locale", '');
            $slogan[$locale] = Str::slug(trim($request->input("title.$locale", '')));
            $text[$locale] = $request->input("text.$locale", '');
            $full_text[$locale] = $request->input("full_text.$locale", '');
        }

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $image = $request->image->move(public_path('uploads/newsimage'), $imageName);
            $imageImage = $image->getFilename();
        }else{
            if ($news == null)
            {
                $imageImage = null;
            } else {
                $imageImage = $news->image;
            }

        }
        $data = [
            'image' => $imageImage,
            'title' => $title,
            'slogan' => $slogan,
            'text' => $text,
            'full_text' => $full_text,
            'category_id' => $category_id['id'],
            'user_id' => auth()->user()->id,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];

        return $data;
    }
}
