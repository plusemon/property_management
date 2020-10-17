@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Rent / Properties</h3>
    </div>

    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Add</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Properties</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">District</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($properties as $property)
                                <tr>
                                    <td>{{ $property->id }}</td>
                                    <td>{{ $property->name }}</td>
                                    <td>{{ $property->type->name ?? 'Deleted' }}</td>
                                    <td>{{ $property->district }}</td>
                                    <td>{{ $property->city }}</td>
                                    <td>{{ $property->country }}</td>
                                    <td>{{ $property->agreements->count() ? 'Occupied':'Vacant' }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('property.edit', $property->id)}}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('property.destroy', $property->id)}}"
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



            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card-body">
                    <form action="{{ route('property.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="col-form-label"># Serial</label>
                                    <input type="hidden" name="serial" value="{{ $id = App\Property::nextId() }}">
                                    <input value="{{ $id }}" class="form-control" disabled>
                            </div>

                            <div class="col-4 form-group">
                                <label class="col-form-label">Type</label>
                                <select class="form-control" name="type_id" required>
                                    <option value="">Select type</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-4">
                                <label class="col-form-label">Property</label>
                                <input name="name" type="text" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="col-form-label">Rent (Per Month)</label>
                                <input name="rate" type="text" class="form-control" value="10000" required>
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label">District</label>
                                <input name="district" type="text" class="form-control" required>
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label">Street</label>
                                <input name="street" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="col-form-label">City</label>
                                <input name="city" type="text" class="form-control" required>
                            </div>

                            <div class="col-4 form-group">
                                <label class="col-form-label">Country</label>
                                <input name="country" type="text" class="form-control" required>
                            </div>

                            <div class="col-4 form-group">
                                <label class="col-form-label">Entry Date</label>
                                <input id="created_at" name="created_at" type="date"
                                    value="<?php echo date('Y-m-d'); ?>" class="form-control">
                            </div>
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
