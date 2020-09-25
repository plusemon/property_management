@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/property/create') }}" class="btn btn-primary">Add New Property</a>
</div>
<div class="col-12">
    <div class="card">
        <h5 class="card-header">Properties</h5>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>New Home</td>
                            <td>Building</td>
                            <td>239-B Block -2 Pechs, Sindh, Karachi, Sindh, Pakistan</td>
                            <td>
                                <a href="{{ url('admin/property/1/edit')}}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="{{ url('admin/property/1')}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection