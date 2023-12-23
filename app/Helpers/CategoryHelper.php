<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class CategoryHelper
{
    public static function saveData($request)
    {
        $name = [];
        $slogan = [];
        $locales = ['az'];

        foreach ($locales as $locale) {

            $name[$locale] = $request->input("name.$locale", '');
            $slogan[$locale] = Str::slug(trim($request->input("name.$locale", '')));
        }

        $data = [
            'name' => $name,
            'slogan' => $slogan,
            'status' => 1,
        ];


        return $data;
    }
}
