@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Borrows</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            @can('borrow manage')
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Add</a>
            </li>
            @endcan
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
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
                                    @foreach ($borrows as $borrow)
                                    <tr>
                                        <th>{{$borrow->id}}</th>
                                        <td>{{ $borrow->created_at->format('d-m-Y') }}</td>
                                        <td>{{$borrow->user->name}}</td>
                                        <td>{{$borrow->description}}</td>
                                        <td>{{$borrow->amount}}</td>
                                        @role('super-admin')
                                        <td class="text-right">
                                        <a href="#" onclick="window.open('{{ route('activity',['borrow', $property->id]) }}', '_blank')" class="btn btn-sm btn-dark"><i class="fas fa-history"></i></a>
                                        <a href="{{ route('borrow.edit', $borrow->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('borrow.destroy', $borrow->id)}}"
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

            @can('borrow manage')
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('borrow.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label class="col-form-label">Serial No. </label>
                                    <input type="number" name="serial" value="{{ $id = App\Borrow::nextId() }}" class="form-control" {{ $id ? 'disabled':'' }}>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Borrowers</label>
                                    <select class="form-control" name="user_id">
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
                                <textarea name="description" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Entry Date</label>
                                    <input type="date" name="created_at" class="form-control"
                                        value="{{ date("Y-m-d") }}">
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Accountant</label>
                                    <input name="accountant_id" class="form-control" value="{{ App\Accountant::active()->user->name ?? 'Not set' }}" disabled>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Entry by</label>
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
