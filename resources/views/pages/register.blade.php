@extends('layouts.layout')

@section('title') Registration @endsection

@section('banner-h1') Register @endsection
@section('banner-link')
    <a href="{{ route('cart') }}">Register</a>
@endsection

@section('content')
    <!--================Registration Box Area =================-->
    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="img/login.jpg" alt="">
                        <div class="hover">
                            <h4>Are you already our user?</h4>
                            <a class="primary-btn" href="{{ route('login') }}">Log in</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Complete Form to Register</h3>
                        <form class="row login_form" action="{{ route('doRegister') }}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="emailRegister" name="emailRegister" placeholder="Email" value="{{old('emailRegister')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                                @if($errors->has('emailRegister'))
                                    <span class="error">* {{$errors->first("emailRegister")}}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="passwordRegister" name="passwordRegister" placeholder="Password" value="{{old('passwordRegister')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                @if($errors->has('passwordRegister'))
                                    <span class="error">* {{$errors->first("passwordRegister")}}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="passwordRegisterConfirm" name="passwordRegisterConfirm" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"  value="{{old('firstName')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'">
                                @if($errors->has('firstName'))
                                    <span class="error">* {{$errors->first("firstName")}}</span>
                                @endif
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" value="{{old('lastName')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'">
                                @if($errors->has('lastName'))
                                    <span class="error">* {{$errors->first("lastName")}}</span>
                                @endif
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">Register</button>
                            </div>
                        </form>
                        @if(session('error-msg'))
                            <p class="success my-2">{{ session('error-msg') }}</p>
                        @endif
                        @if(session("success-msg"))
                            <p class="success my-2">{{session('success-msg')}}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Registration Box Area =================-->

@endsection

