@extends('template.master')
@section('title' , 'visitor')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 class="text-center mb-5">All Visitor</h2>
                <a href="{{route('visitor.create')}}">
                    <button class="au-btn au-btn-icon au-btn--blue2 mb-3">
                        <i class="zmdi zmdi-plus"></i>add visitor
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
                                    <th>phone number</th>
                                    <th>email</th>
                                    <th>register at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($visitors as $visitor)
                                    <td>{{$visitor->id}}</td>
                                    <td>{{$visitor->name}}</td>
                                    <td>{{$visitor->phone_number}}</td>
                                    <td>{{$visitor->email}}</td>
                                    <td>{{$visitor->create_at}}</td>
                                    <td>
                                        <a href="{{route('visitor.edit' , $visitor->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('visitor.destroy' , $visitor->id)}}" onclick="return confirm('Are You Sure')" class="d-inline" method="post">
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
                    {{$visitors->links()}}
                </div>
            </div>
        </div>
    </div>

@endsection
