@extends('frontend.layouts.master')

@section('body_class','is-preload')

@section('content')
    <section id="banner">
        <div class="inner">
            <span class="image">
                <img src="{{asset('assets/images/workcase/about-banner.jpg')}}" alt="" />
            </span>
            <header class="major">
                <h1>關於我</h1>
            </header>
            <!-- <div class="content">
                <p>Lorem ipsum dolor sit amet nullam consequat<br />
                sed veroeros. tempus adipiscing nulla.</p>
            </div> -->
        </div>
    </section>

    <div id="main">
        <section id="one">
            <div class="inner">
                {!!$data->getData('about', 'text1')!!}
                {{-- <h2 id="content">個人自介</h2>
                <div class="row">
                    <div class="col-8 col-12-small">
                        <p>Praesent ac adipiscing ullamcorper semper ut amet ac risus. Lorem sapien ut odio odio nunc. Ac adipiscing
                            nibh porttitor erat risus justo adipiscing adipiscing amet placerat accumsan. Vis. Faucibus odio magna
                            tempus adipiscing a non. In mi primis arcu ut non accumsan vivamus ac blandit adipiscing adipiscing arcu
                            metus praesent turpis eu ac lacinia nunc ac commodo gravida adipiscing eget accumsan ac nunc adipiscing
                            adipiscing.</p>
                    </div>
                    <div class="col-4"><span class="image fit"><img src="https://fakeimg.pl/330x300/" alt="" /></span></div>
                    <div class="col-4"><span class="image fit"><img src="https://fakeimg.pl/330x300/" alt="" /></span></div>
                    <div class="col-8 col-12-small">
                        <h3>求學時期</h3>
                        <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non
                            faucibus ornare mi ut ante amet placerat aliquet. Volutpat commodo eu sed ante lacinia. Sapien a
                            lorem in integer ornare praesent commodo adipiscing arcu in massa commodo lorem accumsan at odio
                            massa ac ac. Semper adipiscing varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
                    </div>
                </div>
                <br>
                <h2>工作經歷</h2>
                <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non
                    faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan
                    varius montes viverra nibh in adipiscing blandit tempus accumsan.</p> --}}
            </div>
        </section>
        <section id="two">
            <div class="inner">
                {!!$data->getData('about', 'text2')!!}
                {{-- <h2 id="elements">技能專長</h2>
                <div class="row gtr-200">
                    <div class="col-12 col-12-medium">
                        <!-- Text stuff -->
                        <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non
                            faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan
                            varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
                        <div class="row">
                            <div class="col-4 col-12-small">
                                <h3>Lists</h3>
                                <ul>
                                    <li>Dolor etiam magna etiam.</li>
                                    <li>Sagittis lorem eleifend.</li>
                                    <li>Felis dolore viverra.</li>
                                </ul>
                            </div>
                            <div class="col-4 col-12-small">
                                <h3>Lists</h3>
                                <ol>
                                    <li>Dolor etiam magna etiam.</li>
                                    <li>Etiam vel lorem sed viverra.</li>
                                    <li>Felis dolore viverra.</li>
                                    <li>Dolor etiam magna etiam.</li>
                                    <li>Etiam vel lorem sed viverra.</li>
                                    <li>Felis dolore viverra.</li>
                                </ol>
                            </div>
                            <div class="col-4 col-12-small">
                                <h3>Lists</h3>
                                <ol>
                                    <li>Dolor etiam magna etiam.</li>
                                    <li>Etiam vel lorem sed viverra.</li>
                                    <li>Felis dolore viverra.</li>
                                    <li>Dolor etiam magna etiam.</li>
                                    <li>Etiam vel lorem sed viverra.</li>
                                    <li>Felis dolore viverra.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section>
        <section id="three">
            <div class="inner">
                {!!$data->getData('about', 'text3')!!}
                {{-- <h2 id="elements">專案經歷</h2>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>專案名稱</th>
                                <th>專案開始月份</th>
                                <th>專案簡述</th>
                                <th>負責內容</th>
                                <th>網站連結</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                            <tr>
                                <td>信元製藥</td>
                                <td>Ante turpis integer aliquet porttitor.</td>
                                <td>29.99</td>
                                <td>29.99</td>
                                <td><a href="#">點擊前往</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div> --}}
                <ul class="actions">
                    <li><a href="{{route('workcase.index')}}" class="button next">想看更詳細的專案成就介紹</a></li>
                </ul>
            </div>
        </section>
    </div>
@endsection
