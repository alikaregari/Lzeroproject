<div>
    <div class="g-recaptcha {{$errors->has('g-recaptcha-response') ? 'is-invalid' : ''}}" data-sitekey="{{env('GOOGLE_RECAPTCHA_SITE_KEY')}}"></div>
    @error('g-recaptcha-response')<div class="help-block with-errors">{{$message}}</div>@enderror
</div>
