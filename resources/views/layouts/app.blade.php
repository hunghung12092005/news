<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- CSS Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Acme">

</head>

<body>
    
 
    <div class="container">
        <div class="header">
            <!-- Begin Logo -->
            <div class="logo">Hung News</div>
            <!-- End Logo -->
            <!-- Begin Nav-Bar -->
            <div class="nav-bar">
                <ul class="menu-ul">
                    <li class="menu-li"><a class="m-2" href="{{ route('news-index') }}">Home</a></li>
                    {{-- <li class="menu-li">Pages
                        <ul class="sub-menu-ul">
                            <li class="sub-menu-li">About Me</li>
                            <li class="sub-menu-li">Archive</li>
                            <li class="sub-menu-li">Typography</li>
                            <li class="sub-menu-li">Fullwidth</li>
                            <li class="sub-menu-li">Shortcodes</li>
                            <li class="sub-menu-li"><a href="#search">Search</a></li>
                            <li class="sub-menu-li">404</li>
                        </ul>
                    </li> --}}
                    {{-- <li class="menu-li">Post Types
                        <ul class="sub-menu-ul">
                            <li class="sub-menu-li">Fullwidth Image Post</li>
                            <li class="sub-menu-li">Image Post</li>
                            <li class="sub-menu-li">Vimeo Post</li>
                            <li class="sub-menu-li">Youtube Post</li>
                            <li class="sub-menu-li">Fullwidth Youtube Post</li>
                        </ul>
                    </li> --}}
                    {{-- <li class="menu-li">Category
                        <ul class="sub-menu-ul">
                            <li class="sub-menu-li">Travel</li>
                            <li class="sub-menu-li">Lifestyle</li>
                            <li class="sub-menu-li">Landscape</li>
                            <li class="sub-menu-li">Photography</li>
                        </ul>
                    </li> --}}
                    <li class="menu-li"><a href="">Contact</a></li>
                        @if (session('name'))
                            <li class="menu-li">
                                <li class="menu-li">Xin chào , {{ session('name') }}!</li>
                                {{-- <p>Xin chào, {{ session('name') }}!</p> --}}
                                <form action="{{ route('logout') }}" method="get" style="display:inline;">
                                    @csrf
                                    <li class="menu-li"><a href="{{ route('logout') }}">Đăng Xuất</a></li>
                                </form>
                                @if (session('admin'))
                                <li class="menu-li"><a href="{{ route('admin.index') }}">Vào admin</a></li>
                                @endif                                   
                                <li class="menu-li"><a href="{{ route('user.account') }}">Account</a></li>
                            </li>
                       
                        @else
                            <li class="menu-li"><a href="{{ route('login') }}">Đăng Nhập & Đăng Ký</a></li>
                        @endif
                    {{-- <li class="menu-li">Contact</li> --}}
                </ul>
            </div>
            <!-- End Nav-Bar -->
        </div>
        <!-- End Header -->
        @yield('content')
        
    </div>

    <!-- JS Bootstrap -->
    @stack('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>