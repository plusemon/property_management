@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Property</h5>
        <div class="card-body">
            <form action="{{ route('property.update', $property->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-4 form-group">
                        <label class="col-form-label">Type</label>
                        <select class="form-control" name="type_id" required>
                            <option value="">Select type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ $type->id == $property->type->id ? 'selected':'' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-8">
                        <label class="col-form-label">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $property->name }}" required>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-4 form-group">
                        <label class="col-form-label">Rent (Per Month)</label>
                        <input name="rate" type="text" class="form-control" value="{{ $property->rate }}" required>
                    </div>
                    <div class="col-4 form-group">
                        <label class="col-form-label">District</label>
                        <input name="district" type="text" class="form-control" value="{{ $property->district }}" required>
                    </div>
                    <div class="col-4 form-group">
                        <label class="col-form-label">Street</label>
                        <input name="street" type="text" class="form-control" value="{{ $property->street }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 form-group">
                        <label class="col-form-label">City</label>
                        <input name="city" type="text" class="form-control" value="{{ $property->city }}" required>
                    </div>

                    <div class="col-4 form-group">
                        <label class="col-form-label">Country</label>
                        <input name="country" type="text" class="form-control" value="{{ $property->country }}" required>
                    </div> 

                    <div class="col-4 form-group">
                        <label class="col-form-label">Entry Date</label>
                        <input id="created_at" name="created_at" type="date" value="{{ $property->created_at->format('Y-m-d') }}" class="form-control">
                    </div>    
                </div>

                <div class="form-group text-right mt-4">
                    <a href="{{ url('admin/property') }}" class="btn btn-info">Close</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection