<?php
namespace App\Helpers;

use Illuminate\Support\Arr;
use App\Models\Product;
use Illuminate\Support\Str;

class Helper{
    public static function menu($menus, $parent_id = 0, $char = ''){
        $html = '';
        foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .= '

                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>'.$menu->id.'</strong></td>
                    <td>'.$char.$menu->name.'</td>
                    <td>'.self::active($menu->active).'</td>
                    <td> 
                        <a class="btn btn-primary btn-sm" href="/admin/menu/edit/' . $menu->id . '">
                            <i class="bx bx-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-sm"
                                onclick="removeRow(' . $menu->id . ', \'/admin/menu/destroy\')">
                            <i class="bx bx-trash"></i>
                        </a></td>
                </tr>
                ';
                unset($menus[$key]);
                $html .= self::menu($menus, $menu->id, $char.'|--');
                
            }
            
        }
        return $html;
    }
    public static function active($active = 0): string
    {
        return $active == 0 ? '<span class = "btn btn-danger btn-xs">NO</span>': '<span class = "btn btn-success btn-xs">YES</span>';
    }

    public static function status($status = 0): string
    {
        return $status == 0 ? '<span class = "badge bg-label-warning me-1">NOT RELEASED</span>': '<span class = "badge bg-label-success me-1">RELEASED</span>';
    }
    public static function order_status($order_status = 0): string
    {
        return $order_status == 0 ? '<span class = "badge bg-label-warning me-1">UNPAID</span>': '<span class = "badge bg-label-success me-1">PAID</span>';
    }

    public static function menus($menus, $parent_id = 0) :string
    {
        $html = '';
        foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .='
                    <li>
                        <a href="'.$menu->url.'">
                            ' . $menu->name . '
                        </a>';
                        unset($menu[$key]);
                    $html .= '</li> ';
            }
        }

        return $html;
    }

    public static function isChild($menus, $id):bool
    { //kiem tra co cấp 2 hay không
        foreach($menus as $menu){
            if($menu->parent_id == $id){
                return true;
            }
        }

        return false;
    }

    public static function menuChild($menus, $parent_id = 0):string
    {
        $html = '';
        foreach($menus as $key => $menu){
            if($menu->parent_id == $parent_id){
                $html .='
                    <li class="dropdown-item">
                        <a  href="/danh-muc/' . $menu->id . '-' . Str::slug($menu->name, '-') . '.html">
                            ' . $menu->name . '
                        </a>
                    </li> ';
            }
        }
        return $html;
    }

    public static function home($menus, $active = 1):string{
        $html ='';
       foreach($menus as $key => $menu){
            if($menu->active == $active){
                $html .=
                    '<div class="single-products-catagory clearfix">
                    <a href="shop.html">
                        <img src="'.$menu->thumb.'" alt="" />
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>'.$menu->description.'</p>
                            <h4>'.$menu->name.'</h4>
                        </div>
                    </a>
                </div>';
                unset($menu[$key]);
            }
        }
        return $html;
    }

    public static function brand($brands, $active = 1):string{
        $html ='';
       foreach($brands as $key => $brand){
            if($brand->active == $active){
                $html .=
                    '<div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="amado">
                <label class="form-check-label" for="amado">'.$brand->name.'</label>
            </div>';
                unset($brand[$key]);
            }
        }
        return $html;
    }
    public static function checkProduct($sliders, $name_product = 0){
        foreach($sliders as $key => $slider){
            if($slider->name_product == $name_product && $slider->sort_by == 2){
                return $slider->thumb;
            }
        }
    }

    public static function shop($sliders, $name_product = 0, $active = 1):string
    {
        $html ='';
        foreach($sliders as $key => $slider){
            if($slider->name_product == $name_product){
                if($slider->active == $active ){
                    $html .=
                        '<div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <div class="product-img">
                                    <img src="'.$slider->thumb.'" alt="">
                                    <img class="hover-img" src="'.self::checkProduct($sliders, $slider->name_product).'" alt="">
                                </div>
                                <div class="product-description d-flex align-items-center justify-content-between">
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">'.$slider->price.'</p>
                                    <a href="product-details.html">
                                        <h6>'.$slider->name.'</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <a href="cart.html" data-toggle="tooltip" data-placement="left"
                                            title="Add to Cart"><img src="/template/img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
                    unset($slider[$key]);
                    
                }

                
            }
        }
        return $html;
    }
    public static function slider($sliders, $active = 1){
        $html ='';
        foreach($sliders as $key => $slider){
            if($slider->active == $active){
                $html .=
                    ' <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>'.$slider->title.'</h1>
                                    <p>'.$slider->description.'</p>
                                    <div class="add-bag d-flex align-items-center">
                                        <a class="add-btn" href="'.$slider->url.'"><span class="lnr lnr-cross"></span></a>
                                        <span class="add-text text-uppercase">Add to Bag</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid img-size-slider" src="'.$slider->thumb.'" alt="">
                                </div>
                            </div>
                        </div>';
                unset($slider[$key]);
            }
        }
        return $html;
    }
    public static function productLatest($products, $active = 1, $status = 1){
        $html ='';
        foreach($products as $key => $product){
            if($product->active == $active && $product->status == $status){
                $html .=
                    ' <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid img-size-product" src="'.$product->thumb.'" alt="" />
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$'.number_format($product->price - $product->price_sale).'</h6>
                                    <h6 class="l-through">$'.number_format($product->price).'</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
                unset($product[$key]);
            }
        }
        return $html;
    }
    public static function productComing($products, $active = 1, $status = 0){
        $html ='';
        foreach($products as $key => $product){
            if($product->active == $active && $product->status == $status){
                $html .=
                    ' <div class="col-lg-3 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid img-size-product" src="'.$product->thumb.'" alt="" />
                            <div class="product-details">
                                <h6>addidas New Hammer sole for Sports person</h6>
                                <div class="price">
                                    <h6>$'.number_format($product->price - $product->price_sale).'</h6>
                                    <h6 class="l-through">$'.number_format($product->price).'</h6>
                                </div>
                                <div class="prd-bottom">
                                    <a href="" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">add to bag</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-heart"></span>
                                        <p class="hover-text">Wishlist</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-sync"></span>
                                        <p class="hover-text">compare</p>
                                    </a>
                                    <a href="" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>';
                unset($product[$key]);
            }
        }
        return $html;
    }
    public static function deal($products, $active = 1, $status = 1){
        $html ='';
        foreach($products as $key => $product){
            if($product->active == $active && $product->status == $status){
                if(($product->price - $product->price_sale) >=50){
                    $html .=
                    ' <div class="single-exclusive-slider">
                            <img class="img-fluid" src="'.$product->thumb.'" alt="" />
                            <div class="product-details">
                                <div class="price mt-5">
                                    <h6>$'.number_format($product->price - $product->price_sale).'</h6>
                                    <h6 class="l-through">'.$product->price.'</h6>
                                </div>
                                <h4>'.$product->description.'</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href="'.$product->url.'"><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Add to Bag</span>
                                </div>
                            </div>
                        </div>';
                unset($product[$key]);
                }
                
            }
        }
        return $html;
    }
    public static function sale($products, $active = 1, $status = 1){
        $html ='';
        foreach($products as $key => $product){
            if($product->active == $active && $product->status == $status){
                if($product->price_sale >0){
                    $html .=
                    ' <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                            <div class="single-related-product d-flex">
                                <a href="'.$product->url.'"><img class="imgsize" src="'.$product->thumb.'" alt="" /></a>
                                <div class="desc">
                                    <a href="'.$product->url.'" class="title">'.$product->name.'</a>
                                    <div class="price">
                                        <h6>$'.number_format($product->price - $product->price_sale).'</h6>
                                        <h6 class="l-through">$'.number_format($product->price).'</h6>
                                    </div>
                                </div>
                            </div>
                        </div>';
                unset($product[$key]);
                }
            }
        }
        return $html;
    }
    public static function category($menus, $categories, $active = 1){
        $html ='';
        foreach($categories as $key => $category){
            if($category->active == $active ){
                $html .=
                    ' <li class="main-nav-list"><a data-toggle="collapse" href="#'.preg_replace('/\s+/', '', $category->name).'"
                                aria-expanded="false" aria-controls="'.$category->id.'"><span
                                    class="lnr lnr-arrow-right"></span>'.$category->name.'</a>';
                                    
                $html .= self::hasChild($menus, $category->id, $category->name);
                                        
            }
                         
                unset($category[$key]);
            }
        
        return $html;
    }

    public static function hasChild($menus, $id, $name)
    { 
        $html = '';
        foreach($menus as $menu){
            if($menu->category == $id){
                $html .='<ul class="collapse" id="'.preg_replace('/\s+/', '', $name).'" data-toggle="collapse" aria-expanded="false"
                                    aria-controls="'.$id.'">
                                    <li class="main-nav-list child"><a href="'.request()->fullUrlWithQuery(['menu'=>''.$menu->id.'','price' => NULL]).'">'.$menu->name.'</li>
                                    </li>
                                </ul>
                            </li>';
            }
        }

        return $html;
    }
    public static function productCate($products, $active = 1)
    { 
        $html = '';
        foreach($products as $key => $product){
            if($product->active == $active){
                $html .='<div class="col-lg-4 col-md-6">
                            <div class="single-product">
                                <a href="/product/'.$product->id.'-'.Str::slug($product->name,'-').'"><img
                                        class="img-fluid img-size-product" src="'.$product->thumb.'" alt=""></a>
                                <div class="product-details">
                                    <h6>'.$product->name.'</h6>
                                    <div class="price">
                                        <h6>$'.number_format(($product->price * $product->price_sale)/100).'</h6>
                                        <h6 class="l-through">$'.number_format($product->price).'</h6>
                                    </div>
                                    <div class="prd-bottom">

                                        <a href="" class="social-info">
                                            <span class="ti-bag"></span>
                                            <p class="hover-text">add to bag</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-heart"></span>
                                            <p class="hover-text">Wishlist</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-sync"></span>
                                            <p class="hover-text">compare</p>
                                        </a>
                                        <a href="" class="social-info">
                                            <span class="lnr lnr-move"></span>
                                            <p class="hover-text">view more</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>';
            }
             unset($product[$key]);
        }

        return $html;
    }
}