<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
@yield('title','Laravel Ecommerce Project');
    </title>
@include('frontend.partials.styles')
  </head>
  <body>

    <div class="wrapper">
    {{-- Navigation bar --}}

    @include('frontend.partials.nav')
{{--END NAV BAR--}}
@yield('contact')



@include('frontend.partials.footer')

    </div>

@include('frontend.partials.scripts')
@yield('script')
  </body>
</html>
