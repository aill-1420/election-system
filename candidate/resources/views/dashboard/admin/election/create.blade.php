@extends('template.master')
@section('title' , 'create election')
@section('content')



            <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">create new election</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">new election</h3>
                                </div>
                                <hr>
                                <form action="{{route('election.store')}}" method="post" novalidate="novalidate">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name" class="control-label mb-1">name</label>
                                        <input id="name" name="name" type="text" class="form-control" value="{{old('name')}}" required>
                                        @error('name')
                                        <small class="text-danger small">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="start_date" class="control-label mb-1">start date</label>
                                                <input id="start_date" name="start_date" type="date" class="form-control"
                                                       required>
                                                @error('start_date')
                                                <small class="text-danger small">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="end_date" class="control-label mb-1">end date</label>
                                            <div class="input-group">
                                                <input id="end_date" name="end_date" type="date" class="form-control cc-cvc"
                                                       required>
                                                @error('end_date')
                                                <small class="text-danger small">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <textarea id="description" name="description" rows="9" placeholder="Please enter the description here" class="form-control">{{old('description')}}</textarea>
                                            @error('description')
                                            <small class="text-danger small">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="status" class="form-check-label">
                                                <input type="checkbox" id="status" name="status" value="1" class="form-check-input">published
                                                @error('status')
                                                <small class="text-danger small">{{$message}}</small>
                                                @enderror
                                            </label>
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Create</span>
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
