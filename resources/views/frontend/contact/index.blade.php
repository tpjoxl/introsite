@extends('frontend.layouts.master')

@section('body_class','is-preload')

@section('head_script')
  <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')
    <section id="banner">
        <div class="inner">
            <span class="image">
                <img src="{{asset('assets/images/workcase/contact-banner.jpg')}}" alt="" />
            </span>
            <header class="major">
                <h1>與我聯絡</h1>
            </header>
            <div class="content">
                <p>如有任何疑問、合作歡迎填寫表單與我聯絡!!!</p>
            </div>
        </div>
    </section>

<!-- Contact -->
    <section id="contact">
        <div class="inner">
            <section>
                <form method="post" action="{{route('contact.submit')}}">
                    @csrf
                    <div class="fields">
                        <div class="field half">
                            <label for="name">姓名</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" required/>
                        </div>
                        <div class="field half">
                            <label for="email">電子郵件</label>
                            <input type="text" name="email" id="email" value="{{old('email')}}" required/>
                        </div>
                        <div class="field">
                            <label for="message">訊息</label>
                            <textarea name="message" id="message" rows="6" required>{{old('message')}}</textarea>
                        </div>
                        <div class="field half">
                            <div class="captcha @error('g-recaptcha-response') has-error @enderror">
                                <div class="g-recaptcha" data-sitekey="{{ env('RE_CAP_SITE') }}"></div>
                            </div>
                        </div>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="送出" class="primary" /></li>
                        <!-- <li><input type="reset" value="Clear" /></li> -->
                    </ul>
                </form>
            </section>
            <section class="split">
                <section>
                    <div class="contact-method">
                        <span class="icon solid alt fa-envelope"></span>
                        <h3>Email</h3>
                        <a href="mailto:howardtuo@gmail.com">howardtuo@gmail.com</a>
                    </div>
                </section>
                {{-- <section>
                    <div class="contact-method">
                        <span class="icon solid alt fa-phone"></span>
                        <h3>Phone</h3>
                        <span>(000) 000-0000 x12387</span>
                    </div>
                </section> --}}
                <!-- <section>
                    <div class="contact-method">
                        <span class="icon solid alt fa-home"></span>
                        <h3>Address</h3>
                        <span>1234 Somewhere Road #5432<br />
                        Nashville, TN 00000<br />
                        United States of America</span>
                    </div>
                </section> -->
            </section>
        </div>
    </section>
@endsection
