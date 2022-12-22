@if (Session::has('customMsg') || Session::has('customMsgText'))
  <div class="result">
    {{-- 程式備註 customMsgType = 'error' or 'success' --}}
    <div class="result-content {{Session::has('customMsgType')?Session::get('customMsgType'):''}}">
      <button class="btn result-close-btn result-close" type="button">關閉</button>
      <div class="result-inner">
        @if (Session::has('customMsg'))
          <div class="result-title">{!!Session::get('customMsg')!!}</div>
        @endif
        @if (Session::has('customMsgText'))
          <div class="result-txt">{!!Session::get('customMsgText')!!}</div>
        @endif
        <div class="result-btn">
          <button class="btn btn-primary result-close" type="button">確認</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    (function($) {
      $(window).on('load', function() {
        $('body').addClass('result-open');
      });
      $(document).on('click', function(e){
        if($(e.target).parents('.result').length==0 || $(e.target).parents('.result-close').length>0 || $(e.target).hasClass('result-close')){
          $('body').removeClass('result-open');
        }
      });
    })($)
  </script>
@endif
@if (Session::has('success'))
<script type="text/javascript">
  $(window).on('load', function() {
    // customMsg({
    //     title:"{!!Session::has('success')?Session::get('success'):''!!}",
    //     text: "{!!Session::has('successText')?Session::get('successText'):''!!}",
    //     confirmButtonText: "{{__('text.ok')}}",
    // })
    Swal.fire({
      title: "{!!Session::has('success')?Session::get('success'):''!!}",
      html: "{!!Session::has('successText')?Session::get('successText'):''!!}",
      icon: 'success',
      confirmButtonText:"確認"
    });
  });
</script>
@endif

@if (Session::has('error'))
<script type="text/javascript">
  $(window).on('load', function() {
    // customMsg({
    //     title:"{!!Session::has('error')?Session::get('error'):''!!}",
    //     text: "{!!Session::has('errorText')?Session::get('errorText'):''!!}",
    //     confirmButtonText: "{{__('text.close')}}",
    // })
    Swal.fire({
      title: "{!!Session::has('error')?Session::get('error'):''!!}",
      html: "{!!Session::has('errorText')?Session::get('errorText'):''!!}",
      icon: 'error',
      confirmButtonText:"關閉"
    });
  });
</script>
@endif
@if (isset($errors) && count($errors))
  <script type="text/javascript">
    $(document).ready(function() {
      if ($('.has-error').length > 0) {
        var errorPos = $('.has-error').eq(0).offset().top - ($('.login-toggle').is(':hidden')?$('.header').outerHeight()+50:0);
        $('html, body').scrollTop(errorPos);
      }
    });
  </script>
@endif
