<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Moschino')</title>
    <link rel='stylesheet' href='{{THEME_FONTEND_URL}}css/woocommerce-layout.css' type='text/css' media='all' />
    <link rel='stylesheet' href='{{THEME_FONTEND_URL}}css/woocommerce-smallscreen.css' type='text/css' media='only screen and (max-width: 768px)' />
    <link rel='stylesheet' href='{{THEME_FONTEND_URL}}css/woocommerce.css' type='text/css' media='all' />
    <link rel='stylesheet' href='{{THEME_FONTEND_URL}}css/font-awesome.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='{{THEME_FONTEND_URL}}style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Oswald:400,500,700%7CRoboto:400,500,700%7CHerr+Von+Muellerhoff:400,500,700%7CQuattrocento+Sans:400,500,700' type='text/css' media='all' />
    <link rel='stylesheet' href='{{THEME_FONTEND_URL}}css/easy-responsive-shortcodes.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>


<body class="archive post-type-archive post-type-archive-product woocommerce woocommerce-page">
    <div id="page">
        <div class="container">
            <header id="masthead" class="site-header">
                <div class="site-branding">
                    <h1 class="site-title"><a href="index.html" rel="home" style="font-size: 50px!important;">@yield('title', 'Moschino')</a></h1>
                    <h2 class="site-description">Honoring Vietnamese women</h2>
                </div>

            </header>
            <nav id="site-navigation" class="main-navigation" style="position: sticky;
    z-index: 100;
    top: 0px;">
                <button class="menu-toggle">Menu</button>
                <a class="skip-link screen-reader-text" href="#content">Skip to content</a>
                <div class="menu-menu-1-container">
                    <ul id="menu-menu-1" class="menu">
                        <li><a href="{{BASE_URL.'home'}}">Home</a></li>
                        <li><a href="{{BASE_URL.'blog'}}">Blog</a></li>
                        <li><a href="{{BASE_URL.'cart'}}">Cart</a></li>
                        <li><a href="{{BASE_URL.'contact'}}">Contact</a></li>
                        <li><a href="#">Account</a>
                            <ul class="sub-menu">
                                 <li><a href="{{BASE_URL.'admin/san-pham/view'}}">Admin </a></li>
                                <li><a href="{{BASE_URL.'order'}}">order management </a></li>
                                @if(!isset($_SESSION["AUTH_CLIENT"])|| empty($_SESSION["AUTH_CLIENT"]['id']))
                                <li><a href="{{BASE_URL.'login_client'}}">Login</a></li>
                                @elseif(isset($_SESSION["AUTH_CLIENT"])|| !empty($_SESSION["AUTH_CLIENT"]['id']))
                                <li><a href="{{BASE_URL.'logout_client'}}">Logout</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- #masthead -->
            @yield('main-content')
            <!-- #content -->
        </div>
        <!-- .container -->
        <footer id="colophon" class="site-footer">
            <div class="container">
                <div class="site-info">
                    <h1 style="font-family: 'Herr Von Muellerhoff';color: #ccc;font-weight:300;text-align: center;margin-bottom:0;margin-top:0;line-height:1.4;font-size: 120%!important;">Moschino</h1>
                    <a target="blank" href="https://www.wowthemes.net/">&copy; Honoring Vietnamese women.net</a>
                </div>
            </div>
        </footer>
        <a href="#top" class="smoothup" title="Back to top"><span class="genericon genericon-collapse"></span></a>
    </div>
    <!-- #page -->
    @include('layout.script')
    @yield('page-script')
</body>

</html>