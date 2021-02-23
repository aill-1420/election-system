@extends('template.master')
@section('title' , 'Candidate Register')
@section('content')
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3>Online Election System Registration Visitor</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('visitor.register')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label mb-1">name</label>
                                            <input id="name" placeholder="enter your name" name="name" type="text" class="form-control"
                                                   required>
                                            @error('name')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="username" class="control-label mb-1">username</label>
                                        <div class="input-group">
                                            <input id="username" placeholder="enter your username" name="username" type="text" class="form-control"
                                                   required >
                                            @error('username')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="email" class="control-label mb-1">email</label>
                                            <input id="email" placeholder="enter your email" name="email" type="email" class="form-control"
                                                   required>
                                            @error('email')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="password" class="control-label mb-1">password</label>
                                        <div class="input-group">
                                            <input id="password" placeholder="enter your password" name="password" type="password" class="form-control cc-cvc"
                                                   required>
                                            @error('password')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="phone" class="control-label mb-1">phone number</label>
                                            <input id="phone" name="phone" placeholder="enter your phone number" type="tel" class="form-control"
                                                   required>
                                            @error('phone')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="image" class="control-label mb-1">image</label>
                                        <div class="input-group">
                                            <input id="image" name="image" type="file" class="form-control">
                                            @error('image')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Sign up visitor</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
