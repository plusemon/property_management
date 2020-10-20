@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Borrow</h5>
        <div class="card-body">
            <form action="{{ route('wellpart.update', $wellpart->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="form-group col-3">
                        <label class="col-form-label">Borrowers</label>
                        <select class="form-control" name="user_id">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $wellpart->user->id == $user->id ? 'selected':'' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Amount</label>
                        <input type="number" name="amount" class="form-control" value="{{ $wellpart->amount }}">
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Entry Date</label>
                        <input type="date" name="created_at" class="form-control" value="{{ date("Y-m-d") }}">
                    </div>
                    <div class="form-group col-3">
                        <label class="col-form-label">Enter by</label>
                        <input name="entry" class="form-control" value="{{ auth()->user()->name }}" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="textarea">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $wellpart->description }}</textarea>
                </div>
                <div class="form-group text-right mt-4">
                    <a href="{{ route('wellpart.index') }}" class="btn btn-info">Close</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection
