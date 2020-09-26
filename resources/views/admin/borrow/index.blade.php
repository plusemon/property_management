@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/borrow/create') }}" class="btn btn-primary">Add New Borrow</a>
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
                            <th scope="col">Courtry</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($properties as $property)
                            <tr>
                                <th scope="row">{{ $property->id }}</th>
                                <td>{{ $property->name }}</td>
                                <td>{{ $property->type->name ?? 'Deleted' }}</td>
                                <td>{{ $property->address }}</td>
                                <td>{{ $property->country }}</td>
                                <td>
                                    <a href="{{ route('property.edit', $property->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form class="d-inline" action="{{route('property.destroy', $property->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach --}}
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection