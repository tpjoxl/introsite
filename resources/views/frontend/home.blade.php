<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @php
            // SEO Title
            $page_title = ($custom_page_title??$data->title);
            // SEO Description
            $page_description = ($data->seo_description??$data->description??$setting->seo_description);
            // SEO Keyword
            $page_keyword = ($data->seo_keyword??$setting->seo_keyword);
            // og image
            $page_pic = ($data->og_image[0]??$data->pic[0]??$setting->og_image[0]);
            // og title
            $page_og_title = ($data->og_title??$custom_page_title??$data->seo_title??$data->title??$setting->og_title??$setting->seo_title);
            $page_og_title .= ($page_og_title?' - ':'').$setting->name;
            // og description
            $page_og_description = ($data->og_description??$data->seo_description??$data->description??$setting->og_description??$setting->seo_description);
        @endphp
        <title>{{$page_title}}</title>

        <link rel="stylesheet" href="{{asset('assets/home/css/main.css')}}" />
        <noscript><link rel="stylesheet" href="{{asset('assets/home/css/noscript.css')}}" /></noscript>
        @include('_app_icon')
    </head>
    <body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">
				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-gem"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>HAO CHEN</h1>
                                {!!$setting->getData('siteset','hometxt')!!}
								{{-- <p>你好!我叫葦豪，是一位初出茅廬的後端工程師，<br>樂於吸收新知、開發後端技術，嚮往充滿活力且互相砥礪成長的團隊。<br>很高興能夠認識你，點擊下方資訊讓我們有更深刻的認識:)</p> --}}
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="{{route('about.index')}}">關於我</a></li>
								<li><a href="{{route('workcase.index')}}">專案成就</a></li>
								{{-- <li><a href="#blog">技術筆記</a></li> --}}
								<li><a href="{{route('contact.index')}}">與我聯絡</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">
					<!-- Work -->
						<article id="blog">
							<h2 class="major" style="text-align: center;">正在建置中，敬請期待</h2>
							<!-- <span class="image main"><img src="images/home/pic02.jpg" alt="" /></span> -->
							<!-- <p style="text-align: center;">正在建置中，敬請期待</p>						 -->
						</article>
					<!-- Contact -->
						{{-- <article id="contact">
							<h2 class="major">Contact</h2>
							<p>如有任何疑問、合作歡迎填寫表單與我聯絡!!!</p>
							<form method="post" action="#">
								<div class="fields">
									<div class="field half">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div>
								</div>
								<ul class="actions">
									<li><input type="submit" value="Send Message" class="primary" /></li>
									<li><input type="reset" value="Reset" /></li>
								</ul>
							</form>
							<ul class="icons">
								<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
							</ul>
						</article> --}}
					</div>
				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">聯絡信箱:<a href="mailto:{{$setting->getData('siteset','site_email')}}">{{$setting->getData('siteset','site_email')}}</a>　　&copy; {{$setting->getData('siteset','site_name')}}. All rights reserved. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
					</footer>
			</div>

		<!-- BG -->
			<div id="bg"></div>

            @include('frontend.layouts.message')

		<!-- Scripts -->
			<script src="{{asset('assets/home/js/jquery.min.js')}}"></script>
            <script src="{{asset('assets/home/js/browser.min.js')}}"></script>
            <script src="{{asset('assets/home/js/breakpoints.min.js')}}"></script>
            <script src="{{asset('assets/home/js/util.js')}}"></script>
            <script src="{{asset('assets/home/js/main.js')}}"></script>

	</body>
</html>
