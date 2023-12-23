<?php

namespace App\Helpers;

class StaticPageHelper
{
    public static function prepareStaticData($request)
    {

        $titleData = [];
        $descriptionData = [];
        $locales = ['az', 'ru'];

        foreach ($locales as $locale) {
            $titleData[$locale] = $request->input("title.$locale", '');
            $descriptionData[$locale] = $request->input("description.$locale", '');
        }

        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $image = $request->logo->move(public_path('uploads/static-pages'), $imageName);
            $image = $image->getFilename();
        }else{
            $image = NULL;
        }

        $data = [
            'title' => $titleData,
            'text' => $descriptionData,
            'image' => $image,
            'type' => $request->type,
        ];

        return $data;
    }
}
