@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Loan</h3>
    </div>
    <div class="simple-card">

        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" data-toggle="tab" href="#list" role="tab"
                    aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#add" role="tab" aria-selected="false">Entry</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#return" role="tab" aria-selected="false">Return</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade active show" id="list" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered second" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Loan Date</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Loan Taker</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">R Amount</th>
                                    <th scope="col">R Date</th>
                                    <th scope="col">Description</th>
                                    {{-- <th scope="col">Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($loans as $loan)
                                <tr>
                                    <td scope="row">{{ $loan->id }}</td>
                                    <td scope="row">{{ $loan->created_at->format('d-m-Y') }}</td>
                                    <td scope="row">{{ $loan->type }}</td>
                                    <td scope="row">{{ $loan->user->name }}</td>
                                    <td scope="row" class="{{ $loan->type == 'return' ? 'text-success':'text-danger' }}">{{ $loan->amount }}</td>
                                    <td scope="row">{{ $loan->return_amount ?? '' }}</td>
                                    <td scope="row">{{  $loan->return_date ? $loan->return_date->format('d-m-Y'):'' }}</td>
                                    <td scope="row">{{  $loan->description }}</td>

                                    {{-- <td class="text-right"> --}}
                                        {{-- <a href="{{ route('loan.edit', $loan->id)}}" class="btn btn-sm
                                        btn-warning"><i class="fas fa-edit"></i></a> --}}
                                        {{-- <form class="d-inline" action="{{route('loan.destroy', $loan->id)}}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </form> --}}
                                    {{-- </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="add" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('loan.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <input type="hidden" name="type" value="loan">

                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Serial No. </label>
                                    <input type="number" name="serial" value="{{ $id = App\Loan::nextId() }}"
                                        class="form-control" {{ $id ? 'disabled':'' }}>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Loan Taker</label>
                                    <select name="user_id" class="form-control" required>
                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Entry Date</label>
                                    <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}"
                                        required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="col-form-label">Loan Return Date</label>
                                    <input name="return_date" type="date" class="form-control" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Amount</label>
                                    <input name="amount" type="number" class="form-control"
                                        onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                            id="word"></span></div>
                                </div>

                                <div class="form-group col-md-12">
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
                        <form action="{{ route('loan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="type" value="return">

                                {{-- <div class="form-group col-md-2">
                                    <label class="col-form-label">Serial No. </label>
                                    <input type="number" name="serial" value="{{ $id = App\Loan::nextId() }}"
                                class="form-control" {{ $id ? 'disabled':'' }}>
                            </div> --}}
                            <div class="form-group col-md-3">
                                <label class="col-form-label">Loan Taker</label>
                                <select name="user_id" id="taker" class="form-control" required>
                                    @foreach ($users as $user)
                                    <option>Select</option>
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Total Loan</label>
                                <input id="loaned" class="form-control" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Total Return</label>
                                <input id="returned" class="form-control" disabled>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">Total Due</label>
                                <input id="due" class="form-control" disabled>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-form-label">Return Amount</label>
                                <input name="amount" type="number" class="form-control"
                                onkeyup="word3.innerHTML=toWord(this.value)" autocomplete required>
                            <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                    id="word3"></span></div>
                            </div>


                            <div class="form-group col-md-12">
                                <label class="col-form-label">Description</label>
                                <textarea name="description" class="form-control" id="" cols="15" rows="5"></textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">Entry Date</label>
                                <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}"
                                    required>
                            </div>
                            <div class="form-group  col-md-4">
                                <label class="col-form-label">Entry by</label>
                                <input name="entry" type="text" class="form-control" value="{{ Auth::user()->name }}"
                                    disabled>
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

@section('scripts')
    <script>
    // Get and show Loan information
    $('#taker').on('change', function() {
        var id = $(this).val();
        var url = '{{ url('api/loan-info') }}?user=' + id;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                $('#loaned').val(data.loan);
                $('#returned').val(data.return);
                $('#due').val(data.due);
            }
        });
    });
    </script>
@endsection
