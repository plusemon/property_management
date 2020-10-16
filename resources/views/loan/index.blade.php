@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Loan</h3>
    </div>
    <div class="simple-card">

        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Entry</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Loan Taker</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Return Amount</th>
                                    <th scope="col">Return Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                <tr>
                                    <td scope="row">{{ $loan->id }}</td>
                                    <td scope="row">{{ $loan->created_at->format('d-m-Y') }}</td>
                                    <td scope="row">{{ $loan->user->name }}</td>
                                    <td scope="row">{{ $loan->amount }}</td>
                                    <td scope="row">{{ $loan->return_amount }}</td>
                                    <td scope="row">{{ $loan->return_date->format('d-m-Y') }}</td>

                                    <td class="text-right">
                                        <a href="{{ route('loan.edit', $loan->id)}}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('loan.destroy', $loan->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('loan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                {{-- @if (!App\Loan::count())
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Serial Number</label>
                                        <input name="id" type="text" class="form-control">
                                    </div>
                                @endif --}}
                                <div class="form-group col-6">
                                    <label class="col-form-label">Loan Taker</label>
                                    <select name="user_id" class="form-control" required>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label">Description</label>
                                   <textarea name="description" class="form-control" id="" cols="15" rows="5"></textarea>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Amount</label>
                                    <input name="amount" type="number" class="form-control" required>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Return Amount</label>
                                    <input name="return_amount" type="number" class="form-control" required>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Loan Return Date</label>
                                    <input name="return_date" type="date" class="form-control" required>
                                </div>
                                <div class="form-group col-6">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}" required>
                                </div>
                                <div class="form-group  col-6">
                                    <label class="col-form-label">Entry by</label>
                                    <input name="entry" type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
