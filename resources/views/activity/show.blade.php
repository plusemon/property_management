@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>{{ trim($activity->subject_type,"App\\") }} (#{{ $activity->subject_id }}) <span class="badge badge-{{ $activity->description == 'updated' ? 'info': ($activity->description == 'deleted' ? 'danger':'success') }}">{{ $activity->description }}</span> By <span
                    class="text-info">{{ $activity->causer->name ?? 'System' }}</span> at <span
                    class="text-info">{{ $activity->created_at->format('d-m-Y h:s A') }}</span> </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-{{ $activity->description == 'deleted' ? '12':'6' }}">
                    <h3>{{ $activity->description != 'updated' ? 'Data Information':'Current is' }}</h3>
                    <hr>
                    @foreach ($activity->changes['attributes'] as $key => $item)
                    <ol class="list-group">
                        <li class="list-group-item"><b class="text-capitalize">{{ $key }}</b> : {{ $item }}</li>
                    </ol>
                    @endforeach
                </div>
                @if ($activity->description == 'updated')
                <div class="col-md-6">
                    <h3>Old was</h3>
                    <hr>
                    @foreach ($activity->changes['old'] as $key => $item)
                    <ol class="list-group">
                        <li class="list-group-item"><b class="text-capitalize">{{ $key }}</b> : {{ $item }}</li>
                    </ol>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
        <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
    </div>
</div>

@endsection
