@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Roles and Permissions</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">Roles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link border-left-0" id="home-tab-simple2" data-toggle="tab" href="#home-simple2"
                    role="tab" aria-controls="home" aria-selected="true">Permissions</a>
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
                        <div class="table-responsive ">
                            <table id="" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Permissions</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                    <tr>
                                        <th>{{$role->id}}</th>
                                        <th>{{$role->name}}</th>
                                        <th>@foreach ($role->permissions as $item)
                                            {{ $item->name }},
                                        @endforeach</th>
                                        <td class="text-right">
                                            <a href="{{ route('role.edit', $role->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('role.destroy', $role->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="name" value="{{$role->name}}">
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
            <div class="tab-pane fade" id="home-simple2" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Permissions</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <th>{{$permission->id}}</th>
                                        <th>{{$permission->name}}</th>

                                        <td class="text-right">
                                            <a href="{{ route('permission.edit', $permission->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('permission.destroy', $role->id)}}"
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-10">
                                    <label class="col-form-label">Role Name</label>
                                    <input name="name" type="text" class="form-control">
                                </div>

                                <div class="form-group text-center col-2 mt-4">
                                    <button type="submit" class="btn btn-primary">Add Role</button>
                                </div>
                            </div>

                            @foreach ($permissions as $permission)
                            <div class="form-group">
                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" id="{{ $permission->id }}">
                                    <label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                                  </div>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
