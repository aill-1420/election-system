@extends('template.master')
@section('title' , 'update aysha')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">edit visitor </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">edit visitor {{auth('visitor')->user()->name}}</h3>
                                </div>
                                <hr>
                                @include('dashboard.admin.alert.success')
                                <form action="{{route('update.visitor.account')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">name</label>
                                                <input id="name" value="{{auth('visitor')->user()->name}}" name="name" type="text" class="form-control"
                                                       required>
                                                @error('name')
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="username" class="control-label mb-1">username</label>
                                            <div class="input-group">
                                                <input id="username" value="{{auth('visitor')->user()->username}}" name="username" type="text" class="form-control"
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
                                                <input id="email" value="{{auth('visitor')->user()->email}}" name="email" type="email" class="form-control"
                                                       required>
                                                @error('email')
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="password" class="control-label mb-1">password</label>
                                            <div class="input-group">
                                                <input id="password" placeholder="Leave the password if you don't want to change it" name="password" type="password" class="form-control cc-cvc"
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
                                                <input id="phone" value="{{auth('visitor')->user()->phone_number}}" name="phone" type="tel" class="form-control"
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
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">update visitor {{auth('visitor')->user()->name}}</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
