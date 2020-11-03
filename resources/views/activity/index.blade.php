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
                        <th>Section</th>
                        <th>Action</th>
                        <th>By</th>
                        <th>At</th>
                        <th>Changes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)

                    <tr>
                        <td>{{ trim($activity->subject_type,"App\\") }}</td>
                        <td><span class="badge badge-{{  $activity->description == 'updated' ? 'info':'danger' }}">{{ $activity->description }}</span></td>
                        <td>{{ $activity->causer->name }}</td>
                        <td>{{ $activity->created_at->format('d-m-Y h:s A') }}</td>
                        <td><button onclick="window.open('{{ route('activity.show',$activity->id) }}', '_blank')" class="btn btn-sm btn-rounded btn-dark">Show</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
