<!DOCTYPE html>
<html>
<head>
    <base href="{{ asset('asset/frontend') }}/">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title') | iceTea Shop</title>
    <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/home.css">
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript">
        $(function () {
            var pull = $('#pull');
            menu = $('nav ul');
            menuHeight = menu.height();

            $(pull).on('click', function (e) {
                e.preventDefault();
                menu.slideToggle();
            });
        });

        $(window).resize(function () {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    </script>
</head>
<body>
<!-- header -->
<header id="header">
    <div class="container">
        <div class="row">
            <div id="logo" class="col-md-3 col-sm-12 col-xs-12">
                <h1>
                    <a href="/"><img width="178" src="img/home/logo.png"></a>
                    <nav><a id="pull" class="btn btn-danger" href="#">
                            <i class="fa fa-bars"></i>
                        </a></nav>
                </h1>
            </div>

            <div id="search" class="col-md-7 col-sm-12 col-xs-12">
                <form action="{{ asset('search') }}">

                    <input type="text" name="q" placeholder="Nhập từ khóa ..." value="{{ $keyword_search ?? '' }}">
                    <input type="submit" value="Tìm Kiếm">

                </form>
            </div>

            <div id="cart" class="col-md-2 col-sm-12 col-xs-12">
                <a class="display" href="{{ asset('cart/show') }}">Giỏ hàng</a>
                <a href="{{ asset('cart/show') }}">{{ Cart::count() }}</a>
            </div>
        </div>
    </div>
</header><!-- /header -->
<!-- endheader -->

<!-- main -->
<section id="body">
    <div class="container">
        <div class="row">
            <div id="sidebar" class="col-md-3">
                <nav id="menu">
                    <ul>
                        <li class="menu-item">danh mục sản phẩm</li>

                        @foreach($categories as $category)
                            <li class="menu-item"><a
                                    href="{{ asset('category/' . $category->category_id . '/' . $category->slug . '.html') }}"
                                    title="{{ $category->name }}">{{ $category->name }}</a></li>
                        @endforeach

                    </ul>
                    <!-- <a href="#" id="pull">Danh mục</a> -->
                </nav>

                <div id="banner-l" class="text-center">
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
                    </div>
                    <div class="banner-l-item">
                        <a href="#"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
                    </div>
                </div>
            </div>

            <div id="main" class="col-md-9">
                <!-- main -->


                <!-- wrap-inner -->
            @yield('main')
            <!-- ./ wrap-inner -->

                <!-- end main -->
            </div>
        </div>
    </div>
</section>

<!-- endmain -->

<!-- footer -->
<footer id="footer">
    <div id="footer-t">
        <div class="container">
            <div class="row">
                <div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">
                    <a href="#"><img width="178" src="img/home/logo.png"></a>
                </div>
                <div id="about" class="col-md-3 col-sm-12 col-xs-12">
                    <h3>About us</h3>
                    <p class="text-justify">iceTea Academy thành lập năm 2020. Chúng tôi đào tạo chuyên sâu trong 2
                        lĩnh vực là Lập trình Website & Mobile nhằm cung cấp cho thị trường CNTT Việt Nam những lập
                        trình viên thực sự chất lượng, có khả năng làm việc độc lập, cũng như Team Work ở mọi môi trường
                        đòi hỏi sự chuyên nghiệp cao.</p>
                </div>
                <div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
                    <h3>Hotline</h3>
                    <p>Phone Sale: (+84) 0868 6633 15</p>
                    <p>Email: DinhHieu8896@gmail.com</p>
                </div>
                <div id="contact" class="col-md-3 col-sm-12 col-xs-12">
                    <h3>Contact Us</h3>
                    <p>Address 1: Thăng Long - Thành phố Vinh - Nghệ AN</p>
                    <p>Address 2: Thanh Xuân - Hà Nội</p>
                </div>
            </div>
        </div>
        <div id="footer-b">
            <div class="container">
                <div class="row">
                    <div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <p>Học viện Công nghệ iceTea - http://hieu-icetea.github.io</p>
                    </div>
                    <div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
                        <p>© 2020 iceTea Academy. All Rights Reserved</p>
                    </div>
                </div>
            </div>
            <div id="scroll">
                <a href="#"><img src="img/home/scroll.png"></a>
            </div>
        </div>
    </div>
</footer>
<!-- endfooter -->

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function () {
        FB.init({
            xfbml: true,
            version: 'v8.0'
        });
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="107928264386009"
     theme_color="#FF9600"
     logged_in_greeting="Xin chào! Làm thế nào tôi có thể giúp bạn?"
     logged_out_greeting="Xin chào! Làm thế nào tôi có thể giúp bạn?">
</div>

</body>
</html>
