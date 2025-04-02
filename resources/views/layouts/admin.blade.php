<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="" />
        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}"> --}}
    @stack('styles')
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">

                <!-- <div id="preload" class="preload-container">
    <div class="preloading">
        <span></span>
    </div>
</div> -->

                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{ route('admin.index') }}" id="site-logo-inner">
                            {{-- <img class="" id="logo_header" alt="" src="{{ asset('images/logo/logo.jpg') }}"
                                data-light="{{ asset('images/logo/logo.jpg') }}" data-dark="{{ asset('images/logo/logo.jpg') }}"> --}}
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.index') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            <ul class="menu-list">
                                
                                {{-- <li class="menu-item has-children">
                                    <a href="javascript:void(0);" class="menu-item-button">
                                        <div class="icon"><i class="icon-layers"></i></div>
                                        <div class="text">Thiết bị</div>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.category.add') }}" class="">
                                                <div class="text">Thêm mới</div>
                                            </a>
                                        </li>
                                        <li class="sub-menu-item">
                                            <a href="{{ route('admin.categories') }}" class="">
                                                <div class="text">Thiết bị</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('admin.coupons') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Line phê duyệt</div>
                                    </a>
                                </li> --}}


                                <li class="menu-item">
                                    <a href="" class="">
                                        <div class="icon"><i class="icon-user"></i></div>
                                        <div class="text">User</div>
                                    </a>
                                </li>

                                <li class="menu-item">
                                    <a href="" class="">
                                        <div class="icon"><i class="icon-settings"></i></div>
                                        <div class="text">Settings</div>
                                    </a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="index-2.html">
                                    {{-- <img class="" id="logo_header_mobile" alt="" src="{{ asset('images/logo/logo.jpg') }}"
                                        data-light="{{ asset('images/logo/logo.jpg') }}" data-dark="{{ asset('images/logo/logo.jpg') }}"
                                        data-width="154px" data-height="52px" data-retina="{{ asset('images/logo/logo.jpg') }}"> --}}
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search"
                                            name="name" id="search-input" tabindex="2" value=""
                                            aria-required="true" required="">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search">
                                        <ul id="box-content-search">

                                        </ul>
                                    </div>
                                </form>

                            </div>
                          
                        </div>
                    </div>
                    <div class="main-content">
                        @yield('content')

                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script> --}}
    {{-- <script>
        $(function() {
            $("#search-input").on("keyup", function() {
                var searchKey = $(this).val();
                if (searchKey.length > 2) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('admin.search') }}",
                        data: {
                            query: searchKey
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#box-content-search").html('');
                            $.each(data, function(index, item) {
                                var url =
                                    "{{ route('admin.product.edit', ['id' => 'product_id']) }}";
                                var link = url.replace('product_id', item.id);

                                $("#box-content-search").append(`
                      <li class="product-item gap14 mb-10">
                        <a href="${link}">
                          <div class="image no-bg">
                              <img src="{{ asset('uploads/products/thumbnails') }}/${item.image}" alt="${item.name}">
                          </div>
                          <div class="flex items-center gap20 flex-grow">
                              <div class="name">
                                  <a href="${link}" class="body-text">${item.name}</a>
                              </div>
                          </div>
                          </a>
                      </li>
                      <li class="mb-10">
                          <div class="divider"></div>
                      </li>
                    `);
                            });
                        }
                    });
                }
            });
        })
    </script> --}}
    {{-- <script src="{{ asset('js/main.js') }}"></script> --}}

    @stack('scripts');
</body>

</html>
