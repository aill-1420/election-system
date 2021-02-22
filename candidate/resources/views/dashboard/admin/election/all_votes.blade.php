@extends('template.master')
@section('title' , 'Election')
@section('content')

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 class="text-center mb-5">All Votes</h2>
                <div class="row">
                    <div class="col-lg-12">
                        @include('dashboard.admin.alert.success')
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>visitor</th>
                                    <th>candidate</th>
                                    <th>election</th>
                                    <th>time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($election_votes as $election_vote)
                                    <td>{{$election_vote->id}}</td>
                                    <td>{{$election_vote->visitor->name}}</td>
                                    <td>{{$election_vote->candidate->name}}</td>
                                    <td>{{$election_vote->election->name}}</td>
                                    <td>{{$election_vote->created_at}}</td>
                                    {{--                                            <td>--}}
                                    {{--                                                <a href="{{route('election.edit' , $election->id)}}" class="btn btn-sm btn-primary">Edit</a>--}}
                                    {{--                                                @if($election->status == 1)--}}
                                    {{--                                                    <form action="{{route('election.destroy' , $election->id)}}" class="d-inline" method="POST">--}}
                                    {{--                                                        @csrf--}}
                                    {{--                                                        @method('DELETE')--}}
                                    {{--                                                        <button class="btn btn-sm btn-danger">Close election</button>--}}
                                    {{--                                                    </form>--}}
                                    {{--                                                @endif--}}
                                    {{--                                            </td>--}}
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$election_votes->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
