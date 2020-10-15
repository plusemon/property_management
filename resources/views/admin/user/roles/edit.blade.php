@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Edit Role</h2>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('role.update',$role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-10">
                        <label class="col-form-label">Role Name</label>
                        <input name="name" type="text" value="{{ $role->name }}" class="form-control">
                    </div>

                    <div class="form-group text-center col-2 mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>

                @foreach ($permissions as $permission)
                <div class="form-group">
                    <div class="custom-control custom-checkbox my-1 mr-sm-2">
                        <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->id }}">
                        <label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                      </div>
                </div>
                @endforeach
            </form>
        </div>
    </div>
</div>


@endsection
