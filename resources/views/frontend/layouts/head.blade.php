<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">
@php
  $page_title = $custom_page_title;
  // SEO Title
  // SEO Description
  $page_description = $custom_page_description;
  // SEO Keyword
  $page_keyword = $custom_page_keyword;
  // og image
//   $page_pic = ($data->og_image[0]??$data->pic[0]??$setting->og_image[0]);
  // og title
  $page_og_title = $custom_page_title;
  // og description
  $page_og_description = $custom_page_description;
@endphp
<title>{{$page_title}}</title>

{{-- @if(isset($data->meta_robots))
  <meta name="robots" content="{{$data->meta_robots}}">
@elseif(isset($setting->meta_robots))
  <meta name="robots" content="{{$setting->meta_robots}}">
@endif --}}

<meta name="keywords" content="{{$page_keyword}}">
<meta name="description" content="{{$page_description}}">
<meta name="copyright" content="Copyrights © {{ $setting->getData('siteset','site_name')}} All Rights Reserved">
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

<meta property="og:title" content="{{$page_og_title}}">
<meta property="og:type" content="website">
{{-- @if ($page_pic)
  <meta property="og:image" content="{{asset($page_pic)}}">
@endif --}}
<meta property="og:url" content="{{url()->full()}}">
<meta property="og:description" content="{{$page_og_description}}">

<meta property="og:site_name" content="{{ $setting->getData('siteset','site_name')}} ">

<link rel="canonical" href="{{request()->url()}}">

@include('_app_icon')

{{-- @if (count($lang_datas)>1)
  @foreach ($setting->present()->langUrl(isset($data) && !is_null($data) ? $data : null) as $lang_code => $url)
    <link rel="alternate" href="{{$url}}" hreflang="{{$lang_code}}">
  @endforeach
@endif --}}



<link rel="stylesheet" href="{{asset('assets/workcase/css/main.css')}}" />
<noscript><link rel="stylesheet" href="{{asset('assets/workcase/css/noscript.css')}}" /></noscript>

{{-- <script src="{{ asset('js/modernizr.js') }}"></script> --}}
{{-- <script src='https://www.google.com/recaptcha/api.js'></script> --}}
<script>
    window.App = {!! json_encode([
      'csrfToken' => csrf_token(),
      'homeUrl' => route('home'),
      'locale' => explode('-', app()->getLocale())[0],
      'text' => [
          'ok' => __('text.ok'),
          'close' => __('text.close'),
      ]
    ]) !!};
</script>
