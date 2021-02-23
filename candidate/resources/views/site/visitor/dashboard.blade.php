@extends('template.master')
@section('title' , 'Visitor Dashboard')
@section('content')
    <section class="statistic">
        <h2 class="text-center pb-5">All available elections you can nomination for it</h2>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @auth('visitor')
                    <div class="row">
                        @foreach($elections as $election)
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <a href="{{route('all_candidate' , $election->id)}}">
                                        <h2 class="number">
                                            {{$election->candidate()->count()}}
                                        </h2>
                                        <span class="desc">{{$election->name}}</span>
                                        <div class="icon">
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endauth
            </div>
        </div>
    </section>
    <!-- END STATISTIC-->
@endsection
