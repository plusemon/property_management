@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Activity Log</h3>
        </div>
        <div class="card-body">
            <table id="" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Times</th>
                        <th>Action</th>
                        <th>By</th>
                        <th>Data and Time</th>
                        <th>Changes</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = $activities->count();
                    @endphp
                    @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $i--.' time' }}</td>
                        <td><span class="badge badge-info">{{ $activity->description }}</span></td>
                        <td>{{ $activity->causer->name ?? 'system'}}</td>
                        <td>{{ $activity->created_at->format('d-m-Y h:s A') }}</td>
                        <td><button onclick="window.open('{{ route('activity.show',$activity->id) }}', '_blank')" class="btn btn-sm btn-rounded btn-dark">Details</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
