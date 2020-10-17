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


@endsection
