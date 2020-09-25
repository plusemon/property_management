@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/property/type/create') }}" class="btn btn-primary">Add New Type</a>
</div>

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Property Types</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{$type->id}}</th>
                            <td>{{$type->name}}</td>
                            <td>{{$type->descripton}}</td>
                            <td>
                                <a href="{{ route('admin/property/type/'.$type->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('admin/property/type/'.$type->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection