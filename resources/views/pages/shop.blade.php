@extends('layouts.layout')

@section('title') Shop @endsection

@section('banner-h1') Shop @endsection
@section('banner-link')
<a href="{{ route('shop') }}">Shop</a>
@endsection

@section('additionalScripts')
<script src="{{asset('js/shop.js')}}"></script>
@endsection

@section('content')
<!--================Shop Area =================-->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Browse Categories</div>
                <div class="common-filter mt-3 ml-4">
                    <form action="#">
                        <ul>
                            @foreach($categories as $category)
                            <li class="filter-list"><input onchange="categoryUpdate()" class="pixel-radio" type="radio" value="{{ $category->id }}" id="category-{{ strtolower($category->name) }}" name="category"><label for="{{ strtolower($category->name) }}">{{ $category->name }}<span> ({{count($category->articles)}}) </span></label></li>
                            @endforeach
                        </ul>
                    </form>
                </div>
            </div>
            <div class="sidebar-filter mt-50">
                <div class="top-filter-head">Product Filters</div>
                <div class="common-filter">
                    <div class="head">Brand</div>
                    <form action="#">
                        <ul>
                            @foreach($brands as $brand)
                            <li class="filter-list"><input onchange="brandUpdate()" class="pixel-radio" type="radio" value="{{ $brand->id }}" id="brand-{{ strtolower($brand->name) }}" name="brand"><label for="{{ strtolower($brand->name) }}">{{ $brand->name }}<span> ({{count($brand->articles)}}) </span></label></li>
                            @endforeach
                        </ul>
                    </form>
                </div>
                <div class="common-filter">
                    <div class="head">Gender</div>
                    <form action="#">
                        <ul>
                            @foreach($genders as $gender)
                            <li class="filter-list"><input onchange="genderUpdate()" class="pixel-radio" type="radio" value="{{ $gender->id }}" id="gender-{{ strtolower($gender->gender) }}" name="gender"><label for="{{ strtolower($gender->gender) }}">{{ $gender->gender }}<span> ({{count($gender->articles)}}) </span></label></li>
                            @endforeach
                        </ul>
                    </form>
                </div>
                <div class="common-filter">
                    <div class="head">Price</div>
                    <div onmouseup="priceUpdate()" class="price-range-area">
                        <div id="price-range"></div>
                        <div class="value-wrapper d-flex">
                            <div class="price">Price:</div>
                            <span>$</span>
                            <div id="lower-value"></div>
                            <div class="to">to</div>
                            <span>$</span>
                            <div id="upper-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting">
                    <select id="sort" onchange="sortUpdate()">
                        <option value="new">Newly Added Products</option>
                        <option value="low">Price from low to high</option>
                        <option value="high">Price from high to low</option>
                    </select>
                </div>
                <div class="sorting mr-auto">
                    <div id="lower" style="display: none">@if(isset($lower)){{$lower}}@else 69 @endif</div>
                    <div id="upper" style="display: none">@if(isset($upper)){{$upper}}@else 329 @endif</div>
                </div>
                <div class="pagination">
                    {{ $articles->links() }}
                </div>
            </div>
            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row" id="articles">
                    @if(count($articles))
                    @foreach($articles as $article)
                    <!-- single product -->
                    <div class="col-lg-4 col-md-6">
                        <div class="single-product">
                            <img class="img-fluid" src="{{ asset($article->image) }}" alt="{{ $article->name }}">
                            <div class="product-details">
                                <h6>{{ strtoupper($article->name) }}</h6>
                                <div class="price">
                                    @if($article->sale_price)
                                    <h6 class="text-danger">${{ $article->sale_price }}</h6>
                                    <h6 class="l-through">${{ $article->price }}</h6>
                                    @else
                                    <h6>${{ $article->price }}</h6>
                                    @endif
                                </div>
                                <div class="prd-bottom">

                                    <a href="{{ route('product', ['id' => $article->id]) }}" class="social-info">
                                        <span class="ti-bag"></span>
                                        <p class="hover-text">select size</p>
                                    </a>
                                    <a href="{{ route('product', ['id' => $article->id]) }}" class="social-info">
                                        <span class="lnr lnr-move"></span>
                                        <p class="hover-text">view more</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="container-fluid text-center mt-5 mb-5">
                        <h4>There aren't any products with criterium you selected</h4>
                    </div>
                    @endif
                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="filter-bar d-flex flex-wrap align-items-center">
                <div class="sorting mr-auto">

                </div>
                <div class="pagination">
                    {{ $articles->links() }}
                </div>
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>
<!--================End Shop Area =================-->
<!-- Start related-product Area -->
<section class="related-product-area section_gap">
</section>
<!-- End related-product Area -->
@endsection
