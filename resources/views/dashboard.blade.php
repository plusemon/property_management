@extends('layouts.dashboard')

@section('content')



@if (!App\Accountant::active())
    <div class="alert alert-danger"><span class="text-danger">Acction Required: </span> Please assign an <a href="{{ route('accountant.index') }}">Accountant</a> before get started!</div>
@endif

<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Payment</h4>
                <h3 class="mb-1 ">
                    {{ App\Payment::whereType('rent')->count() }} | Total <span
                        class="float-right text-success">${{ $rentPayment = App\Payment::whereType('rent')->sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('payment.index') }}">View</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Rent Refund</h4>
                <h3 class="mb-1 ">
                    {{ App\PaymentReturn::count() }} | Total <span
                        class="float-right text-danger">${{ $rentReturn = App\PaymentReturn::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('payment.index') }}">View</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Borrow</h4>
                <h3 class="mb-1 ">
                    {{ App\Borrow::count() }} | Total <span
                        class="float-right text-danger">${{ $borro = App\Borrow::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('borrow.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Loan</h4>
                <h3 class="mb-1 ">
                    {{ App\Loan::count() }} | Total <span
                        class="float-right text-danger">${{ $loan = App\Loan::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('loan.index') }}">View</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Loan Return</h4>
                <h3 class="mb-1 ">
                    {{  App\LoanReturn::count() }} | Total <span
                        class="float-right text-success">${{ $loanReturn =  App\LoanReturn::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('loan.index') }}">View</a></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Expense</h4>
                <h3 class="mb-1 ">
                    {{ App\Expense::count() }} | Total <span
                        class="float-right text-danger">${{ $expense = App\Expense::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('expense.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Well Part</h4>
                <h3 class="mb-1 ">
                    {{ App\WellPart::count() }} | Total <span
                        class="float-right text-danger">${{ $wellPart = App\WellPart::sum('amount') }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('wellpart.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">User</h4>
                <h3 class="mb-1 ">
                    Total <span class="float-right text-danger">{{ App\User::count() }}</span>
                </h3>
                <div class="text-right"><a href="{{ route('user.index') }}">View</a></div>

            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h4 class="text-muted text-uppercase">Cash on hand</h4>
                <h2 class="mb-1 ">
                    <span class="float-right text-primary">
                        ${{ ($rentPayment+$loanReturn)-($rentReturn+$borro+$loan+$expense+$wellPart) }}</span>
                </h2>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="card col-12">
        <h5 class="card-header">Over All Reports</h5>
        <div class="card-body">
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

<a class="float-right" href="#" data-toggle="modal" data-target="#updateModal">Whats New?</a>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalHeader">Updated Information</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Accountant Completed</li>
                    <li>For get update: <code>git pull</code></li>
                    <li>After get update: <code>php artisan migrate:fresh --seed</code></li>
                </ol>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-light" data-dismiss="modal">Close</a>
                <form action="{{ route('setting.update', 1) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input name="whatsnew" type="hidden" value="0">
                    <button type="submit" class="btn btn-warning">Don't show again</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    var whatsnew = {{ App\Setting::first()->whatsnew ?? '' }};
    $(document).ready(function() {
       if (whatsnew) {
            $('#updateModal').modal();
        }
    });
</script>
@endsection
