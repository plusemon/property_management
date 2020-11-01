@extends('layouts.dashboard')

@section('content')
<div class="col-12">
    <div class="card">

        <div class="card-header">
            <h5>Detailed Tent Information</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th class="h5">Tent Information</th>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td>: {{ $tent->fname }} {{ $tent->lname }}</td>
                        </tr>
                        <tr>
                            <td>CNIC No.</td>
                            <td>: {{ $tent->cnic }}</td>
                        </tr>
                        <tr>
                            <td>CNIC Attachment</td>
                            <td> : <a class="badge badge-secondary" href="{{ url('public/storage/'.$tent->cnica) }}" target="_blank">View</a></td>
                        </tr>
                        <tr>
                            <td>Adress</td>
                            <td>: {{ $tent->address }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>: {{ $tent->city }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>: {{ $tent->country }}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>: {{ $tent->contact1 }}, {{ $tent->contact2 ?? '' }}, {{ $tent->contact3 ?? '' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table>
                        <tr>
                            <th class="h5">Granter</th>
                        </tr>
                        <tr>
                            <td>Granter Name</td>
                            <td>: {{ $tent->g1_fname }} {{ $tent->g1_lname }}</td>
                        </tr>
                        <tr>
                            <td>CNIC No.</td>
                            <td>: {{ $tent->g1_cnic }}</td>
                        </tr>
                        <tr>
                            <td>CNIC Attachment</td>
                            <td> : <a class="badge badge-secondary" href="{{ url('public/storage/'.$tent->g1_cnica) }}" target="_blank">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Adress</td>
                            <td>: {{ $tent->g1_address }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>: {{ $tent->g1_city }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>: {{ $tent->g1_country }}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>: {{ $tent->g1_contact1 }}, {{ $tent->g1_contact2 ?? '' }},
                                {{ $tent->g1_contact3 ?? '' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-4">
                    <table>

                        <tr>
                            <th class="h5">Granter 2</th>
                        </tr>
                        <tr>
                            <td>Granter Name</td>
                            <td>: {{ $tent->g2_fname }} {{ $tent->g2_lname }}</td>
                        </tr>
                        <tr>
                            <td>CNIC No.</td>
                            <td>: {{ $tent->g2_cnic }}</td>
                        </tr>
                        <tr>
                            <td>CNIC Attachment</td>
                            <td> : <a class="badge badge-secondary" href="{{ url('public/storage/'.$tent->g2_cnica) }}" target="_blank">View</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Adress</td>
                            <td>: {{ $tent->g2_address }}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>: {{ $tent->g2_city }}</td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>: {{ $tent->g2_country }}</td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>: {{ $tent->g2_contact1 }}, {{ $tent->g2_contact2 ?? '' }},
                                {{ $tent->g2_contact3 ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

        </div>
        <button onclick="window.close('_self')" class="btn btn-brand float-right">Close</button>
    </div>
</div>
@endsection
