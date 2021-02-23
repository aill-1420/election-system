@extends('template.master')
@section('title' , 'nomination')
@section('content')
    <div class="col-md-12 p-5">
        <div class="card border border-success">
            <div class="card-header">
                @include('dashboard.admin.alert.success')
                @include('dashboard.admin.alert.error')
                <strong class="card-title">{{$election->name}}</strong>
                    <h4 class="badge badge-danger float-right mt-1">{{$election->votes()->count()}}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{$election->description}}
                </p>
            </div>
            <div class="card-footer">
                <form action="{{route('nomination.post')}}" method="POST">
                    @csrf
                    <input type="hidden" name="election" value="{{$election->id}}">
                    <button class="btn btn-outline-info btn-block">Nomination</button>
                </form>
            </div>
        </div>
    </div>
@endsection
