@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Properties</h3>
    </div>

    <div class="simple-card">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list"
                    role="tab" aria-controls="list" aria-selected="true">List</a>
            </li>
            @can('property manage')
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#add" role="tab"
                    aria-controls="add" aria-selected="false">Add</a>
            </li>
            @endcan
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
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
                                    @role('super-admin')
                                    <th scope="col">Action</th>
                                    @endrole
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
                                    <td class="{{ $property->agreements->count() ? 'text-success':'text-danger' }}">{{ $property->agreements->count() ? 'Occupied':'Vacant' }}</td>
                                    @role('super-admin')
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
                                    @endrole
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            @can('property manage')
            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add">
                <div class="card-body">
                    <form action="{{ route('property.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- <div class="form-group col-md">
                                <label class="col-form-label">Serial No.</label>
                                    <input type="hidden" name="serial" value="{{ $id = App\Property::nextId() }}">
                                    <input value="{{ $id }}" class="form-control" disabled>
                            </div> --}}

                            <div class="col-md form-group">
                                <label class="col-form-label">Type</label>
                                <select class="form-control" name="type_id" required>
                                    <option value="">Select type</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md">
                                <label class="col-form-label">Property</label>
                                <input name="name" type="text" class="form-control" value="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col">
                                <label class="col-form-label">Rent (Per Month)</label>
                                <input name="rate" type="number" value="1000" class="form-control"
                                    onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                        id="word"></span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-group">
                                <label class="col-form-label">District</label>
                                <input name="district" type="text" class="form-control" required>
                            </div>
                            <div class="col-md form-group">
                                <label class="col-form-label">Street</label>
                                <input name="street" type="text" class="form-control" required>
                            </div>

                            <div class="col-md form-group">
                                <label class="col-form-label">City</label>
                                <input name="city" type="text" class="form-control" required>
                            </div>

                            <div class="col-md form-group">
                                <label class="col-form-label">Country</label>
                                <input name="country" type="text" class="form-control" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md form-group">
                                <label class="col-form-label">Entry Date</label>
                                <input id="created_at" name="created_at" type="date"
                                    value="<?php echo date('Y-m-d'); ?>" class="form-control">
                            </div>
                            <div class="col-md form-group">
                                <label class="col-form-label">Entry By</label>
                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>


@endsection
