@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Loan</h3>
    </div>
    <div class="simple-card">

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" data-toggle="tab" href="#loan_list" role="tab"
                    aria-selected="true">Loan List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#return_list" role="tab" aria-selected="false">Return
                    list</a>
            </li>
            @can('loan manage')
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add" role="tab" aria-selected="false">Loan</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#return" role="tab" aria-selected="false">Return</a>
            </li>
            @endcan
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="loan_list" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered " style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Loan Taker</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Return Amount</th>
                                    @can('loan manage')
                                    <th scope="col">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                <tr>
                                    <td scope="row">{{ $loan->id }}</td>

                                    <td scope="row">{{ $loan->taker->name }}</td>
                                    <td scope="row">{{ $loan->amount }}</td>
                                    <td scope="row" class="text-danger">{{ $loan->return_amount ?? '' }}</td>

                                    @can('loan manage')
                                    <td class="text-right">
                                        <a href="#" onclick="window.open('{{ route('activity',['loan', $loan->id]) }}', '_blank')" class="btn btn-sm btn-dark"><i class="fas fa-history"></i></a>
                                    <a href="{{ route('loan.edit', $loan->id)}}" class="btn btn-sm
                                    btn-warning"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline" action="{{route('loan.destroy', $loan->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                    </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="return_list" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered " style="width:100%">
                            <thead>
                                <tr>

                                    <th scope="col">Loan No.</th>
                                    <th scope="col">Taker</th>
                                    <th scope="col">Return Amount</th>
                                    <th scope="col">Remain Amount</th>
                                    <th scope="col">Accually Loan</th>
                                    @can('loan manage')
                                    <th scope="col">Action</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($returns as $return)
                                <tr>

                                    <td scope="row">{{ $return->loancounter }}</td>
                                    <td scope="row">{{ $return->loan->taker->name }}</td>
                                    <td scope="row" class="text-success">{{ $return->amount }}</td>
                                    <td scope="row" class="text-danger">{{ $return->remain }}</td>
                                    <td scope="row">{{ $return->loan->amount }}</td>

                                    @can('loan manage')


                                    <td class="text-right">
                                        <a href="#" onclick="window.open('{{ route('activity',['return', $return->id]) }}', '_blank')" class="btn btn-sm btn-dark"><i class="fas fa-history"></i></a>
                                    <a href="{{ route('return.edit', $return->id)}}" class="btn btn-sm
                                    btn-warning"><i class="fas fa-edit"></i></a>
                                    <form class="d-inline" action="{{route('return.destroy', $return->id)}}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                            class="fas fa-trash-alt"></i></button>
                                    </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @can('loan manage')
            <div class="tab-pane fade" id="add" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('loan.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Serial No. </label>
                                    <input type="number" name="serial" value="{{ $id = App\Loan::nextId() }}"
                                        class="form-control" {{ $id ? 'disabled':'' }}>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Loan Taker</label>
                                    <select name="user_id" class="form-control" required>
                                        @foreach (App\User::all() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Loan Return Date</label>
                                    <input name="return_date" type="date" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Amount</label>
                                    <input name="amount" type="number" class="form-control"
                                        onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                            id="word"></span></div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Return Amount</label>
                                    <input name="return_amount" type="number" class="form-control"
                                        onkeyup="word2.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                            id="word2"></span></div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="15"
                                        rows="5"></textarea>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}"
                                        required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Accountant</label>
                                    <input name="accountant_id" class="form-control"
                                        value="{{ App\Accountant::active()->user->name ?? 'Not set' }}" disabled>
                                </div>
                                <div class="form-group  col-md-4">
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
            <div class="tab-pane fade" id="return" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('return.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Loan Number #</label>
                                    <select name="loan_id" id="loan_id" class="form-control">
                                        <option value="">Select</option>
                                        @foreach (App\Loan::all() as $loan)
                                        <option value="{{ $loan->id }}">{{ $loan->id }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Total Amount</label>
                                    <input id="loaned" class="form-control" disabled>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Returned</label>
                                    <input id="returned" class="form-control" disabled>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Remaining</label>
                                    <input id="due" class="form-control" disabled>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Amount</label>
                                    <input name="amount" type="number" class="form-control"
                                        onkeyup="word3.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                            id="word3"></span></div>
                                </div>


                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Description</label>
                                    <textarea name="description" class="form-control" id="" cols="15"
                                        rows="5"></textarea>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-form-label">Accountant</label>
                                    <input name="accountant_id" class="form-control"
                                        value="{{ App\Accountant::active()->user->name ?? 'Not set' }}" disabled>
                                </div>
                                <div class="form-group  col-md-4">
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
            @endcan
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Get and show Loan information
    $('#loan_id').on('change', function() {
        var id = $('#loan_id').val();
        var url = '{{ url('api/loan-info') }}?loan=' + id;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                $('#loaned').val(data.loan);
                $('#returned').val(data.return);
                $('#due').val(data.due);
            },
            error: function(){
                toastr.warning('No Loan found');
                $('#loaned').val('');
                $('#returned').val('');
                $('#due').val('');
            }
        });
    });
</script>
@endsection
