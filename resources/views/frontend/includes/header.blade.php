<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="x-ua-compatible" content="ie=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
     
     <title>@yield('title',$content['system_title'])</title>
     <meta name="title" content="@yield('meta_title',$content['meta_title'])" />
     <meta name="keywords" content="@yield('meta_keywords',$content['meta_keywords'])" />
     <meta name="description" content="@yield('meta_description',$content['meta_description'])">
     <meta name="author" content="@yield('author')">
     <meta name="csrf-token" content="{{ csrf_token() }}" />
     <!-- site Favicon -->
     <link rel="icon" href="{{asset('storage/'.$content['system_icon'])}}" sizes="32x32" />
     <link rel="apple-touch-icon" href="{{asset('storage/'.$content['system_icon'])}}" />
     <meta name="msapplication-TileImage" content="{{asset('storage/'.$content['system_icon'])}}" />
     
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     
     <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/ecicons.min.css')}}" />

    <!-- css All Plugins Files -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/countdownTimer.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/slick.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/bootstrap.css')}}" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/demo1.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/frontend/css/responsive.css')}}" />
     @yield('css')
     
 </head>
 <body>
     {{-- <div id="ec-overlay"><span class="loader_img"></span></div> --}}
      <!-- Header start  -->
      <header class="ec-header">
        <!--Ec Header Top Start -->
        @include('frontend.includes.top_bar')
        <!-- Ec Header Top  End -->
        <!-- Ec Header Bottom  Start -->
        @include('frontend.includes.mobile_top_bar')
        <!-- Ec Header Button End -->
        <!-- Header responsive Bottom  Start -->
        <div class="ec-header-bottom d-lg-none">
            <div class="container position-relative">
                <div class="row ">

                    <!-- Ec Header Logo Start -->
                    <div class="col">
                        <div class="header-logo">
                            <a href="index.html"><img src="{{asset('assets/frontend/logo/logo.png')}}" alt="Site Logo" /><img
                                    class="dark-logo" src="{{asset('assets/frontend/logo/dark-logo.png')}}" alt="Site Logo"
                                    style="display: none;" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control ec-search-bar" placeholder="Search products..." type="text">
                                <button class="submit" type="submit"><img src="{{asset('assets/frontend/icons/search.svg')}}"
                                        class="svg_img header_svg" alt="icon" /></button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->
                </div>
            </div>
        </div>
        <!-- Header responsive Bottom  End -->
        <!-- EC Main Menu Start -->
        @include('frontend.includes.menu')
        <!-- Ec Main Menu End -->
        <!-- ekka Mobile Menu Start -->
        @include('frontend.includes.mobile_menu')
        <!-- ekka mobile Menu End -->
    </header>
    <!-- Header End  -->
    
    <x-frontend.side-cart :cartItems ="js_cart()"/>