@extends('layouts.layout')

@section('title') Login @endsection

@section('banner-h1') Login @endsection
@section('banner-link')
    <a href="{{ route('cart') }}">Login</a>
@endsection

@section('content')
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('img/login.jpg') }}" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <form class="row login_form" action="{{route('doLogin')}}" method="post" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control" id="emailLogin" name="emailLogin" placeholder="Email" value="{{old('emailLogin')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            @if($errors->has('emailLogin'))
                                <span class="error">* {{$errors->first("emailLogin")}}</span>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="Password" value="{{old('passwordLogin')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            @if($errors->has('passwordLogin'))
                                <span class="error">* {{$errors->first("passwordLogin")}}</span>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" name="btnLogin" id="btnLogin" class="primary-btn">Log In</button>
                        </div>
                    </form>
                    @if(session('error-msg'))
                        <p class="success my-2">{{ session('error-msg') }}</p>
                    @endif
{{--                    @if(session('success-msg'))--}}
{{--                        <p class="success my-2">{{ session('success-msg') }}</p>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
@endsection

