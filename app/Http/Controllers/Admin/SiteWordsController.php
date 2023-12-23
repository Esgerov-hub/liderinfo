<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Repositories\TranslationRepositoryImpl;
use Illuminate\Http\Request;

class SiteWordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($code)
    {
        if (!empty($code)) {
            $words = lang_path() . "/" . $code . "/web.php";
            $siteStatisticsData = include $words;
        }
        return view('admin.site-words.edit', compact('siteStatisticsData'));
    }

    public function update($code, Request $request)
    {

        if (!empty($code)) {
            $words = lang_path() . "/" . $code . "/web.php";
            $siteStatisticsData = include $words;
            foreach ($request->all() as $key => $value) {
                if (!empty($siteStatisticsData[$key])) {
                    $siteStatisticsData[$key] = $value;
                }
            }
            $result = file_put_contents($words, '<?php return ' . var_export($siteStatisticsData, true) . ';');
            if (!empty($result)) {
                return redirect()->back()->with('success', "Dosya başarıyla kaydedildi." . $result);
            } else {
                return redirect()->back()->with('errors', "Dosya kaydedilirken bir hata oluştu:" . $result);
            }
        }
        return redirect()->back()->with('errors', "Netice yox");
    }
}
