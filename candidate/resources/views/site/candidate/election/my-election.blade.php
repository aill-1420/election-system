@extends('template.master')
@section('title' , 'my elections')
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 class="text-center mb-5">my subscribed election</h2>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        @include('dashboard.admin.alert.success')
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>start date</th>
                                    <th>end date</th>
                                    <th>name</th>
{{--                                    <th>description</th>--}}
                                    <th>Votes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($candidate->election as $can)
                                    <td>{{$can->start_date}}</td>
                                    <td>{{$can->end_date}}</td>
                                    <td>{{$can->name}}</td>
{{--                                    <td>{{\Illuminate\Support\Str::words($can->description , 5)}}</td>--}}
                                    <td> <button class="btn btn-sm btn-danger" disabled>{{$can->votes()->count()}}</button></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
