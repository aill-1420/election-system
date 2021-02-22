@extends('template.master')
@section('title' , 'Dashboard')
@section('content')
            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        @auth('admin')
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <a href="{{route('visitor.index')}}">
                                            <h2 class="number">{{\App\Models\visitors::count()}}</h2>
                                            <span class="desc">All Visitor</span>
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <a href="{{route('candidate.index')}}">
                                            <h2 class="number">{{\App\Models\Candidate::count()}}</h2>
                                            <span class="desc">All Candidate</span>
                                            <div class="icon">
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <a href="{{route('election.index')}}">
                                            <h2 class="number">{{\App\Models\Election::count()}}</h2>
                                            <span class="desc">All Election</span>
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="statistic__item">
                                        <a href="{{route('votes.index')}}">
                                            <h2 class="number">{{\App\Models\Vote::count()}}</h2>
                                            <span class="desc">All Votes</span>
                                            <div class="icon">
                                                <i class="fa fa-certificate" aria-hidden="true"></i>
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
