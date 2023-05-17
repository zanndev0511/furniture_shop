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
    <title>Karma Shop</title>

    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="/main/assets/css/linearicons.css">
    <link rel="stylesheet" href="/main/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/main/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/main/assets/css/font-awesome.min.css">
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
                    <h1>Login/Register</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Login/Register</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Login Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="/main/assets/img/login.jpg" alt="">
                        <div class="hover">
                            <h4>No account?</h4>
                            <!-- <p>There are advances being made in science and technology everyday, and a good example of
                                this is the</p> -->
                            <a class="primary-btn" href="/register">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="login_form_inner">
                        <h3>Log in </h3>
                        <form class="row login_form" action="/login/store" method="post" id="contactForm"
                            novalidate="novalidate">
                            <div class="col-lg-12">
                                @include('admin.alert')
                            </div>
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Username'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="f-option2" name="remember">
                                    <label for="f-option2">Keep me logged in</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Log In</button>
                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->

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