<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\NewsHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Repositories\NewsRepositoryImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    protected $newsRepositoryImpl;

    public function __construct(NewsRepositoryImpl $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = $this->newsRepository->getAll();
        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status',1)->get();
//        dd($categories);
        return view('admin.news.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title.az' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ], [
            'title.az.required' => 'Başlıq adını qeyd edin.',
            'category_id.required' => 'Kateqorya  seçimi edin.',
            'image.required' =>'Şəkil əlavə edin.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } elseif ($validator->passes()) {
            try {
                $news = null ;
                $newsData = NewsHelper::saveData($request,$news);
                $this->newsRepository->create($newsData);
                $message = 'Məlumat əlavə edildi.';
                return redirect()->back()->with('success', $message);
            } catch (\Exception $exception) {
                $errors = $validator->errors();
                return redirect()->back()->with('errors', $errors->getMessages());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::where('status',1)->get();
        return view('admin.news.edit', compact('news','categories'));
    }


    public function status($id, Request $request)
    {
        try {

            $status = $request->status;
            $updated = News::where('id', $id)->update(['status' => !$status]);

            if (isset($updated) && !empty($updated)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Məlumat yeniləndi'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'error' => 'Yenidən cəhd göstərin'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Xətta!'
            ]);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $validator = Validator::make($request->all(), [
            'title.az' => 'required',
            'category_id' => 'required',
//            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ], [
            'title.az.required' => 'Başlıq adını qeyd edin.',
            'category_id.required' => 'Kateqorya  seçimi edin.',
            'image.required' =>'Şəkil əlavə edin.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } elseif ($validator->passes()) {
            try {
                $id = $news->id;
                $newsData = NewsHelper::saveData($request,$news);
                $this->newsRepository->update($id, $newsData);

                $message = 'Məlumat düzəliş edildi.';
                return redirect()->back()->with('success', $message);
            } catch (\Exception $exception) {
                $errors = $validator->errors();
                return redirect()->back()->with('errors', $errors);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        try {
            $id = $news->id;
            $this->newsRepository->delete($id);
            $message = 'Məlumat silindi.';
            return redirect()->back()->with('success', $message);
        } catch (\Exception $exception) {
            return redirect()->back()->with('errors', 'Xətta baş verdi!');
        }
    }
}
