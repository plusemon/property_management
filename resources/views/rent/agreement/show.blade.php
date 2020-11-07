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
                            <td>Status</td>
                            <td>:
                                @can('agreement manage')
                                <form class="d-inline"
                                    action="{{route('agreement.update', $agreement->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ($agreement->incr_at)
                                    <p class="btn badge badge-danger">Expired</p>
                                    @else
                                    @if ($agreement->status)
                                    <input type="hidden" name="status" value="0">
                                    <button type="submit" class="btn badge badge-success">Actived</button>
                                    @else
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit"
                                        class="btn badge badge-secondary">Inactived</button>
                                    @endif
                                    @endif
                                </form>
                                @else
                                {{ $agreement->status ? 'Active':'Inactive'}}
                                @endcan
                            </td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>: {{ $agreement->name }}</td>
                        </tr>

                        <tr>
                            <td>Period</td>
                            <td>: {{ $agreement->period }} Months</td>
                        </tr>
                        <tr>
                            <td>Tent Name</td>
                            <td>: <a class="badge badge-light" href="{{ route('tent.show', $agreement->tent->id ) }}" target="_blank">{{ $agreement->tent->fname." ".$agreement->tent->lname }}</a></td>
                        </tr>
                        <tr>
                            <td>Property</td>
                            <td>: {{ $agreement->property->name }}</td>
                        </tr>
                        <tr>
                            <td>Property Type</td>
                            <td>: {{ $agreement->property->type->name }}</td>
                        </tr>
                        <tr>
                            <td>Security Money</td>
                            <td>: {{ $agreement->security }}</td>
                        </tr>
                        <tr>
                            <td>Increment %</td>
                            <td>: {{ $agreement->incr }}</td>
                        </tr>
                        <tr>
                            <td>Attachement</td>
                            <td>: <a class="badge badge-secondary" href="{{ url('public/storage/'.$agreement->attachment) }}" target="_blank">View</a></td>
                        </tr>
                        <tr>
                            <td>Started</td>
                            <td>: {{ $agreement->created_at->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
    </div>
</div>
@endsection
