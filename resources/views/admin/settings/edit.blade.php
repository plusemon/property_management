@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Settings</h5>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-6">
                        <label class="col-form-label">Title</label>
                        <input name="name" type="text" class="form-control" value="{{ $settings['title'] }}">
                    </div>

                </div>
                <div class="form-group text-right mt-4">
                    {{-- <a href="" class="btn btn-info">Close</a> --}}
                    <button type="submit" class="btn btn-primary" disabled>Save</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection