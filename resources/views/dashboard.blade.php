@extends('layouts.dashboard')

@section('content')

<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Borrow</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->borrow }} | ${{ $value->borrow }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('borrow.index') }}">View</a></div>

            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Employee</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->employee }} | ${{ $value->employee }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('user.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Well Part</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->wellpart }} | ${{ $value->wellpart }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('borrow.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Loan</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->loan }} | ${{ $value->loan }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('loan.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Loan Return</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->return }} | ${{ $value->return }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('loan.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Payment</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->payment }} | ${{ $value->payment }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('payment.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Refund</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">{{ $total->refund }} | ${{ $value->refund }}</h2>
                </div>
                <div class="text-right"><a href="{{ route('borrow.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Cash On Hand</h4>
                <div class="metric-value d-inline-block">
                    <h2 class="mb-1">${{ $value->cash }}</h2>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card col-12">
        <h5 class="card-header">Over All Reports</h5>
        <div class="card-body">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Loan Taker</th>
                        <th scope="col">Action</th>
                        <th scope="col">Amount</th>
                        <th scope="col">R Amount</th>
                        <th scope="col">R Date</th>
                        <th scope="col">Description</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($loans as $loan)
                    <tr>
                        <td scope="row">{{ $loan->id }}</td>
                        <td scope="row">{{ $loan->created_at->format('d-m-Y') }}</td>
                        <td scope="row">{{ $loan->user->name }}</td>
                        <td scope="row">{{ $loan->type }}</td>
                        <td scope="row"
                            class="{{ $loan->type == 'loan' ? 'text-danger':'text-success' }}">
                            {{ $loan->amount }}</td>
                        <td scope="row">{{ $loan->return_amount ?? '' }}</td>
                        <td scope="row">{{  $loan->return_date ? $loan->return_date->format('d-m-Y'):'' }}
                        </td>
                        <td scope="row">{{  $loan->description }}</td>

                        {{-- <td class="text-right"> --}}
                        {{-- <a href="{{ route('loan.edit', $loan->id)}}" class="btn btn-sm
                        btn-warning"><i class="fas fa-edit"></i></a> --}}
                        {{-- <form class="d-inline" action="{{route('loan.destroy', $loan->id)}}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i
                                class="fas fa-trash-alt"></i></button>
                        </form> --}}
                        {{-- </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
