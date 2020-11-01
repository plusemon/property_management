@extends('layouts.dashboard')

@section('content')
<div class="col-12">
    <div class="card">

        <div class="card-header">
            <h5>Agreement Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table>
                        <tr>
                            <td>Serial No.</td>
                            <td>: #{{ $payment->id }}</td>
                        </tr>
                        <tr>
                            <td>Agreement</td>
                            <td>: {{ $payment->agreement->name }}</td>
                        </tr>
                        <tr>
                            <td>Tent Name</td>
                            <td>: <a class="badge badge-light" href="{{ route('tent.show', $payment->agreement->tent->id ) }}" target="_blank">{{ $payment->agreement->tent->fname." ".$payment->agreement->tent->lname }}</a></td>
                        </tr>
                        <tr>
                            <td>Payment to</td>
                            <td>: {{ $payment->type }}</td>
                        </tr>
                        <tr>
                            <td>Year</td>
                            <td>: {{ $payment->year }}</td>
                        </tr>
                        <tr>
                            <td>Method</td>
                            <td>: {{ $payment->method }}</td>
                        </tr>
                        <tr>
                            <td>Amount</td>
                            <td>: {{ $payment->amount }}</td>
                        </tr>
                        <tr>
                            <td>Transaction ID</td>
                            <td>: {{ $payment->tnxid }}</td>
                        </tr>

                        <tr>
                            <td>Created at</td>
                            <td>: {{ $payment->created_at }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
    </div>
</div>
@endsection
