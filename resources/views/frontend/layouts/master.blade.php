<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="no-js">
  <head>
    @include('frontend.layouts.head')

    @yield('head')

    @yield('style')

    @yield('head_script')

    {!! $setting->head_code !!}
  </head>
  <body class="@yield('body_class')">
    <div id="wrapper">
      @include('frontend.layouts.header')
        @yield('content')
      @include('frontend.layouts.footer')
    </div>

    @include('frontend.layouts.foot')
    @include('frontend.layouts.message')
    @yield('script')

    {!! $setting->body_code !!}
  </body>
</html>
