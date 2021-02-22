@extends('template.master')
@section('title' , 'create election')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">edit candidate {{$candidate->name}}</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">candidate {{$candidate->name}}</h3>
                                </div>
                                <hr>
                                <form action="{{route('candidate.update' , $candidate->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name" class="control-label mb-1">name</label>
                                                <input id="name" name="name" value="{{$candidate->name}}" type="text" placeholder="please enter name" class="form-control"
                                                       required>
                                                @error('name')
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="username" class="control-label mb-1">username</label>
                                            <div class="input-group">
                                                <input id="username" name="username" value="{{$candidate->username}}" type="text" placeholder="please enter username" class="form-control"
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
                                                <input id="email" name="email" type="email" class="form-control" value="{{$candidate->email}}" placeholder="please enter email"
                                                       required>
                                                @error('email')
                                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="password" class="control-label mb-1">password</label>
                                            <div class="input-group">
                                                <input id="password" name="password" type="password" class="form-control cc-cvc" placeholder="please enter password"
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
                                                <input id="phone" name="phone" type="tel" class="form-control" value="{{$candidate->phone_number}}" placeholder="please enter phone"
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
                                            <textarea id="textarea-input" name="description" rows="9" placeholder="Reason of notation..." class="form-control">{{$candidate->reason_on_nomination}}</textarea>
                                            @error('description')
                                            <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-12">
                                            <label for="election" class=" form-control-label">Select the election</label>
                                        </div>
                                    </div>
                                        <div class="row form-group">
                                            <div class="col-12 col-md-12">
                                                <select name="election" id="election" class="form-control">
{{--                                                    @foreach(\App\Models\Election::orderBy('id' , 'DESC')->select('id' , 'name')->get() as $election)--}}
                                                        <option value="{{$candidate->election->id}}">{{$candidate->election->name}}</option>
{{--                                                    @endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                    @error('election')
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true">{{$message}}</span>
                                    @enderror
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Create new candidate</span>
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
