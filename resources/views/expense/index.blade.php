@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Expense</h3>
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
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Invoice</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($expenses as $expense)
                                <tr>
                                    <td scope="row">{{ $expense->id }}</td>
                                    <td scope="row">{{ $expense->created_at->format('d-m-Y') }}</td>
                                    <td scope="row">{{ $expense->type->name}}</td>
                                    <td scope="row">{{ $expense->description }}</td>
                                    <td scope="row">{{ $expense->invoice}}</td>
                                    <td scope="row">{{ $expense->amount }}</td>

                                    <td class="text-right">
                                        <a href="{{ route('expense.edit', $expense->id)}}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                        <form class="d-inline" action="{{route('expense.destroy', $expense->id)}}"
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
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('expense.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="form-group col-md">
                                    <label class="col-form-label"># Serial</label>
                                    <input type="hidden" name="serial" value="{{ $id = App\Expense::nextId() }}">
                                    <input value="{{ $id }}" class="form-control" disabled>
                                </div>

                                <div class="form-group col-md">
                                    <label class="col-form-label">Invoice No</label>
                                    <input name="invoice" type="text" class="form-control" required>
                                </div>

                                <div class="form-group col-md">
                                    <label class="col-form-label">Type</label>
                                    <select name="type_id" class="form-control" required>
                                        @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
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
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="15"
                                        rows="5"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}"
                                        required>
                                </div>
                                <div class="form-group  col-md">
                                    <label class="col-form-label">Entry by</label>
                                    <input name="entry" type="text" class="form-control"
                                        value="{{ Auth::user()->name }}" disabled>
                                </div>
                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Enter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
