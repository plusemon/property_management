@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Properties</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Entry</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">

                <div class="card">
                    <h3 class="card-header">Tents</h3>
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Courtry</th>
                                        <th scope="col">Granters</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tents as $tent)
                                    <tr>
                                        <th scope="row">{{ $tent->id }}</th>
                                        <td>{{ $tent->fname.' '.$tent->lname }}</td>
                                        <td>
                                            {{ json_decode($tent->contact)[0] }}<br>
                                        </td>
                                        <td>{{ $tent->address}}</td>
                                        <td>{{ $tent->city }}</td>
                                        <td>{{ $tent->country }}</td>
                                        <td>{{ $tent->g1_fname.' '.$tent->g1_lname }}<br>{{ $tent->g2_fname.' '.$tent->g2_lname }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('tent.show', $tent->id)}}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-eye"></i></a>

                                            <a href="{{ route('tent.edit', $tent->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('tent.destroy', $tent->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="simple-card">
                    <div class="tab-content" id="myTabContent5">
                        <form action="{{ route('tent.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="tab-pane fade active show" id="home-simple" role="tabpanel"
                                aria-labelledby="home-tab-simple">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Fist Name</label>
                                        <input name="tent[fname]" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="col-form-label">Last Name</label>
                                        <input name="tent[lname]" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CINC</label>
                                        <input name="tent[cnic]" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CINC Attachment</label>
                                        <input name="tent[cnica]" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col-">
                                    <label class="col-form-label">Address</label>
                                    <input name="tent[address]" type="text" class="form-control" required>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">City</label>
                                        <input name="tent[city]" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Country</label>
                                        <input name="tent[country]" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="form-group col-10">
                                            <label class="col-form-label">Contact</label>
                                            <input name="tent[contact][]" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group col-1" style="margin: 37px auto auto;">
                                            <i type="button" class="btn btn-sm btn-success add_button fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>

                                <h4 class="mt-5 mb-0">Granter information</h4>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Fist Name</label>
                                        <input name="g1[fname]" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="col-form-label">Last Name</label>
                                        <input name="g1[lname]" type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CINC</label>
                                        <input name="g1[cnic]" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CINC Attachment</label>
                                        <input name="g1[cnica]" type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Address</label>
                                    <input name="g1[address]" type="text" class="form-control" required>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">City</label>
                                        <input name="g1[city]" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Country</label>
                                        <input name="g1[country]" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="form-group col-10">
                                            <label class="col-form-label">Contact</label>
                                            <input name="g1[contact][]" type="text" class="form-control" required>
                                        </div>
                                        <div class="form-group col-1" style="margin: 37px auto auto;">
                                            <i type="button"
                                                class="btn btn-sm btn-success add_buttong1 fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="mb-0">Add Another Granter</h4>

                            <div class="switch-button">
                                <input type="checkbox" id="addg2"><span>
                                    <label for="addg2"></label></span>
                            </div>

                            <div style="display:none" id="g2">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Fist Name</label>
                                        <input name="g2[fname]" type="text" class="form-control">
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="col-form-label">Last Name</label>
                                        <input name="g2[lname]" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CINC</label>
                                        <input name="g2[cnic]" type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CINC Attachment</label>
                                        <input name="g2[cnica]" type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Address</label>
                                    <input name="g2[address]" type="text" class="form-control">
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">City</label>
                                        <input name="g2[city]" type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Country</label>
                                        <input name="g2[country]" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="form-group col-10">
                                            <label class="col-form-label">Contact</label>
                                            <input name="g2[contact][]" type="text" class="form-control">
                                        </div>
                                        <div class="form-group col-1" style="margin: 37px auto auto;">
                                            <i type="button"
                                                class="btn btn-sm btn-success add_buttong2 fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Save Tent</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection