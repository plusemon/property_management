@extends('layouts.dashboard')

@section('content')


<div class="row">
    <div class="card col-12">
        <h5 class="card-header">User Report</h5>
        <div class="card-body">
            <form action="{{ route('report.index') }}" method="GET">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="user">Users</label>
                        <select name="user_id" id="" class="form-control">
                            <option value="">Select User</option>
                            @foreach (App\User::all() as $user)
                                <option value="{{ $user->id }}" {{ request()->user_id == $user->id ?'selected':'' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Date from</label>
                        <input name="from" type="date" class="form-control" value="{{request()->from}}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="">Date to</label>
                        <input name="to" type="date" class="form-control" value="{{request()->to}}">
                    </div>
                    <div class="form-group col-md-2">
                        <input type="submit" class="btn btn-primary mt-4" value="Go">
                        <a href="{{ route('report.index') }}" class="btn btn-dark mt-4">Reset</a>
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="expense" id="expense" {{ request()->expense ? 'checked':'' }}>
                            <label class="custom-control-label" for="expense">Expense</label>
                          </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="borrow" id="borrow" {{ request()->borrow ? 'checked':'' }}>
                            <label class="custom-control-label" for="borrow">Borrow</label>
                          </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="loan" id="loan" {{ request()->loan ? 'checked':'' }}>
                            <label class="custom-control-label" for="loan">Loan</label>
                          </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="return" id="return" {{ request()->return ? 'checked':'' }}>
                            <label class="custom-control-label" for="return">Loan Return</label>
                          </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="wellpart" id="wellpart" {{ request()->wellpart ? 'checked':'' }}>
                            <label class="custom-control-label" for="wellpart">Well Part</label>
                          </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="payment" id="payment" {{ request()->payment ? 'checked':'' }}>
                            <label class="custom-control-label" for="payment">Payment</label>
                          </div>
                    </div>
                    <div class="form-group col-md">
                        <div class="custom-control custom-checkbox my-1 mr-sm-2">
                            <input type="checkbox" class="custom-control-input" name="refund" id="refund" {{ request()->refund ? 'checked':'' }}>
                            <label class="custom-control-label" for="refund">Payment Refund</label>
                          </div>
                    </div>
                </div>
            </form>
            @if ($reports)
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">S/N</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                        <th scope="col">Taker/Receiver</th>
                        <th scope="col">Description</th>
                        <th scope="col">Amount In</th>
                        <th scope="col">Amount Out</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        $add = 0;
                    @endphp
                    @foreach ($reports as $report)
                    <tr>
                        <td scope="row">{{ $i++ }}</td>
                        <td scope="row">{{ $report->loancounter ?? $report->id }}</td>
                        <td scope="row">{{ $report->created_at->format('d-m-Y') }}</td>
                        <td scope="row">{{ $report->type }}</td>
                        <td scope="row">{{ $report->user->name ?? 'a' }}</td>
                        <td scope="row">{{  $report->description }}</td>
                        <td scope="row" class="text-success">{{ $report->state == 'add' ? $report->amount:'0' }}
                            @php
                               $add += $report->amount;
                            @endphp
                        </td>
                        <td scope="row" class="text-danger">{{ $report->state != 'add' ? $report->amount:'0' }}</td>
                        <td scope="row">{{ $add }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total</td>
                        <td><b>{{ $reports->where('state','add')->sum('amount') }}</b></td>
                        <td><b>{{ $reports->where('state','!=','add')->sum('amount') }}</b></td>
                        <td><b></b></td>
                    </tr>
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>

@endsection
