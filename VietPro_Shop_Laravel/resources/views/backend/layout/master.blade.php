<!DOCTYPE html>
<html>
<head>
    <base href="{{ asset('asset/backend') }}/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - @yield('title') | iceTea shop</title>
    <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <script type="text/javascript" src="ckeditor_4.14.1_standard/ckeditor.js"></script>
    <script src="js/lumino.glyphs.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('admin') }}">iceTea-Shop Admin</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg>
                        {{ Auth::user()->name ?? 'Chưa đăng nhập' }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}">
                                <svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li role="presentation" class="divider"></li>
        <li class="{{ (request()->segment(2) == '') ? 'active' : '' }}">
            <a href="{{ route('admin') }}">
                <svg class="glyph stroked dashboard-dial">
                    <use xlink:href="#stroked-dashboard-dial"></use>
                </svg>
                Trang chủ
            </a>
        </li>
        <li class="{{ (request()->segment(2) == 'product') ? 'active' : '' }}">
            <a href="{{ Route::has('product') ? route('product') : url('/404') }}">
                <svg class="glyph stroked calendar">
                    <use xlink:href="#stroked-calendar"></use>
                </svg>
                Sản phẩm
            </a>
        </li>
        <li class="{{ (request()->segment(2) == 'category') ? 'active' : '' }}">
            <a href="{{ route('category') }}">
                <svg class="glyph stroked line-graph">
                    <use xlink:href="#stroked-line-graph"></use>
                </svg>
                Danh mục
            </a>
        </li>
        <li role="presentation" class="divider"></li>
    </ul>

</div><!--/.sidebar-->

@yield('main')


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>
<script src="js/easypiechart.js"></script>
<script src="js/easypiechart-data.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
    $('#calendar').datepicker({});

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>

<script src="js/myscript.js"></script>
</body>

</html>
