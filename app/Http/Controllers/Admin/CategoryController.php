<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Category\CategoryService;
use App\Models\Category;
use App\Http\Requests\Category\CategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    
    public function index()
    {
        return view('admin.category.list',[
            'title' => 'The list of category',
            'categories' => $this->categoryService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.category.add', [
            'title' => 'Add new category',
            'categories' => $this->categoryService->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $result = $this->categoryService->insert($request);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
         return view('admin.category.edit', [
            'title' => 'Edit category',
            'category' => $category,
            'categories' => $this->categoryService->getAll()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'title' => 'Edit category :' . $category->name,
            'category' => $category,
            'categories' => $this->categoryService->getAll()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $result = $this->categoryService->update($category, $request);
        if ($result) {
            return redirect('/admin/categories/list');
        }

        return redirect()->back();
    }

    
    public function destroy(Request $request): JsonResponse
    {
        $result =$this->categoryService->destroy($request);

        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);
        }
        return response()->json([
                'error'=> true,
            ]);
    }
}