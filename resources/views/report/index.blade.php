@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Reports</h3>
    </div>
    <div class="simple-card">

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" data-toggle="tab" href="#type" role="tab"
                    aria-controls="type" aria-selected="true">Type</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="type" role="tabpanel" aria-labelledby="type">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered second">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Created</th>
                                    <th scope="col">Status</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                <tr>
                                    <th scope="row">{{$type->id}}</th>
                                    <td>{{$type->name}}</td>
                                    <td>{{ $type->created_at->format('d-m-Y') }}</td>
                                    <td>{{$type->deleted_at ? 'Deleted':'Active'}}</td>
                                    {{-- <td class="text-right">
                                        <a href="{{ route('type.edit', $type->id)}}" class="btn btn-sm btn-warning"><i
                                                class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('type.destroy', $type->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
