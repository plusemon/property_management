@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Activity Log</h3>
        </div>
        <div class="card-body">
            <table id="example" class="table table-bordered second">
                <thead>
                    <tr>
                        <th>Data and Time</th>
                        <th>Section</th>
                        <th>Serial No.</th>
                        <th>Action</th>
                        <th>By</th>
                        <th>Changes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)

                    <tr>
                        <td>{{ $activity->created_at->format('d-m-Y h:s A') }}</td>
                        <td>{{ trim($activity->subject_type,"App\\") }}</td>
                        <td>{{ $activity->subject_id }}</td>
                        <td><span class="badge badge-{{ $activity->description == 'updated' ? 'info': ($activity->description == 'deleted' ? 'danger':'success') }}">{{ $activity->description }}</span></td>
                        <td>{{ $activity->causer->name }}</td>
                        <td><button onclick="window.open('{{ route('activity.show',$activity->id) }}', '_blank')" class="btn btn-sm btn-rounded btn-dark">Show</button></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
