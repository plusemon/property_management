@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Settings</h5>
        <div class="card-body">
            <form action="{{ route('setting.update', $setting->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-6">
                        <label class="col-form-label">Title</label>
                        <input name="name" type="text" class="form-control" value="{{ $setting->name }}">
                    </div>

                    <div class="form-group col-6">
                        <label class="col-form-label">Serial Number Start from</label>
                        <input name="serial" type="number" class="form-control" value="{{ $setting->serial }}">
                    </div>

                </div>
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection
