@if (Session::has('customMsg') || Session::has('customMsgText'))
  <div class="result">
    {{-- 程式備註 customMsgType = 'error' or 'success' --}}
    <div class="result-content {{Session::has('customMsgType')?Session::get('customMsgType'):''}}">
      <button class="btn result-close-btn result-close" type="button"><i class="ic ic-close"></i></button>
      <div class="result-inner">
        @if (Session::has('customMsg'))
          <div class="result-title">{!!Session::get('customMsg')!!}</div>
        @endif
        @if (Session::has('customMsgText'))
          <div class="result-txt">{!!Session::get('customMsgText')!!}</div>
        @endif
        <div class="result-btn">
            @if (Session::has('customMsgButton'))
                {!!Session::get('customMsgButton')!!}
            @else
                <button class="btn btn-style2 c1 result-close" type="button">確認</button>
            @endif
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
    customMsg({
        title:'{!!Session::has("success")?Session::get("success"):''!!}',
        text: '{!!Session::has("successText")?Session::get("successText"):''!!}',
        customButton: '{!!Session::has("successButton")?Session::get("successButton"):''!!}',
        confirmButtonText: '{{__("text.ok")}}',
    })
  });
</script>
@endif

@if (Session::has('error'))
<script type="text/javascript">
  $(window).on('load', function() {
    customMsg({
        title:'{!!Session::has("error")?Session::get("error"):''!!}',
        text: '{!!Session::has("errorText")?Session::get("errorText"):''!!}',
        customButton: '{!!Session::has("errorButton")?Session::get("errorButton"):''!!}',
        confirmButtonText: '{{__("text.close")}}',
    })
  });
</script>
@endif

@if (Session::has('payment_result'))
<script type="text/javascript">
  $(window).on('load', function() {
    customMsg({
        title:'{!!Session::has("payment_result")?Session::get("payment_result"):''!!}',
        text: '{!!Session::has("payment_resultText")?Session::get("payment_resultText"):''!!}',
        customButton: '{!!Session::has("payment_resultButton")?Session::get("payment_resultButton"):''!!}',
        confirmButtonText: '{{__("text.ok")}}',
    })
  });
</script>
@endif

@if (isset($errors) && count($errors))
  <script type="text/javascript">
    $(document).ready(function() {
      if ($('.has-error').length > 0) {
        var errorPos = $('.has-error').eq(0).offset().top - $('.site-title').outerHeight()-20;
        $('html, body').scrollTop(errorPos);
      }
    });
  </script>
@endif
