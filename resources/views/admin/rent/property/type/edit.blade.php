@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Property Type</h5>
        <div class="card-body">
            <form action="{{ route('type.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-6">
                        <label class="col-form-label">Type Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $type->name }}">
                    </div>
                    <div class="form-group  col-6">
                        <label class="col-form-label">Entry Date</label>
                        <input name="created_at" type="date" class="form-control" value="{{ $type->created_at->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="form-group text-right mt-4">
                    <a href="{{ url('admin/property/type') }}" class="btn btn-info">Close</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection