@php
$categoryHtml = \App\Helpers\Helper::category($menus, $categories);
@endphp
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="/main/assets/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>{{$title}}</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="/main/assets/css/linearicons.css">
    <link rel="stylesheet" href="/main/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/main/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/main/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/main/assets/css/nice-select.css">
    <link rel="stylesheet" href="/main/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="/main/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/main/assets/css/main.css">
    <link rel="stylesheet" href="/admin_assets/assets/vendor/fonts/boxicons.css" />
</head>

<body id="category">

    <!-- Start Header Area -->
    @include('header')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shop Category page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Category</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Browse Categories</div>
                    <ul class="main-categories">
                        {!! $categoryHtml !!}
                        <!-- <li class="main-nav-list"><a href="#">Pest Control<span class="number">(24)</span></a></li> -->
                        <!-- <li class="main-nav-list"><a class="border-bottom-0" data-toggle="collapse" href="#babyCare"
                                aria-expanded="false" aria-controls="babyCare"><span
                                    class="lnr lnr-arrow-right"></span>Baby Care<span class="number">(48)</span></a>
                            <ul class="collapse" id="babyCare" data-toggle="collapse" aria-expanded="false"
                                aria-controls="babyCare">
                                <li class="main-nav-list child"><a href="#">Frozen Fish<span
                                            class="number">(13)</span></a></li>
                                <li class="main-nav-list child"><a href="#">Dried Fish<span
                                            class="number">(09)</span></a></li>
                                <li class="main-nav-list child"><a href="#">Fresh Fish<span
                                            class="number">(17)</span></a></li>
                                <li class="main-nav-list child"><a href="#">Meat Alternatives<span
                                            class="number">(01)</span></a></li>
                                <li class="main-nav-list child"><a href="#" class="border-bottom-0">Meat<span
                                            class="number">(11)</span></a></li>
                            </ul>
                        </li> -->
                    </ul>
                </div>

                <div class="sidebar-filter mt-50">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <ul>
                                <li class="filter-list"><a href="/categories">
                                        <label for="price1">All</label></a>
                                </li>
                                <li class="filter-list"><a
                                        href="{{request()->fullUrlWithQuery(['price'=>'1','menu' => NULL]) }}">
                                        <label for="price2">Under $200.00</label></a>
                                </li>
                                <li class="filter-list"><a
                                        href="{{request()->fullUrlWithQuery(['price'=>'2', 'menu' => NULL]) }}"><label
                                            for="price3">$200.00 - $400.00</label></a></li>
                                <li class="filter-list"><a
                                        href="{{request()->fullUrlWithQuery(['price'=>'3', 'menu' => NULL]) }}"><label
                                            for="price4">$400.00 - $600.00</label></a></li>
                                <li class="filter-list"><a
                                        href="{{request()->fullUrlWithQuery(['price'=>'4', 'menu' => NULL]) }}"><label
                                            for="price5">More
                                            than $600.00</label></a></li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <!-- <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting">
                        <select>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                            <option value="1">Default sorting</option>
                        </select>
                    </div>
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div> -->
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        <!-- single product -->
                        {!! \App\Helpers\Helper::productCate($products) !!}
                    </div>
                </section>
                <!-- End Best Seller -->
                <!-- Start Filter Bar -->
                <!-- <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">
                        <select>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                            <option value="1">Show 12</option>
                        </select>
                    </div>
                    <div class="pagination">
                        <a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
                        <a href="#">6</a>
                        <a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div> -->
                <!-- End Filter Bar -->
                {!! $products->links("pagination::bootstrap-5") !!}
            </div>
        </div>
    </div>

    <!-- Start related-product Area -->

    <!-- End related-product Area -->

    <!-- start footer Area -->
    @include('footer')
    <!-- End footer Area -->

    <!-- Modal Quick Product View -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="container relative">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="product-quick-view">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="quick-view-carousel">
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                                <div class="item" style="background: url(img/organic-food/q1.jpg);">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="quick-view-content">
                                <div class="top">
                                    <h3 class="head">Mill Oil 1000W Heater, White</h3>
                                    <div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span
                                            class="ml-10">$149.99</span></div>
                                    <div class="category">Category: <span>Household</span></div>
                                    <div class="available">Availibility: <span>In Stock</span></div>
                                </div>
                                <div class="middle">
                                    <p class="content">Mill Oil is an innovative oil filled radiator with the most
                                        modern technology. If you are
                                        looking for something that can make your interior look awesome, and at the same
                                        time give you the pleasant
                                        warm feeling during the winter.</p>
                                    <a href="#" class="view-full">View full Details <span
                                            class="lnr lnr-arrow-right"></span></a>
                                </div>
                                <div class="bottom">
                                    <div class="color-picker d-flex align-items-center">Color:
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                        <span class="single-pick"></span>
                                    </div>
                                    <div class="quantity-container d-flex align-items-center mt-15">
                                        Quantity:
                                        <input type="text" class="quantity-amount ml-15" value="1" />
                                        <div class="arrow-btn d-inline-flex flex-column">
                                            <button class="increase arrow" type="button" title="Increase Quantity"><span
                                                    class="lnr lnr-chevron-up"></span></button>
                                            <button class="decrease arrow" type="button" title="Decrease Quantity"><span
                                                    class="lnr lnr-chevron-down"></span></button>
                                        </div>

                                    </div>
                                    <div class="d-flex mt-20">
                                        <a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
                                        <a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="/main/assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="/main/assets/js/vendor/bootstrap.min.js"></script>
    <script src="/main/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/main/assets/js/jquery.nice-select.min.js"></script>
    <script src="/main/assets/js/jquery.sticky.js"></script>
    <script src="/main/assets/js/nouislider.min.js"></script>
    <script src="/main/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/main/assets/js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="/main/assets/js/gmaps.min.js"></script>
    <script src="/main/assets/js/main.js"></script>
</body>

</html>