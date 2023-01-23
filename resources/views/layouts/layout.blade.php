<!DOCTYPE html>
<html lang="en" class="no-js">

@include('fixed.head')

<body>

@include('fixed.header')

@if(request()->routeIs('home'))
    @include('fixed.homeBanner')
@else
    @include('fixed.banner')
@endif

@yield('content')

<!-- start footer Area -->
@include('fixed.footer')
<!-- End footer Area -->

@include('fixed.scripts')
</body>

</html>
