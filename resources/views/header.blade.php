 <header class="header_area sticky-header">
     <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light main_box">
             <div class="container">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <a class="navbar-brand logo_h" href="index.html"><img src="/main/assets/img/logo.png" alt="" /></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                     <ul class="nav navbar-nav menu_nav ml-auto">
                         <li class="nav-item">
                             <a class="nav-link" href="/">Home</a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="/categories">
                                 Category</a>
                         </li>
                         <!-- <li class="nav-item">
                                <a class="nav-link" href="checkout.html">Product Checkout</a>
                            </li> -->
                         <li class="nav-item">
                             <?php
                                $username = Session::get('username');
                                if($username != NULL){

                               
                            ?>
                             <a class="nav-link" href="/show_cart"> Cart</a>
                             <?php
                                }else{    
                             ?>
                             <a class="nav-link" href="/login"> Cart</a>
                             <?php
                                }   
                             ?>
                         </li>

                         </li>
                         <!-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="blog.html">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="single-blog.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li> -->
                         <!-- <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.html">Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="tracking.html">Tracking</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="elements.html">Elements</a>
                                    </li>
                                </ul>
                            </li> -->
                         <li class="nav-item">
                             <a class="nav-link" href="/contact">Contact</a>
                         </li>

                     </ul>
                     <ul class="nav navbar-nav navbar-right">
                         <li class="nav-item">
                             <button class="search">
                                 <span class="lnr lnr-magnifier" id="search"></span>
                             </button>
                         </li>
                         <li class="nav-item">
                             <?php 
                                $customer_name = Session::get('username');
                                if($customer_name != NULL){

                                
                                ?>
                             <a href="" class="user ml-3"><i class='bx bxs-user'></i><span
                                     class="ml-1">{{$customer_name}}</span></a>
                             <a href="/log_out" class="user ml-3"><i class='bx bx-exit'></i></a>
                             <?php
                                        }else {
                                ?>
                             <a href="/login" class="user ml-3"><i class='bx bxs-user'></i><span class="ml-1">Log
                                     in</span></a>
                             <?php
                                        }
                                ?>
                         </li>

                     </ul>
                 </div>
             </div>
         </nav>
     </div>
     @include('search.search')
 </header>