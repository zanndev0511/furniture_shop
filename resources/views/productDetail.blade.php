<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
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
    <link rel="stylesheet" href="/main/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/main/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/main/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/main/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/main/assets/css/nice-select.css">
    <link rel="stylesheet" href="/main/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="/main/assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="/main/assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="/main/assets/css/main.css">
    <link rel="stylesheet" href="/admin_assets/assets/vendor/fonts/boxicons.css" />

</head>

<body>

    <!-- Start Header Area -->
    @include('header')
    <!-- End Header Area -->

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Product Details Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
                        <a href="single-product.html">Details</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Single Product Area =================-->
    <form action="/add_cart" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="product_image_area mb-5">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">

                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{$product->thumb}}" alt="">
                        </div>

                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h3>{{$product->name}} </h3>
                            <h2>${{number_format(($product->price * $product->price_sale)/100)}}</h2>
                            <ul class="list">
                                @foreach($menus as $menu)
                                @if($menu->id == $product->menu_id)
                                <li><a class="active" href="#"><span>Category</span> : {{$menu->name}}</a></li>
                                @endif
                                @endforeach
                            </ul>

                            <p>{!! $product->content !!}</p>
                            <div class="product_count">
                                <label for="qty">Quantity:</label>
                                <input type="number" name="qty" id="sst" maxlength="12" value="1" title="Quantity:"
                                    class="input-text qty">
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                    class="increase items-count" type="button"><i
                                        class="lnr lnr-chevron-up"></i></button>
                                <button
                                    onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                    class="reduced items-count" type="button"><i
                                        class="lnr lnr-chevron-down"></i></button>
                            </div>
                            <button type="submit" class="primary-btn card_area d-flex align-items-center ">
                                Add to cart
                            </button>
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->

    <!--================End Product Description Area =================-->

    <!-- Start related-product Area -->

    <!-- End related-product Area -->

    <!-- start footer Area -->
    @include('footer')
    <!-- End footer Area -->

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