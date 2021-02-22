@extends('template.master')
@section('title' , 'Login')
@section('content')
    <body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3>Online Election System Candidate</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('candidate.login')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                    @error('email')
                                    <small class="text-danger small">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                    @error('password')
                                    <small class="text-danger small">{{$message}}</small>
                                    @enderror
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                <a class="btn btn-block btn-info" href="{{route('candidate.register.view')}}">Sign up as candidate</a>
                            </form>
                            {{--                            <div class="social-login-content">--}}
                            {{--                                <div class="social-button">--}}
                            {{--                                    <a href="{{route('candidate.register.view')}}">--}}
                            {{--                                        <button class="au-btn au-btn--block au-btn--blue2 m-b-20">Candidate Register</button>--}}
                            {{--                                    </a>--}}
                            {{--                                    <a href="#">--}}
                            {{--                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">See All Candidate</button>--}}
                            {{--                                    </a>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="register-link">--}}
                            {{--                                <p>--}}
                            {{--                                    Don't you have account?--}}
                            {{--                                    <a href="{{route('visitor.register')}}">Sign Up Here</a>--}}
                            {{--                                </p>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
