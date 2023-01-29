@extends('layouts.layout')

@section('title') Checkout @endsection

@section('banner-h1') Checkout @endsection
@section('banner-link')
    <a href="{{ route('checkout') }}">Checkout</a>
@endsection

@section('content')
    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-7">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="{{ route('finish-order') }}" method="post" novalidate="novalidate">
                            @csrf
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="number" placeholder="Phone number" value="{{old('number')}}">
                                @if($errors->has('number'))
                                    <span class="error">* {{$errors->first("number")}}</span>
                                @endif
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" value="{{old('zip')}}">
                                @if($errors->has('zip'))
                                    <span class="error">* {{$errors->first("zip")}}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address line" value="{{old('address')}}">
                                @if($errors->has('address'))
                                    <span class="error">* {{$errors->first("address")}}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City" value="{{old('city')}}">
                                @if($errors->has('city'))
                                    <span class="error">* {{$errors->first("city")}}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                @if(session()->has('error-msg'))
                                    <div class="alert alert-warning" role="alert">
                                        <span>{{session()->get('error-msg')}}</span>
                                    </div>
                                @endif
                                @if(session()->has('success-msg'))
                                    <div class="alert alert-success" role="alert">
                                        <span>{{session()->get('success-msg')}}</span>
                                    </div>
                                @endif
                            </div>
                            @if(!session()->has('success-msg'))
                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn border-0">Finish order</button>
                            </div>
                            @endif
                        </form>
                    </div>
                    <div class="col-lg-5">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><a href="#">Product <span>Total</span></a></li>
                                @if(session()->has('cartItems'))
                                    @foreach(session()->get('cartItems') as $cartItem)
                                        <li><a href="#">{{$cartItem->product->name}} <span class="middle"></span> <span class="last">${{$cartItem->product->current_price}}</span></a></li>
                                    @endforeach
                                @endif
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Total <span>$@if(session()->has('total')){{session()->get('total')}}@endif</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
@endsection

