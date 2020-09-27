@extends('layouts.dashboard')

@section('content')

{{-- <div class="col-12 text-right">
    <a href="{{ url('admin/property/type') }}" class="btn btn-primary">Add New Type</a>
</div> --}}

<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Properties</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Add</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    {{-- <h5 class="card-header">Properties</h5> --}}
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Street</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                        {{-- <th scope="col">Entry Date</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $property)
                                    <tr>
                                        <td>{{ $property->id }}</td>
                                        <td>{{ $property->name }}</td>
                                        <td>{{ $property->type->name ?? 'Deleted' }}</td>
                                        <td>{{ $property->district }}</td>
                                        <td>{{ $property->street }}</td>
                                        <td>{{ $property->city }}</td>
                                        <td>{{ $property->country }}</td>
                                        {{-- <td>{{ $property->created_at->format('d/m/Y') }}</td> --}}
                                        <td class="text-right">
                                            <a href="{{ route('property.edit', $property->id)}}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('property.destroy', $property->id)}}"
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
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card-body">
                    <form action="{{ route('property.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="col-form-label">Type</label>
                                <select class="form-control" name="type_id" required>
                                    <option value="">Select type</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Name</label>
                                <input name="name" type="text" class="form-control" value="" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="col-form-label">District</label>
                                <input name="district" type="text" class="form-control" required>
                            </div>
                            <div class="col-6 form-group">
                                <label class="col-form-label">Street</label>
                                <input name="street" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="col-form-label">City</label>
                                <input name="city" type="text" class="form-control" required>
                            </div>
    
                            <div class="col-4 form-group">
                                <label class="col-form-label">Country</label>
                                <input name="country" type="text" class="form-control" required>
                            </div> 

                            <div class="col-4 form-group">
                                <label class="col-form-label">Entry Date</label>
                                <input id="created_at" name="created_at" type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control">
                            </div>    
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection