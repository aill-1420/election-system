@extends('template.master')
@section('title' , 'all election')
@section('content')
    <!-- STATISTIC -->
    <section class="statistic">
        <h2 class="text-center pb-5">All available campaigns you can run in</h2>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @auth('candidate')
                    <div class="row">
                        {{--                        <div class="col-md-6 col-lg-3">--}}
                        {{--                            <div class="statistic__item">--}}
                        {{--                                <a href="{{route('visitor.index')}}">--}}
                        {{--                                    <h2 class="number">--}}
                        {{--                                        {{$candidate->election()->count()}}--}}
                        {{--                                    </h2>--}}
                        {{--                                    <span class="desc">My Election</span>--}}
                        {{--                                    <div class="icon">--}}
                        {{--                                        <i class="zmdi zmdi-account-o"></i>--}}
                        {{--                                    </div>--}}
                        {{--                                </a>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
{{--                        <div class="col-md-6 col-lg-3">--}}
{{--                            <div class="statistic__item">--}}
{{--                                <a href="{{route('my.election')}}">--}}
{{--                                    <h2 class="number"></h2>--}}
{{--                                    <span class="desc">My Election</span>--}}
{{--                                    <div class="icon">--}}
{{--                                        <i class="fa fa-tags" aria-hidden="true"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6 col-lg-3">--}}
{{--                            <div class="statistic__item">--}}
{{--                                <a href="{{route('all.election')}}">--}}
{{--                                    <h2 class="number">{{\App\Models\Election::where('status' , 1)->count()}}</h2>--}}
{{--                                    <span class="desc">All Election</span>--}}
{{--                                    <div class="icon">--}}
{{--                                        <i class="zmdi zmdi-calendar-note"></i>--}}
{{--                                    </div>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        @foreach($elections as $election)
                            <div class="col-md-4">
                                <div class="card">
                                    <a href="{{route('nomination' , $election->id)}}">
                                        <div class="card-header">
                                            <strong class="card-title">{{$election->name}}
                                                <small>
                                                    <span class="badge badge-danger float-right mt-1">{{$election->votes()->count()}}</span>
                                                </small>
                                            </strong>
                                        </div>
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text">
                                            {{\Illuminate\Support\Str::words($election->description , 10)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="col-md-6 col-lg-3">--}}
{{--                                <div class="statistic__item">--}}
{{--                                    <a href="{{route('nomination' , $election)}}">--}}
{{--                                        <h2 class="number text-uppercase">{{$election->name}} </h2>--}}
{{--                                        <span class="desc">Votes : {{$election->votes()->count()}}</span>--}}
{{--                                        <div class="icon">--}}
{{--                                            <img src="{{asset('public/candidate/')}}">--}}
{{--                                        </div>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        @endforeach

                        {{--                            <div class="col-md-6 col-lg-3">--}}
                        {{--                                <div class="statistic__item">--}}
                        {{--                                    <a href="{{route('admin.index')}}">--}}
                        {{--                                        <h2 class="number">4</h2>--}}
                        {{--                                        <span class="desc">All admin</span>--}}
                        {{--                                        <div class="icon">--}}
                        {{--                                            <i class="zmdi zmdi-account-o"></i>--}}
                        {{--                                        </div>--}}
                        {{--                                    </a>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                    </div>
                @endauth
            </div>
        </div>
    </section>
    <!-- END STATISTIC-->
@endsection
