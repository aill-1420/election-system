@extends('template.master')
@section('title' , 'all candidate')
@section('content')
    <h4 class="text-center mt-4">{{$elections->name}}</h4>
    <div class="row p-5">
        @foreach($elections->candidate as $election)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="{{asset('storage/candidate/'.$election->image)}}" width="200px" height="200px"
                                 alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">{{$election->name}}</h5>
                            <div class="location text-sm-center">
                                {{\Illuminate\Support\Str::words($election->reason_of_nomination , 6)}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <strong class="card-title mb-3">
                            <a href="{{url("visitor/nomination_candidate/$election->id/election/$elections->id")}}">view candidate</a>
                            <span class="badge badge-primary float-right">{{$election->votes()->count()}}</span>
                        </strong>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
