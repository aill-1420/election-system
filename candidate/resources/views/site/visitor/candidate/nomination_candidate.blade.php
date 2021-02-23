@extends('template.master')
@section('title' , 'nomination to candidate')
@section('content')
    <h4 class="text-center mt-4">{{$election->name}}</h4>
    <div class="col-md-12 p-4">
        <div class="card">
            @include('dashboard.admin.alert.success')
            @include('dashboard.admin.alert.error')
            <div class="card-body">
                <div class="mx-auto d-block">
                    <img class="rounded-circle mx-auto d-block" src="{{asset('storage/candidate/'.$candidate->image)}}"
                         width="400px" alt="Card image cap">
                    <h5 class="text-sm-center mt-4 mb-1">{{$candidate->name}}</h5>
                    <div class="location text-sm-center">
                    </div>
                    <hr>
                    <p class="text-center">{{$candidate->reason_of_nomination}}</p>
                    <hr>
                </div>
                <div class="card-footer">
                    <form action="{{route('nomination_save')}}" method="POST">
                        @csrf
                        <input type="hidden" name="candidate" value="{{$candidate->id}}">
                        <input type="hidden" name="election" value="{{$election->id}}">
                        <button class="btn btn-block btn-outline-info">Nomination</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
