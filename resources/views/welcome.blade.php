@extends('app')

@section('title', 'welcome')

@section('content')

    <!-- Begin Body -->
    <!-- Begin Header -->

    <!-- Clear Fix -->
    <div style="clear:both"></div>
    <!-- Begin Slider -->
    <div class="slider">
        <!-- Begin First Column -->
        @foreach ($topArticles as $top)
            <div class="column">
                @if ($top->images->isNotEmpty())
                    @foreach ($top->images as $image)
                        <!-- Lặp qua từng hình ảnh -->
                        <img class="photo" src="{{ asset($image->image_path) }}">
                    @endforeach
                @else
                    <img class="photo"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStLZyf9597XgxOb_8DYiqfhQkFR7w9LxZkrG6c4mh0HWSOsrzIiSo1M5PI-LLP4kH26r4&usqp=CAU"
                        alt="snowy-mountain" title="snowy-mountain">
                @endif

                <!-- Begin Content -->
                <div class="content">
                    <a class="category" href="{{ route('news-detail', $top->id) }}">{{ $top->category->name }}</a>
                    <a class="title" href="{{ route('news-detail', $top->id) }}">{{ $top->title }}</a>
                </div>
                <!-- End Content -->
            </div>
        @endforeach

    </div>
    <!-- End Slider -->
    <!-- Begin Page -->
    <div class="page">
        <!-- Begin news-column -->
        <div class="news-column">
            {{-- <form method="GET" action="{{ route('news-index') }} #per_page"> --}}
            <form id="personForm" method="GET" action="{{ route('news-index') }}#personForm">
                <label for="per_page">Số bài viết mỗi trang:</label>
                <select name="per_page" id="per_page" onchange="this.form.submit()">
                    <option value="3" {{ request('per_page', 3) == 3 ? 'selected' : '' }}>3</option>
                    <option value="5" {{ request('per_page', 3) == 5 ? 'selected' : '' }}>5</option>
                    <option value="10" {{ request('per_page', 3) == 10 ? 'selected' : '' }}>10</option>
                </select>
                <input type="hidden" name="category_id" value="{{ request('category_id') }}">
            </form>
            <!-- Begin First News -->
            @foreach ($articleModel as $Model)
                <div class="news" id="mountain">
                    <div class="head">
                        <a class="category" href="{{ route('news-detail', $Model->id) }}">{{ $Model->category->name }}</a>
                        <p>By</p>
                        <a class="auth" href="{{ route('news-detail', $Model->id) }}">Admin</a>
                        <p>| {{ $Model->updated_at }} |</p>
                        <a class="auth" href="{{ route('news-detail', $Model->id) }}">6 comments</a>
                    </div>
                    <!-- Clear Fix -->
                    <div style="clear:both"></div>
                    <h2 class="title">{{ $Model->title }}</h2>
                    @if ($Model->images->isNotEmpty())
                        @foreach ($Model->images as $image)
                            <!-- Lặp qua từng hình ảnh -->
                            <img src="{{ asset($image->image_path) }}" alt="Image" class="photo">
                        @endforeach
                    @else
                        <img class="photo"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRo7fPE1lCRB2EiVRBSDi6njAbUOA_BPyWJNA&s"
                            alt="snowy-mountain" title="snowy-mountain">
                    @endif

                    <p class="paragraph">{{ $Model->content }}.</p>
                    <!-- Begin Btn-ReadMore -->
                    <div class="btn-ReadMore">
                        <a href="{{ route('news-detail', $Model->id) }}">
                            View Detail
                        </a>
                    </div>
                    <!-- End Btn-ReadMore -->
                </div>
            @endforeach
            <!-- Hiển thị phân trang với Bootstrap -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $articleModel->appends(['category_id' => request('category_id'), 'per_page' => request('per_page')])->links('pagination::bootstrap-4') }}
                </ul>
            </nav>

        </div>
        <!-- End news-column -->
        <!-- Begin widget-column -->
        <div class="widget-column">
        </div>
        <!-- End widget-column -->
        <!-- Begin widget-column -->
        <div class="widget-column">
            <!-- Begin About Me Widget -->
            <div class="widget">
                <h2 class="title-widget">About me</h2>
                <img class="photo" src="https://www.trieuhaotravel.vn/Uploads/images/nttnhu/HQ%208-min_1.png_medium.webp"
                    alt="about-me" title="about-me">
                <p class="text">I am a blogger living in New York. This is my blog, where I share my knowledge about
                    creativity, photography, travel and lifestyle. Never miss out on new stuff.</p>
            </div>
            <!-- End About Me Widget -->
            <!-- Begin Newsletter Widget -->
            <div class="widget">
                <h2 class="title-widget">Newsletter</h2>
                <p class="text">Subscribe for our monthly roundup of great free resources and updates</p>
                <!-- Begin Form Email -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    <script>
                        window.onload = function() {
                            document.getElementById('sendMail').focus();
                        };
                    </script>
                @endif
                <form action="/send-email" method="POST" id="sendMail">
                    @csrf
                    <input class="email" type="email" name="email" placeholder="Your Email" required>
                    <input class="email" type="text" name="name" placeholder="Name" required>
                    <button class="btn-subscribe" type="submit">Send Email</button>
                </form>
                {{-- <form>
                        <input class="email" required type="email" placeholder="Email adress">
                        <input class="btn-subscribe" type="submit" value="subscribe">
                    </form> --}}
                <!-- End Form Email -->
            </div>
            <!-- End Newsletter Widget -->
            <!-- Begin Search Widget -->
            <div class="search" id="search">
                <form>
                    <input class="text" type="search">
                    <input class="btn" type="submit" value="search">
                </form>
            </div>
            <!-- End Search Widget -->
            <!-- Begin Category Widget -->
            <div class="widget">
                <h2 class="title-widget">Category</h2>
                <ul>
                    <form id="catogeryForm" method="GET" action="{{ route('news-index') }}#catogeryForm">
                        @csrf
                        {{-- <select name="category_id" id="category_id" onchange="this.form.submit()">
                                <option value="" {{ request('category_id') === null || request('category_id') === '' ? 'selected' : '' }}>All Catogery</option>
                                <option value="1" {{ request('category_id') == 1 ? 'selected' : '' }}>Landscape </option>
                                
                                <option value="2" {{ request('category_id') == 2 ? 'selected' : '' }}>Lifestyle</option>
                                <option value="3" {{ request('category_id') == 3 ? 'selected' : '' }}>Photography</option>
                                <option value="4" {{ request('category_id') == 4 ? 'selected' : '' }}>Travel</option>
                            </select>
                        <li><a href="#">Landscape (3)</a></li>
                        <li><a href="#">Lifestyle (3)</a></li>
                        <li><a href="#">Photography (3)</a></li>
                        <li><a href="#">Travel (3)</a></li> --}}
                        <li>
                            <a href="{{ route('news-index', ['category_id' => '']) }}"
                                class="{{ request('category_id') === null || request('category_id') === '' ? 'selected' : '' }}">
                                All Category
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news-index', ['category_id' => 1]) }}"
                                class="{{ request('category_id') == 1 ? 'selected' : '' }}">
                                Landscape
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news-index', ['category_id' => 2]) }}"
                                class="{{ request('category_id') == 2 ? 'selected' : '' }}">
                                Lifestyle
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news-index', ['category_id' => 3]) }}"
                                class="{{ request('category_id') == 3 ? 'selected' : '' }}">
                                Photography
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('news-index', ['category_id' => 4]) }}"
                                class="{{ request('category_id') == 4 ? 'selected' : '' }}">
                                Travel
                            </a>
                        </li>
                    </form>
                </ul>
            </div>
            <!-- End Category Widget -->
            <!-- Begin Recent Posts Widget -->
            <div class="widget">
                <h2 class="title-widget">Recent posts</h2>
                <form id="articleForm" method="GET" action="{{ route('news-index') }}#articleForm">
                    <label for="count">Lấy ra số bài:</label>
                    @csrf
                    <select name="count" id="count" onchange="this.form.submit()">
                        <option value="3" {{ request('count') == 3 ? 'selected' : '' }}>3</option>
                        <option value="5" {{ request('count') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('count') == 10 ? 'selected' : '' }}>10</option>
                    </select>
                </form>
                @foreach ($latestArticles as $last)
                    <a href="{{ route('news-detail', $last->id) }}">
                        <ul class="recent-posts">
                            <li>
                                @if ($last->images->isNotEmpty())
                                    @foreach ($last->images as $image)
                                        <!-- Lặp qua từng hình ảnh -->
                                        {{-- <img src="{{ asset($image->image_path) }}" alt="Image" class="photo"> --}}
                                        <img class="photo" src="{{ asset($image->image_path) }}" alt="snowy-mountain"
                                            title="snowy-mountain">
                                    @endforeach
                                @else
                                    <img class="photo"
                                        src="https://www.trieuhaotravel.vn/Uploads/images/nttnhu/HQ%208-min_1.png_medium.webp"
                                        alt="snowy-mountain" title="snowy-mountain">
                                @endif

                                <div class="element">
                                    <a class="title"
                                        href="{{ route('news-detail', $last->id) }}">{{ $last->title }}</a>
                                    <p class="date">{{ $last->created_at }}</p>
                                </div>
                                <!-- Clear Fix -->
                                <div style="clear:both"></div>
                            </li>
                        </ul>
                    </a>
                @endforeach

            </div>
            <!-- End Recent Posts Widget -->
        </div>
        <!-- End widget-column -->
    </div>
    <!-- End Page -->
    <!-- End Body -->

@endsection
