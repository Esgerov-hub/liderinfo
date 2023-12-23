<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\CategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\CategoryRepositoryImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryImpl $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ], [
            'name.required' => 'Kategorya adını qeyd edin.'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } elseif ($validator->passes()) {
            try {
                $categoryData = CategoryHelper::saveData($request);
                $this->categoryRepository->create($categoryData);
                $message = 'Məlumat əlavə edildi.';
                return redirect()->back()->with('success', $message);
            } catch (\Exception $exception) {
                $errors = $validator->errors();
                return redirect()->back()->with('errors', $errors);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function status($id, Request $request)
    {
        try {

            $status = $request->status;
            $updated = Category::where('id', $id)->update(['status' => !$status]);

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
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name.az' => 'required|max:55',
        ], [
            'name.az.required' => 'Kategorya adını qeyd edin.'
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->back()->with('errors', $errors);
        } elseif ($validator->passes()) {
            try {
                $id = $category->id;
                $categoryData = CategoryHelper::saveData($request);
                $this->categoryRepository->update($id, $categoryData);

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
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $id = $category->id;
            $this->categoryRepository->delete($id);
            $message = 'Məlumat silindi.';
            return redirect()->back()->with('success', $message);
        } catch (\Exception $exception) {
            return redirect()->back()->with('errors', 'Xətta baş verdi!');
        }
    }
}
