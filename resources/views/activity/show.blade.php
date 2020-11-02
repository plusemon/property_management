@extends('layouts.dashboard')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3>Activity Log Details</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Changes</th>
                        <th>Old Information</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <ol>
                                @foreach ($activity->changes['old'] as $key => $item)
                                <li>
                                        {{ $key }} : {{ $item }}
                                </li>
                                    @endforeach
                            </ol>
                        </td>
                        <td>
                            <ol>
                                @foreach ($activity->changes['attributes'] as $key => $item)
                                <li>
                                        {{ $key }} : {{ $item }}
                                </li>
                                    @endforeach
                            </ol>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
