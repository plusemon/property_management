@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Updated By <span class="text-info">{{ $activity->causer->name }}</span> at <span
                    class="text-info">{{ $activity->created_at->format('d-m-Y h:s A') }}</span> </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Current is</h3>
                    <hr>
                    @foreach ($activity->changes['attributes'] as $key => $item)
                    <ol class="list-group">
                        <li class="list-group-item"><b class="text-capitalize">{{ $key }}</b> : {{ $item }}</li>
                    </ol>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <h3>Old was</h3>
                    <hr>
                    @foreach ($activity->changes['old'] as $key => $item)
                    <ol class="list-group">
                        <li class="list-group-item"><b class="text-capitalize">{{ $key }}</b> : {{ $item }}</li>
                    </ol>
                    @endforeach
                </div>
            </div>
        </div>
        <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
    </div>
</div>

@endsection
