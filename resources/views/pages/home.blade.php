@extends('layouts.layout')

@section('title') Home @endsection

@section('additionalCss')
<link rel="stylesheet" href="css/ion.rangeSlider.css" />
<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
<link rel="stylesheet" href="css/magnific-popup.css">
@endsection

@section('content')
<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Free Delivery</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon2.png" alt="">
                    </div>
                    <h6>Return Policy</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon3.png" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Latest Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                @foreach ($latest as $article)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ $article->image }}" alt="">
                        <div class="product-details">
                            <h6>{{ $article->name }}</h6>
                            <div class="price">
                                <h6>{{ $article->price }}</h6>
                                <!-- <h6 class="l-through">$210.00</h6> -->
                            </div>
                            <div class="prd-bottom">

                                <a href="{{route('product', ['id' => $article->id])}}" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">select size</p>
                                </a>
                                <a href="{{route('product', ['id' => $article->id])}}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view more</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Coming Products</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single product -->
                @foreach ($coming as $article)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{asset($article->image)}}" alt="">
                        <div class="product-details">
                            <h6>{{$article->name}}</h6>
                            <div class="price">
                                <h6>${{$article->price}}</h6>
                                <!-- <h6 class="l-through">$210.00</h6> -->
                            </div>
                            <div class="prd-bottom">

                                <a href="{{route('product', ['id' => $article->id])}}" class="social-info">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">select size</p>
                                </a>
                                <a href="{{route('product', ['id' => $article->id])}}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">view more</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- end product Area -->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Deals of the Week</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($sale as $article)
                    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                        <div class="single-related-product d-flex">
                            <a href="#"><img width="70px" src="{{asset($article->image)}}" alt=""></a>
                            <div class="desc">
                                <a href="#" class="title">{{$article->name}}</a>
                                <div class="price">
                                    <h6>${{$article->sale_price}}</h6>
                                    <h6 class="l-through">${{$article->price}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End related-product Area -->
@endsection

@section('additionalScripts')
<script src="{{ asset('js/countdown.js') }}"></script>
@endsection
