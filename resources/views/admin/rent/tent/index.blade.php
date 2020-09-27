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
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">City</th>
                            <th scope="col">Courtry</th>
                            <th scope="col">Granters</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tents as $tent)
                            <tr>
                                <th scope="row">{{ $tent->id }}</th>
                                <td>{{ $tent->fname.' '.$tent->lname }}</td>
                                <td>{{ $tent->address}}</td>
                                <td>{{ $tent->city }}</td>
                                <td>{{ $tent->country }}</td>
                                <td>{{ $tent->g1_fname.' '.$tent->g1_lname }}<br>{{ $tent->g2_fname.' '.$tent->g2_lname }}</td>
                                <td class="text-right">
                                    <a href="{{ route('tent.show', $tent->id)}}"
                                        class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
{{-- 
                                    <a href="{{ route('tent.edit', $tent->id)}}"
                                        class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a> --}}
                                    <form class="d-inline" action="{{route('tent.destroy', $tent->id)}}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
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