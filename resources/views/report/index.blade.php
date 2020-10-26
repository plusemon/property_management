@extends('layouts.dashboard')

@section('content')


<div class="row">
    <div class="card col-12">
        <h5 class="card-header">User Report</h5>
        <div class="card-body">
            <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        {{-- <th scope="col">No</th> --}}
                        <th scope="col">#</th>
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
                    {{-- @php
                        $i = 1;
                    @endphp --}}
                    @foreach ($reports as $report)
                    <tr class="{{ $report->type == 'Payment' || $report->type == 'Loan Return' ? 'text-success':'text-danger' }}">
                        {{-- <td scope="row">{{ $i++ }}</td> --}}
                        <td scope="row">{{ $report->loancounter ?? $report->id }}</td>
                        <td scope="row">{{ $report->created_at->format('d-m-Y') }}</td>
                        <td scope="row">{{ $report->type }}</td>
                        <td scope="row">{{ $report->user->name ?? 'a' }}</td>
                        <td scope="row">{{  $report->description }}</td>
                        <td scope="row">{{ $report->state == 'add' ? $report->amount:'0' }}</td>
                        <td scope="row">{{ $report->state != 'add' ? $report->amount:'0' }}</td>
                        <td scope="row">0</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
