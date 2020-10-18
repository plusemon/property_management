@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title text-capitalize">{{ request()->filter }} Types</h3>
    </div>
    <div class="simple-card">

        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" data-toggle="tab" href="#list"
                    role="tab" aria-controls="list" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add" role="tab"
                    aria-controls="add" aria-selected="false">Entry</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="list">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered second">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Under</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                <tr>
                                    <th scope="row">{{$type->id}}</th>
                                    <td>{{$type->name}}</td>
                                    <td>{{$type->type}}</td>
                                    <td>{{ $type->created_at->format('d-m-Y') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('type.edit', $type->id)}}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('type.destroy', $type->id)}}"
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

            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('type.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label"># Serial</label>
                                    <input type="hidden" name="serial" value="{{ $id = App\Type::nextId() }}">
                                    <input value="{{ $id }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Type Name</label>
                                    <input name="name" type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Under</label>
                                    <select name="type" class="form-control" required>
                                        <option value="property" {{ request()->flter == 'property' ? 'selected':'' }}>Property</option>
                                        <option value="expense" {{ request()->flter == 'expense' ? 'selected':'' }}>Expense</option>
                                    </select>
                                </div>
                                <div class="form-group  col-md-3">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}">
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
</div>

@endsection
