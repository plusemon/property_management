@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right mb-3">
    <a href="{{ url('admin/property/type') }}" class="btn btn-primary">Back to Types</a>
</div>

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Add Property Type</h5>
        <div class="card-body">
            <form action="{{ route('property.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="col-form-label">Property Type</label>
                    <input name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="textarea">Description</label>
                    <textarea name="description" class="form-control" id="textarea" rows="3"></textarea>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-success">Add New</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection