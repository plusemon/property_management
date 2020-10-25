@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Accounted Assigned</h5>
        <div class="card-body">
            <form action="{{ route('accountant') }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                <div class="row">
                    <div class="form-group col-4">
                        <label class="col-form-label">Date</label>
                        <input name="name" type="date" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">User</label>
                        <select name="user_id" id="user" class="form-control">
                            <option name="" id="">Select</option>
                            @foreach (App\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">Date</label>
                        <input name="name" type="date" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">Bagging Balance</label>
                        <input name="name" type="number" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">Date</label>
                        <input name="name" type="date" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">Ending Balance</label>
                        <input name="name" type="number" class="form-control">
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
