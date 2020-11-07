@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit {{$type->type}} type</h5>
        <div class="card-body">
            <form action="{{ route('type.update', $type->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md">
                        <label class="col-form-label">Type Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $type->name }}">
                    </div>
                    {{-- <div class="form-group col-md-3">
                        <label class="col-form-label">Under</label>
                        <select name="type" class="form-control" required>
                            <option value="property">Property</option>
                            <option value="expense">Expense</option>
                        </select>
                    </div> --}}
                    {{-- <div class="form-group  col-4">
                        <label class="col-form-label">Entry Date</label>
                        <input name="created_at" type="date" class="form-control" value="{{ $type->created_at->format('Y-m-d') }}" required>
                    </div> --}}
                </div>
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection
