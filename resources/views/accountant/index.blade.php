@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Accounted Assigned</h5>
        <div class="card-body">
            <form action="{{ route('accountant.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-4">
                        <label class="col-form-label">User</label>
                        <select name="user_id" id="user" class="form-control" required>
                            <option value="">Select</option>
                            @foreach (App\User::all() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">Start Date</label>
                        <input name="start" type="date" class="form-control" {{ $last = App\Accountant::count() ? 'disabled':'' }} value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group col-4">
                        <label class="col-form-label">Begening Balance</label>
                        <input name="sbalance" type="number" value="{{ $balance['now'] ?? '' }}" class="form-control" required {{ App\Accountant::count() ? 'disabled':'' }}>
                    </div>
                </div>
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <table class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Start Balance</th>
                    <th scope="col">Current Balance</th>
                    <th scope="col">End Balance</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($accountants as $accountant)
                <tr>
                    <td scope="row">{{ $accountant->id }}</td>
                    <td scope="row">{{ $accountant->user->name }}</td>
                    <td scope="row">{{ $accountant->start->format('d-m-Y') }}</td>
                    <td scope="row">{{ $accountant->end ? $accountant->end->format('d-m-Y'):'N/A' }}</td>
                    <td scope="row">{{ $accountant->sbalance }}</td>
                    <td scope="row">{{ $accountant->status ? $balance['now']:$accountant->balance }}</td>
                    <td scope="row">{{ $accountant->ebalance ?? 'N/A' }}</td>
                    <td scope="row" class="{{ $accountant->status ? 'text-success':'text-danger' }}">{{ $accountant->status ? 'Actived':'Inactived' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>





@endsection
