@extends('frontend.layouts.master')

@section('body_class','is-preload')

@section('content')
    <section id="banner" class="major">
        <div class="inner">
            <span class="image">
                <img src="{{asset('assets/images/workcase/banner3.jpg')}}" alt="" />
            </span>
            <header class="major">
                <h1>專案成就</h1>
            </header>
            <div class="content">
                <p>過去任職為後端工程師完成的專案成就</p>
                <!-- <ul class="actions">
                    <li><a href="#one" class="button next scrolly">Get Started</a></li>
                </ul> -->
            </div>
        </div>
    </section>

<!-- Main -->
    <div id="main">

    <!-- One -->
        <section id="one" class="tiles">
            @foreach ($items as $key=>$item)
                <article>
                    <span class="image">
                        <img src="{{$item->pic?$item->getImage():asset('assets/images/workcase/case'.($key+1).'.jpeg')}}" alt="" />
                    </span>
                    <header class="major">
                        <h3><a href="{{route('workcase.detail',['slug' => $item->title])}}" class="link">{{$item->title}}</a></h3>
                        <p>{{implode('、',$item->categories->pluck('title')->toArray())}}</p>
                    </header>
                </article>
            @endforeach

            {{-- <article>
                    <span class="image">
                        <img src="images/workcase/case1.jpeg" alt="" />
                    </span>
                    <header class="major">
                        <h3><a href="workcase-detail.html" class="link">德語教學平台</a></h3>
                        <p>線上教學網站</p>
                    </header>
                </article>
            <article>
                <span class="image">
                    <img src="images/workcase/case2.jpeg" alt="" />
                </span>
                <header class="major">
                    <h3><a href="workcase-detail.html" class="link">泰宇出版社</a></h3>
                    <p>品牌形象、系統服務網站</p>
                </header>
            </article>
            <article>
                <span class="image">
                    <img src="images/workcase/case3.jpeg" alt="" />
                </span>
                <header class="major">
                    <h3><a href="workcase-detail.html" class="link">迎曦基金會</a></h3>
                    <p>品牌形象、系統服務網站</p>
                </header>
            </article>
            <article>
                <span class="image">
                    <img src="images/workcase/case4.jpeg" alt="" />
                </span>
                <header class="major">
                    <h3><a href="workcase-detail.html" class="link">寶二水庫</a></h3>
                    <p>系統服務網站</p>
                </header>
            </article>
            <article>
                <span class="image">
                    <img src="images/workcase/case5.jpeg" alt="" />
                </span>
                <header class="major">
                    <h3><a href="workcase-detail.html" class="link">信元製藥</a></h3>
                    <p>品牌形象、系統服務網站</p>
                </header>
            </article>
            <article>
                <span class="image">
                    <img src="images/workcase/case6.jpeg" alt="" />
                </span>
                <header class="major">
                    <h3><a href="workcase-detail.html" class="link">南國生活節</a></h3>
                    <p>一頁式活動網站</p>
                </header>
            </article> --}}
        </section>

    <!-- Two -->
        {{-- <section id="two">
            <div class="inner">
                <header class="major">
                    <h2>Massa libero</h2>
                </header>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet pharetra et feugiat tempus.</p>
                <!-- <ul class="actions">
                    <li><a href="workcase-detail.html" class="button next">Get Started</a></li>
                </ul> -->
            </div>
        </section> --}}

    </div>
@endsection
