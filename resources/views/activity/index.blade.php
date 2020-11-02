@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Activity Log</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Date and Time</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)

                    <tr>
                        <td>{{ $activity->causer->name }}</td>
                        <td><span class="badge badge-{{  $activity->description == 'updated' ? 'info':'danger' }}">{{ $activity->description }}</span></td>
                        <td>{{ $activity->created_at->format('d-m-Y h:s A') }}</td>
                        <td><a href="{{ route('activity.show',$activity->id) }}" class="btn btn-sm btn-rounded btn-dark">Show</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
