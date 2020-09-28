@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Rent / Property / Types</h3>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Entry</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Created</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                    <tr>
                                        <th scope="row">{{$type->id}}</th>
                                        <td>{{$type->name}}</td>
                                        <td>{{ $type->created_at->format('d-m-Y') }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('type.edit', $type->id)}}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('type.destroy', $type->id)}}" method="POST">
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
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card">
                    {{-- <h5 class="card-header">Add Property Type</h5> --}}
                    <div class="card-body">
                        <form action="{{ route('type.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="property">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Type</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                                <div class="form-group  col-6">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}">
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Add Type</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection