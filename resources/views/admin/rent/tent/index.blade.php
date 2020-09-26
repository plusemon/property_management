@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/tent/create') }}" class="btn btn-primary">Add New Tent</a>
</div>
<div class="col-12">
    <div class="card">
        <h5 class="card-header">Tents</h5>
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
                        @foreach ($tents as $tent)
                            <tr>
                                <th scope="row">{{ $tent->id }}</th>
                                <td>{{ $tent->name }}</td>
                                <td>{{ $tent->type->name ?? 'Deleted' }}</td>
                                <td>{{ $tent->address }}</td>
                                <td>{{ $tent->country }}</td>
                                <td>
                                    <a href="{{ route('tent.edit', $tent->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                    <form class="d-inline" action="{{route('tent.destroy', $tent->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
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