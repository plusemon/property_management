@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Loan</h5>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('loan.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        @if (!App\Loan::count())
                            <div class="form-group col-6">
                                <label class="col-form-label">Serial Number</label>
                                <input name="id" value="{{ $loan->id }}" type="text" class="form-control" disabled>
                            </div>
                        @endif
                        <div class="form-group col-6">
                            <label class="col-form-label">Loan Taker</label>
                            <select name="user_id" class="form-control" required>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $loan->user->id == $user->id ? 'selected':'' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-12">
                            <label class="col-form-label">Description</label>
                           <textarea name="description" class="form-control" id="" cols="15" rows="5">{{ $loan->description }}</textarea>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Amount</label>
                            <input name="amount" value="{{ $loan->amount }}" type="number" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Return Amount</label>
                            <input name="return_amount" value="{{ $loan->return_amount }}" type="number" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Loan Return Date</label>
                            <input name="return_date" value="{{ $loan->return_date->format('Y-m-d') }}" type="date" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Entry Date</label>
                            <input name="created_at" value="{{ $loan->created_at->format('Y-m-d') }}" type="date" class="form-control" value="{{date('Y-m-d')}}" required>
                        </div>
                        <div class="form-group  col-6">
                            <label class="col-form-label">Entry by</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        </div>
                    </div>
                    <div class="form-group text-right mt-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection