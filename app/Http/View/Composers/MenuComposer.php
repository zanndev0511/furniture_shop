<?php
 
namespace App\Http\View\Composers;
 
use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Models\Menu;
 
class MenuComposer
{
    
    public function __construct()
    {
       
    }
    public function compose(View $view)
    {
        $menu = Menu::select('id','name','parent_id')->where('active', 1 )->orderByDesc('id')->get();
        //truyen thông tin từ composer qua viewservice rồi qua thằng giao diện header

        $view->with('menus', $menu);
    }
}