@extends('template.master')
@section('title' , 'visitor')
@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2 class="text-center mb-5">All admin</h2>
                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{route('admin.create')}}">
                            <button class="au-btn au-btn-icon au-btn--blue2 mb-3">
                                <i class="zmdi zmdi-plus"></i>add admin
                            </button>
                        </a>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone number</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>ayshaa</td>
                                    <td>ahmed@gmail.com</td>
                                    <td>34324234</td>
                                    <td>
                                        <a href="{{route('visitor.edit' , 1)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('visitor.destroy' , 1)}}" class="d-inline">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>aysha</td>
                                    <td>ahmed@gmail.com</td>
                                    <td>34324234</td>
                                    <td>
                                        <a href="{{route('visitor.edit' , 1)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('visitor.destroy' , 1)}}" class="d-inline">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>aysha</td>
                                    <td>ahmed@gmail.com</td>
                                    <td>34324234</td>
                                    <td>
                                        <a href="{{route('visitor.edit' , 1)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('visitor.destroy' , 1)}}" class="d-inline">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>aysha</td>
                                    <td>ahmed@gmail.com</td>
                                    <td>34324234</td>
                                    <td>
                                        <a href="{{route('visitor.edit' , 1)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('visitor.destroy' , 1)}}" class="d-inline">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>aysha</td>
                                    <td>ahmed@gmail.com</td>
                                    <td>34324234</td>
                                    <td>
                                        <a href="{{route('visitor.edit' , 1)}}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{route('visitor.destroy' , 1)}}" class="d-inline">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
