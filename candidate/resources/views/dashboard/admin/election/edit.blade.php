@extends('template.master')
@section('title' , 'edit election')
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
                            <a class="js-arrow" href="#">
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
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('votes.index')}}">
                                <i class="fa fa-certificate" aria-hidden="true"></i>
                                Votes
                            </a>
                        </li>
                    </ul>
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{route('admin.index')}}">
                                <i class="zmdi zmdi-account-o"></i>Admins
                            </a>
                        </li>
                    </ul>
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
                                        <input id="name" name="name" type="text" class="form-control" value="{{$election->name}}" required>
                                        @error('name')
                                        <small class="text-danger small">{{$message}}</small>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="start_date" class="control-label mb-1">start date</label>
                                                <input id="start_date" name="start_date" type="date" value="{{$election->start_date}}" class="form-control"
                                                       required>
                                                @error('start_date')
                                                <small class="text-danger small">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="end_date" class="control-label mb-1">end date</label>
                                            <div class="input-group">
                                                <input id="end_date" name="end_date" value="{{$election->end_date}}" type="date" class="form-control cc-cvc"
                                                       required>
                                                @error('end_date')
                                                <small class="text-danger small">{{$message}}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12 col-md-12">
                                            <textarea id="description" name="description" rows="9" placeholder="Please enter the description here" class="form-control">{{$election->description}}</textarea>
                                            @error('description')
                                            <small class="text-danger small">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-check">
                                        <div class="checkbox">
                                            <label for="status" class="form-check-label">
                                                <input type="checkbox" id="status" name="status" value="1" {{$election->status == 1 ? 'checked' : ''}} class="form-check-input">published
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
