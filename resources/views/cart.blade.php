<?php

$contents = Cart::content();
?>
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
    <link rel="stylesheet" href="/main/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/main/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/main/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/main/assets/css/nice-select.css">
    <link rel="stylesheet" href="/main/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="/main/assets/css/bootstrap.css">
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
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contents as $content)

                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img class="imgsize" src="{{$content->options->image}}" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p>{{$content->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{number_format($content->price)}}</h5>
                                </td>
                                <form action="/update_cart" method="POST">
                                    @csrf
                                    <td>
                                        <div class="product_count">
                                            <input type="text" name="quanty" id="sst" maxlength="100"
                                                value="{{$content->qty}}" title="Quantity:" class="input-text qty">
                                            <button
                                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                                class="increase items-count" type="button"><i
                                                    class="lnr lnr-chevron-up"></i></button>
                                            <button
                                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                class="reduced items-count" type="button"><i
                                                    class="lnr lnr-chevron-down"></i></button>
                                        </div>
                                    </td>
                                    <td>
                                        <h5>${{number_format($content->price * $content->qty)}}</h5>
                                    </td>
                                    <td>

                                        <a href="/delete_cart/{{$content->rowId}}" class="genric-btn danger">
                                            <i class='bx bx-trash'></i>
                                        </a>

                                        <input type="submit" value="Update" name="update" class="genric-btn success">
                                        <input value="{{$content->rowId}}" name="rowID_cart" type="hidden"
                                            class="form-control">

                                    </td>
                                </form>
                            </tr>


                            @endforeach
                            <tr>
                                <td>
                                    &ensp;
                                </td>
                                <td>
                                    &ensp;
                                </td>
                                <td>
                                    &ensp;
                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">

                                        &ensp;
                                    </div>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <h5>Cart Sub Total</h5>
                                </td>
                                <td>
                                    <h5>${{Cart::subtotal()}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Tax</h5>
                                </td>
                                <td>
                                    <h5>${{Cart::tax()}}</h5>
                                </td>
                            </tr>
                            <tr class="shipping_area">

                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <h5>Free ship</h5>
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    <h5>Total</h5>
                                </td>
                                <td>
                                    <h5><b>${{Cart::total()}}</b></h5>
                                </td>
                            </tr>





                        </tbody>

                    </table>
                    <div class="checkout_btn_inner d-flex align-items-center">
                        <a class="genric-btn success-border" href="/categories">Continue Shopping</a>

                        <a class="genric-btn warning ml-4" href="/check_out">Proceed to checkout</a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->

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