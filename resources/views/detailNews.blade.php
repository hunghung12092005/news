@extends('layouts.app')

@section('title', 'detail News')

@section('content')
    <style>
        :root {
            --side-padding: 50px;
            --main-color: #1890ff;
            --shadow-color: rgba(0, 0, 0, .1);
            --text-font-size: 18px;
        }

        p {
            font-size: var(--text-font-size);
        }

        .feature-image {
            height: 32rem;
            background-size: cover;
            -webkit-box-shadow: 0 40px 50px var(--shadow-color);
            -moz-box-shadow: 0 40px 50px var(--shadow-color);
            box-shadow: 0 40px 50px var(--shadow-color);
        }

        .site-main {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            background-color: #fff;
        }

        @media (min-width: 768px) {
            .site-main {
                width: 80%;
            }
        }

        @media (min-width: 992px) {
            .site-main {
                width: 70%;
            }
        }

        @media (min-width: 1200px) {
            .site-main {
                width: 50%;
            }
        }

        .drop-cap:first-letter {
            float: left;
            margin-right: 0.25em;
            color: #222;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 100px;
            line-height: 1;
        }

        .article-content {
            background-color: transparent;
            padding: 0;
        }

        .article-header {
            margin-top: -160px;
            background-color: #fff;
            box-shadow: 0 -23px 50px var(--shadow-color);
            padding: 50px var(--side-padding);
        }

        .featured-image-wrap {
            position: relative;

        }

        .entry-cats {
            margin-bottom: 10px;
        }

        .entry-cats a {
            display: inline-block;
            background: var(--main-color);
            text-decoration: none;
            color: white;
            padding: 4px 8px;
            font-weight: 500;
            text-transform: uppercase;

        }

        .entry-title {
            font-weight: 900;
        }

        .article-text-wrap {
            padding: 0 var(--side-padding);
        }

        /* .avatar {
                    vertical-align: middle;
                    width: 128px;
                    height: 128px;
                    border-radius: 50%;
                } */

        .avatar img {
            object-fit: cover;
            border-radius: 50%;
        }

        .author {
            margin-top: 25px;
            display: flex;
        }

        .inner-meta {
            margin-left: 20px;
            display: -webkit-flex;
            /* Safari */
            -webkit-justify-content: space-around;
            /* Safari 6.1+ */
            display: flex;
            flex-direction: column;
            justify-content: space-around;
        }

        .created-by {
            text-transform: uppercase;
            text-decoration: none;
            font-weight: 700;
            color: var(--main-color);
        }

        .created-at {
            color: grey;
        }

        .container {
            width: 60%;
        }

        .entry-summary {
            position: relative;
            font-size: 18px;
            padding-bottom: 55px;
            margin-bottom: 35px;
            color: #000;
            font-weight: 300;
            line-height: 1.55;
            font-style: italic;
        }

        .entry-summary:after {
            content: "..........................................";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            letter-spacing: 4px;
            color: var(--main-color);
            overflow: hidden;
        }

        .article-source {
            font-size: 18px;
        }

        .article-source a {
            color: #1890ff;
        }

        .share {
            padding-bottom: 20px;
        }

        .entry-footer {
            padding: 50px var(--side-padding);
        }

        .entry-footer .entry-tags a {
            margin-right: 8px;
            color: #757575;
            font-weight: 700;
            text-decoration: none;
            text-transform: uppercase;
        }

        .entry-footer .entry-tags a:before {
            content: "#";
            padding-right: 1px;
        }

        .links-meta {
            text-transform: uppercase;
            font-weight: 900;
        }
    </style>
    <div>
        @if ($detailNew->images->isNotEmpty())
            {{-- @foreach ($detailNew->images as $image) --}}
                <!-- Lặp qua từng hình ảnh -->
                {{-- <div class="feature-image">
                <img src="{{ asset($image->image_path) }}" alt="Image" class="photo">
            </div> --}}
                <div class="feature-image" style="background-image: url('{{ asset($latestImage->image_path) }}');">
                </div>
            {{-- @endforeach --}}
        @else
            <div class="feature-image"
                style="background-image: url('https://images.unsplash.com/photo-1504272017915-32d1bd315a59?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=56d2d331dda6740ccee0110106b82e9d&auto=format&fit=crop&w=2000&q=80');">
            </div>
        @endif
        {{-- <div class="feature-image"
            style="background-image: url('https://images.unsplash.com/photo-1504272017915-32d1bd315a59?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=56d2d331dda6740ccee0110106b82e9d&auto=format&fit=crop&w=2000&q=80');">
        </div> --}}
        <div class="container-fluid article-content">
            <div class="article-header site-main">
                <div class="entry-cats">
                    <a>{{ $detailNew->category->name }}</a>
                </div>
                <h1 class="entry-title">{{ $detailNew->title }}</h1>
                <div class="author">
                    <a class="avatar">
                       
                        @if ($detailNew->images->isNotEmpty())
                            {{-- @foreach ($detailNew->images as $image) --}}
                            <img height="80" width="80"
                            src="{{ asset($latestImage->image_path) }}" />
                            
                            {{-- @endforeach --}}
                        @else
                        <img height="80" width="80"
                        src="https://vignette.wikia.nocookie.net/redvelvet/images/6/65/Red_Velvet_Irene_The_Perfect_Red_Velvet_promo_picture_2.PNG/revision/latest?cb=20180127193447" />
                        @endif
                    </a>
                    <div class="inner-meta">
                        <span>By <a class="created-by">Irene</a></span>
                        <p class="created-at">{{ $detailNew->created_at }}</p>
                    </div>
                </div>
            </div>
            <div class="site-main article-text-wrap">
                <div class="entry-summary">{{ $detailNew->content }}.</div>
                <p class="drop-cap">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eu mollis tortor,
                    pellentesque dapibus ante. Etiam sed sapien pulvinar, consequat metus at, auctor enim. Donec ut ipsum
                    felis. Cras dignissim dolor ultrices massa ultrices dictum. Proin sed suscipit neque. Ut accumsan
                    lacinia iaculis. Pellentesque dapibus massa a cursus fermentum. Maecenas enim elit, convallis
                    scelerisque lacus tincidunt, egestas suscipit ante. Donec convallis eros massa, sed dignissim est
                    pharetra a. Donec pretium leo ligula, ut lobortis risus vehicula at.</p>
                <p>Nunc sem nisl, sollicitudin sed imperdiet id, fermentum quis lorem. Quisque arcu purus, laoreet non
                    consectetur sit amet, ornare in lectus. Nulla porta vel tortor fermentum pellentesque. Maecenas sed est
                    magna. Fusce ut dictum ex. Quisque fringilla tempus sapien, in egestas augue auctor sed. Class aptent
                    taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut lobortis hendrerit
                    lacinia.</p>
                <p>Nunc condimentum velit malesuada porttitor imperdiet. Proin iaculis lacus at venenatis commodo. Ut non
                    ipsum ullamcorper ipsum commodo lacinia sagittis quis lectus. Nam mollis semper mauris, eu semper nibh
                    vestibulum sed. Donec augue elit, placerat et mauris vel, finibus vestibulum leo. Pellentesque aliquam
                    ultricies dolor non fringilla. Nulla posuere sollicitudin efficitur. Nullam feugiat cursus imperdiet.
                    Vivamus faucibus ligula turpis, sollicitudin convallis massa posuere non. Phasellus sit amet viverra
                    ligula. Praesent non sem fermentum, volutpat lorem vel, posuere erat. Morbi sed diam feugiat, dignissim
                    purus sed, elementum mauris. Cras mollis leo non aliquam luctus.</p>
                <p>
                    Cras id diam laoreet ligula malesuada finibus. Suspendisse viverra mauris est, at venenatis dolor
                    elementum at. Aenean sit amet lorem in mauris lobortis tristique. Vivamus in porttitor nisl, ac
                    imperdiet elit. Nam non ex congue, varius eros pretium, faucibus sem. Nam sodales porta enim a maximus.
                    Nulla facilisi. Nulla efficitur risus commodo egestas efficitur. In hac habitasse platea dictumst.
                    Mauris mollis augue tellus, at porttitor urna fringilla eget. Nam sit amet rutrum ipsum. Quisque ac
                    placerat elit, a bibendum purus. Duis facilisis sapien nisi, in maximus ipsum lobortis ut. Proin rhoncus
                    elit pellentesque, iaculis tellus eu, vehicula tortor. Maecenas nec orci at nibh laoreet imperdiet.
                </p>
                <p>
                    Phasellus tortor sem, rutrum elementum nunc et, tristique feugiat enim. Sed dui erat, blandit ut nulla
                    nec, feugiat laoreet urna. Duis eu interdum lorem. Suspendisse luctus elit vel ligula mollis, vel
                    egestas orci congue. Morbi finibus arcu et porttitor blandit. Donec condimentum sapien nec nulla viverra
                    posuere. Suspendisse risus dolor, mollis nec nibh vitae, viverra molestie felis.
                </p>
                <p class="article-source"><small>Source: <a href="https://en.wikipedia.org/wiki/Fashion" target="_blank"
                            rel="noopener noreferrer">Wikipedia</a>.</small></p>
            </div>
            <div class="site-main entry-footer">
                <div class="share">
                    <div class="links-meta">Share this</div>
                    <div style="display: inline-flex; flex-direction: row; margin-top: 10px; justify-content: flex-start;">
                        <div style="padding-left: 5px;">
                            <div role="button" tabindex="0"
                                class="SocialMediaShareButton SocialMediaShareButton--facebook">
                                <div style="width: 35px; height: 35px;"><svg viewBox="0 0 64 64" fill="white"
                                        width="35" height="35" class="social-icon social-icon--facebook ">
                                        <g>
                                            <circle cx="32" cy="32" r="31" fill="#3b5998"></circle>
                                        </g>
                                        <g>
                                            <path
                                                d="M34.1,47V33.3h4.6l0.7-5.3h-5.3v-3.4c0-1.5,0.4-2.6,2.6-2.6l2.8,0v-4.8c-0.5-0.1-2.2-0.2-4.1-0.2 c-4.1,0-6.9,2.5-6.9,7V28H24v5.3h4.6V47H34.1z">
                                            </path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div style="padding-left: 5px;">
                            <div role="button" tabindex="0"
                                class="SocialMediaShareButton SocialMediaShareButton--twitter">
                                <div style="width: 35px; height: 35px;"><svg viewBox="0 0 64 64" fill="white"
                                        width="35" height="35" class="social-icon social-icon--twitter ">
                                        <g>
                                            <circle cx="32" cy="32" r="31" fill="#00aced"></circle>
                                        </g>
                                        <g>
                                            <path
                                                d="M48,22.1c-1.2,0.5-2.4,0.9-3.8,1c1.4-0.8,2.4-2.1,2.9-3.6c-1.3,0.8-2.7,1.3-4.2,1.6 C41.7,19.8,40,19,38.2,19c-3.6,0-6.6,2.9-6.6,6.6c0,0.5,0.1,1,0.2,1.5c-5.5-0.3-10.3-2.9-13.5-6.9c-0.6,1-0.9,2.1-0.9,3.3 c0,2.3,1.2,4.3,2.9,5.5c-1.1,0-2.1-0.3-3-0.8c0,0,0,0.1,0,0.1c0,3.2,2.3,5.8,5.3,6.4c-0.6,0.1-1.1,0.2-1.7,0.2c-0.4,0-0.8,0-1.2-0.1 c0.8,2.6,3.3,4.5,6.1,4.6c-2.2,1.8-5.1,2.8-8.2,2.8c-0.5,0-1.1,0-1.6-0.1c2.9,1.9,6.4,2.9,10.1,2.9c12.1,0,18.7-10,18.7-18.7 c0-0.3,0-0.6,0-0.8C46,24.5,47.1,23.4,48,22.1z">
                                            </path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div style="padding-left: 5px;">
                            <div role="button" tabindex="0"
                                class="SocialMediaShareButton SocialMediaShareButton--googlePlus">
                                <div style="width: 35px; height: 35px;"><svg viewBox="0 0 64 64" fill="white"
                                        width="35" height="35" class="social-icon social-icon--google ">
                                        <g>
                                            <circle cx="32" cy="32" r="31" fill="#dd4b39"></circle>
                                        </g>
                                        <g>
                                            <path
                                                d="M25.3,30.1v3.8h6.3c-0.3,1.6-1.9,4.8-6.3,4.8c-3.8,0-6.9-3.1-6.9-7s3.1-7,6.9-7c2.2,0,3.6,0.9,4.4,1.7l3-2.9c-1.9-1.8-4.4-2.9-7.4-2.9c-6.1,0-11.1,5-11.1,11.1s5,11.1,11.1,11.1c6.4,0,10.7-4.5,10.7-10.9c0-0.7-0.1-1.3-0.2-1.8H25.3L25.3,30.1z M49.8,28.9h-3.2v-3.2h-3.2v3.2h-3.2v3.2h3.2v3.2h3.2v-3.2h3.2">
                                            </path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div style="padding-left: 5px;">
                            <div role="button" tabindex="0"
                                class="SocialMediaShareButton SocialMediaShareButton--linkedin">
                                <div style="width: 35px; height: 35px;"><svg viewBox="0 0 64 64" fill="white"
                                        width="35" height="35" class="social-icon social-icon--linkedin ">
                                        <g>
                                            <circle cx="32" cy="32" r="31" fill="#007fb1"></circle>
                                        </g>
                                        <g>
                                            <path
                                                d="M20.4,44h5.4V26.6h-5.4V44z M23.1,18c-1.7,0-3.1,1.4-3.1,3.1c0,1.7,1.4,3.1,3.1,3.1 c1.7,0,3.1-1.4,3.1-3.1C26.2,19.4,24.8,18,23.1,18z M39.5,26.2c-2.6,0-4.4,1.4-5.1,2.8h-0.1v-2.4h-5.2V44h5.4v-8.6 c0-2.3,0.4-4.5,3.2-4.5c2.8,0,2.8,2.6,2.8,4.6V44H46v-9.5C46,29.8,45,26.2,39.5,26.2z">
                                            </path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="entry-tags"><span class="links-meta">Tags:</span>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">tag</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">cho</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">vui</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">chứ</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">không</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">có</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">gì</a>
                    <a href="https://www.gaikokujinnavi.com" rel="tag">cả</a>
                </div>
            </div>
        </div>
    </div>
@endsection
