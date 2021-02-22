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
                                <h3>Online Election System Registration Candidate</h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="{{route('candidate.register')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
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
                                            <input id="image" name="image" type="file" class="form-control"
                                                   required >
                                            @error('image')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <textarea id="textarea-input" name="description" rows="9" placeholder="Reason of notation..." class="form-control">{{old('description')}}</textarea>
                                        @error('description')
                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-12">
                                        <label for="select" class=" form-control-label">Select the election</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12 col-md-12">
                                        <select name="election" id="election" class="form-control">
                                            <option value="0">Please select election</option>
                                            @foreach(\App\Models\Election::orderBy('id' , 'DESC')->where('status' , 1)->get() as $election)
                                                <option value="{{$election->id}}">{{$election->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('election')
                                        <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Sign up candidate</span>
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
