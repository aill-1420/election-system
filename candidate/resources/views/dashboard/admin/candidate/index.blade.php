@extends('template.master')
@section('title' , 'Candidate')
@section('content')
<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <h2 class="text-center mb-5">All Candidate</h2>
            <a href="{{route('candidate.create')}}">
                <button class="au-btn au-btn-icon au-btn--blue2 mb-3">
                    <i class="zmdi zmdi-plus"></i>add Candidate
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
                                <th>name</th>
                                <th>email</th>
                                <th>phone number</th>
                                <th>Election</th>
                                <th>Register at</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($candidates as $candidate)
                                <td>{{$candidate->id}}</td>
                                <td>{{$candidate->name}}</td>
                                <td>{{$candidate->email}}</td>
                                <td>{{$candidate->phone_number}}</td>
                                <td>
                                    @foreach($candidate['election'] as $can)
                                        {{$can->name}} |
                                    @endforeach
                                </td>
                                <td>{{$candidate->created_at}}</td>
                                <td>
                                    <a href="{{route('candidate.edit' , $candidate->id)}}"
                                       class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{route('candidate.destroy' , $candidate->id)}}"
                                          onclick="return confirm('Are You Sure')" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$candidates->links()}}
            </div>
        </div>
    </div>
</div>

@endsection
