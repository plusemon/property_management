@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Well Part</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" data-toggle="tab" href="#list" role="tab"
                    aria-selected="true">List</a>
            </li>
            @can('wellpart manage')
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add" role="tab" aria-selected="false">Add</a>
            </li>
            @endcan
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="list" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Borrower</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Amount</th>
                                        @role('super-admin')
                                        <th scope="col">Action</th>
                                        @endrole
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($wellparts as $wellpart)
                                    <tr>
                                        <th>{{$wellpart->id}}</th>
                                        <td>{{$wellpart->created_at->format('d/m/Y')}}</td>
                                        <td>{{$wellpart->user->name}}</td>
                                        <td>{{$wellpart->description}}</td>
                                        <td>{{$wellpart->amount}}</td>
                                        @role('super-admin')
                                        <td class="text-right">
                                            <a href="{{ route('wellpart.edit', $wellpart->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('wellpart.destroy', $wellpart->id)}}"
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
            </div>

            @can('wellpart manage')
            <div class="tab-pane fade" id="add" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('wellpart.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Serial No. </label>
                                    <input type="number" name="serial" value="{{ $id = App\Wellpart::nextId() }}"
                                        class="form-control" {{ $id ? 'disabled':'' }}>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Borrowers</label>
                                    <select class="form-control" name="user_id" required
                                        <option value="">Select User</option>
                                        @foreach (App\User::all() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col">
                                    <label class="col-form-label">Amount</label>
                                    <input name="amount" type="number" class="form-control"
                                        onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                            id="word"></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="textarea">Description</label>
                                <textarea name="description" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Entry Date</label>
                                    <input type="date" name="created_at" class="form-control"
                                        value="{{ date("Y-m-d") }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Accountant</label>
                                    <input class="form-control" value="{{ App\Accountant::active()->user->name ?? 'Not set' }}" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Enter by</label>
                                    <input class="form-control" value="{{ auth()->user()->name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Add Borrow</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
            @endcan
        </div>
    </div>
</div>


@endsection
