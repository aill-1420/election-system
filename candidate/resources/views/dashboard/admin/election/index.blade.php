@extends('template.master')
@section('title' , 'Election')
@section('content')
    <body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <h4 class="text-light">Online Election System</h4>
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{asset('front-end')}}/images/profile.jpg" alt="John Doe"/>
                    </div>
                    <h4 class="name">{{auth()->user()->name ?? 'Admin'}}</h4>
                    <a href="{{route('admin.logout')}}">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('admin.dashboard')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('visitor.index')}}">
                                <i class="zmdi zmdi-account-o"></i>visitors
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('candidate.index')}}">
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                Candidate
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('election.index')}}">
                                <i class="zmdi zmdi-calendar-note"></i>
                                Election
                            </a>
                        </li>
                    </ul>
{{--                    <ul class="list-unstyled navbar__list">--}}
{{--                        <li class="active has-sub">--}}
{{--                            <a class="js-arrow" href="{{route('votes.index')}}">--}}
{{--                                <i class="fa fa-certificate" aria-hidden="true"></i>--}}
{{--                                Votes--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <ul class="list-unstyled navbar__list">--}}
{{--                        <li class="active has-sub">--}}
{{--                            <a class="js-arrow" href="{{route('admin.index')}}">--}}
{{--                                <i class="zmdi zmdi-account-o"></i>Admins--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="images/icon/logo-white.png" alt="CoolAdmin"/>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin"/>
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="images/icon/avatar-big-01.jpg" alt="John Doe"/>
                        </div>
                        <h4 class="name">john doe</h4>
                        <a href="#">Sign out</a>
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                    {{--                                    <button class="au-btn au-btn-icon au-btn--blue2">--}}
                                    {{--                                        <i class="zmdi zmdi-plus"></i>add election</button>--}}
                                    {{--                                    <button class="au-btn au-btn-icon au-btn--green">--}}
                                    {{--                                        <i class="zmdi zmdi-plus"></i>add candidate</button>--}}
                                    {{--                                    <button class="au-btn au-btn-icon au-btn--blue2">--}}
                                    {{--                                        <i class="zmdi zmdi-plus"></i>add candidate to election</button>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 class="text-center mb-5">All Election</h2>
                <br>
                <a href="{{route('election.create')}}">
                    <button class="au-btn au-btn-icon au-btn--blue2 mb-3">
                        <i class="zmdi zmdi-plus"></i>add election
                    </button>
                </a>
                <div class="row">
                    <div class="col-lg-12">
                        @include('dashboard.admin.alert.success')
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>All votes</th>
                                    <th>start date</th>
                                    <th>end date</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>status</th>
                                    <th>created at</th>
                                    <th>action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($elections as $election)
                                    <td>{{$election->id}}</td>
                                    <td><a href="{{route('election.votes' , $election->id)}}">{{$election->votes->count()}}</a></td>
                                    <td>{{$election->start_date}}</td>
                                    <td>{{$election->end_date}}</td>
                                    <td>{{$election->name}}</td>
                                    <td>{{$election->description}}</td>
                                    <td>{!! $election->status() !!}</td>
                                    <td>{{$election->created_at}}</td>
                                    <td>
                                        <a href="{{route('election.edit' , $election->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        @if($election->status == 1)
                                            <form action="{{route('election.destroy' , $election->id)}}" class="d-inline" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">Close election</button>
                                            </form>
                                        @endif
                                    </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$elections->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
