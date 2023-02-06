@extends('frontend.layouts.master')

@section('body_class','is-preload')

@section('content')
    <section id="banner">
        <div class="inner">
            <span class="image">
                <img src="{{$data->pic ?asset('uploads/'.$data->pic):asset('assets/images/workcase/case-detail-banner.jpg')}}" alt="" />
            </span>
            <header class="major">
                <h1>{{$data->title}}</h1>
            </header>
            <div class="content">
                <p>{{implode('、',$data->categories->pluck('title')->toArray())}}</p>
            </div>
        </div>
    </section>

<!-- Main -->
    <div id="main">
    <!-- One -->
        @if ($data->desc)
            <section id="one">
                <div class="inner">
                    <header class="major">
                        <h2>專案簡介</h2>
                    </header>
                    <p>{!!$data->desc!!}</p>
                </div>
            </section>
        @endif


    <!-- Two -->
        @if($data->text)
            <section id="two" class="spotlights">
                {!!$data->text!!}
                {{-- <section>
                    <a href="generic.html" class="image">
                        <img src="https://fakeimg.pl/960x860/" alt="" data-position="center center" />
                    </a>
                    <div class="content">
                        <div class="inner">
                            <header class="major">
                                <h3>Orci maecenas</h3>
                            </header>
                            <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa sed magna lacinia magna pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis tempus.</p>
                            <ul class="actions">
                                <li><a href="generic.html" class="button">Learn more</a></li>
                            </ul>
                        </div>
                    </div>
                </section>
                <section>
                    <a href="generic.html" class="image">
                        <img src="https://fakeimg.pl/960x860/" alt="" data-position="top center" />
                    </a>
                    <div class="content">
                        <div class="inner">
                            <header class="major">
                                <h3>Rhoncus magna</h3>
                            </header>
                            <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis magna sed nunc rhoncus condimentum sem. In efficitur ligula tate urna. Maecenas massa sed magna lacinia magna pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis tempus.</p>
                            <ul class="actions">
                                <li><a href="generic.html" class="button">Learn more</a></li>
                            </ul>
                        </div>
                    </div>
                </section> --}}
            </section>
        @endif

    <!-- Three -->
        @if ($data->url)
            <section id="three">
                <div class="inner">
                    {{-- <header class="major">
                        <h2>網站連結</h2>
                    </header> --}}
                    <ul class="actions">
                        <li><a href="{{$data->url}}" target="_blank" class="button next">點擊前往網站連結</a></li>
                    </ul>
                </div>
            </section>
        @endif
    </div>
@endsection
