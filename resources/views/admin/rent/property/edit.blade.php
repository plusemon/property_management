@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/property/type/create') }}" class="btn btn-success">Add New Type</a>
    <a href="{{ url('admin/property') }}" class="btn btn-primary">Back to Property</a>
</div>

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Property</h5>
        <div class="card-body">
            <form action="{{ route('property.update', $property->id) }}" method="POST"> 
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-form-label">Name</label>
                    <input name="name" type="text" value="{{ $property->name }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Type</label>
                    <select class="form-control" name="type_id" required>
                        <option value="">Select type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $property->type->id == $type->id ? 'selected':'' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Address</label>
                    <input name="address" type="text" value="{{ $property->address }}" class="form-control" required>
                </div>
               
                <div class="form-group">
                    <label class="col-form-label">Country</label>
                    <select class="form-control" name="country" required>
                        <option value="">Select Country</option>
                        <option value="Pakistan" selected>Pakistan</option>
                    </select>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection