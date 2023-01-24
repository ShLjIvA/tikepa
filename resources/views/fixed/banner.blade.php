<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>@yield('banner-h1')</h1>
{{--                <h1>Login/Register</h1>--}}
                <nav class="d-flex align-items-center">
                    <a href="{{ route('home') }}">Home<span class="lnr lnr-arrow-right"></span></a>
                    @yield('banner-link')
{{--                    <a href="category.html">Login/Register</a>--}}
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
