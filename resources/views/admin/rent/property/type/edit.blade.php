@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/property/type') }}" class="btn btn-primary">Back to Types</a>
</div>

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Property Type</h5>
        <div class="card-body">
            <form action="{{ route('type.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="col-form-label">Type Name</label>
                    <input name="name" type="text" class="form-control" value="{{ $type->name }}">
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection