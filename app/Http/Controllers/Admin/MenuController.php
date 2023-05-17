<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Category\CategoryService;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService;
    protected $categoryService;

    public function __construct(MenuService $menuService, CategoryService $categoryService)
    {
        $this->menuService = $menuService;
        $this->categoryService = $categoryService;
    }
    public function create(){
        return view('admin.menu.add',[
            'title' =>'Add new menu',
            'menus' => $this->menuService->getAll(),
            'categories' => $this->categoryService->getAll()
        ]);
    }
    public function store(CreateFormRequest $request){
        $this->menuService->create($request);

        return redirect()->back();
    }
    public function index(){
        return view('admin.menu.list',[
            'title'=>'The list of menus',
            'menus' =>$this->menuService->getMenu(),//lấy dữ liệu cha từ bảng menus
        ]);
    }
    public function destroy(Request $request)
    {
        $result = $this->menuService->destroy($request);
        if($result){
            return response()->json([
                'error'=> false,
                'message' => 'Delete successfully'
            ]);//response trar ve mot cai view
        }

        return response()->json([
                'error'=> true,

            ]);//response trar ve mot cai view
    }
    public function show(Menu $menu){ // check id bảng menu

        return view('admin.menu.edit',[
            'title'=>'Edit Menu' .$menu->name,
            'menu' => $menu,
            'menus' =>$this->menuService->getMenu(),//lấy dữ liệu cha từ bảng menus
            'categories' => $this->categoryService->getAll()
        ]);
    }
    public function update(Menu $menu, CreateFormRequest $request ){
        $this->menuService->update($request, $menu);
        return redirect('/admin/menu/list');
    }
}