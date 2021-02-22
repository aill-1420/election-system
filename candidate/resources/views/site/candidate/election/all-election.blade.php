@extends('template.master')
@section('title' , 'all election')
@section('content')
    <!-- STATISTIC -->
    <section class="statistic">
        <h2 class="text-center pb-5">All campaigns you can run in</h2>
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

                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item">
                                <a href="{{route('votes.index')}}">
                                    <h2 class="number">{{\App\Models\Vote::count()}}</h2>
                                    <span class="desc">All Votes</span>
                                    <div class="icon">
                                        <img src="{{asset('public/candidate/')}}">
                                    </div>
                                </a>
                            </div>
                        </div>

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
