@extends('layouts.layout')

@section('title') Cart @endsection

@section('banner-h1') Cart @endsection
@section('banner-link')
    <a href="{{ route('cart') }}">Cart</a>
@endsection

@section('content')
    @if(Session::has('cart'))
{{--        <div class="alert alert-success">--}}
{{--            {{dd(Session::get('cart'))}}--}}
{{--        </div>--}}
    @endif
    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                @if(session()->has('cartItems') && count(session()->get('cartItems')))
{{--                {{dd(session()->get('cartItems'))}}--}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session()->get('cartItems') as $cartItem)
                        <tr>
                            <td>
                                <div>
                                    <div>
                                        <img class="img-fluid" style="width: 70px" src="{{$cartItem->product->image}}" alt="{{$cartItem->product->name}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{$cartItem->product->name}}
                            </td>
                            <td>
                                <h5>{{$cartItem->size}}</h5>
                            </td>
                            <td>
                                <h5>${{$cartItem->product->current_price}}</h5>
                            </td>
                            <td>
                                <a class="text-danger" href="{{route('remove-from-cart', ['id' => $cartItem->product->id])}}">x</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>${{$subtotal}}</h5>
                            </td>
                        </tr>
                        <tr class="out_button_area">
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{route('shop')}}">Continue Shopping</a>
                                    @if(session()->has('user'))
                                        <button type="submit" class="primary-btn border-0" value="c">Proceed to checkout</button>
                                    @else
                                    <a class="primary-btn" href="{{ route('login') }}">Login to checkout</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                @else
                    <h2 class="text-center mt-5">Your cart is empty.</h2>
                    <div class="w-100 text-center mt-5 mb-5">
                        <a class="primary-btn " href="{{route("shop")}}">Jump to shop</a>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection

