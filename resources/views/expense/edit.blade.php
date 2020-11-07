@extends('layouts.dashboard')

@section('content')


<div class="row">
   <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h4>Expense Edit</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('expense.update',$expense->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="form-group col-md">
                        <label class="col-form-label">Serial No. </label>
                        <input type="number" name="serial" value="{{ $expense->id }}" class="form-control" disabled>
                    </div>

                    <div class="form-group col-md">
                        <label class="col-form-label">Invoice No</label>
                        <input name="invoice" value="{{ $expense->invoice }}" type="text" class="form-control" required>
                    </div>

                    <div class="form-group col-md">
                        <label class="col-form-label">Type</label>
                        <select name="type_id" class="form-control" required>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $expense->type_id ? 'selected':'' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md">
                        <label class="col-form-label">Taker</label>
                        <select name="taker_id" class="form-control" required>
                            @foreach (App\User::all() as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $expense->user_id ? 'selected':'' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label class="col-form-label">Amount</label>
                        <input name="amount" value="{{ $expense->amount }}" type="number" class="form-control"
                            onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                id="word"></span></div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label class="col-form-label">Description</label>
                        <textarea name="description" class="form-control" id="" cols="15"
                            rows="5">{{ $expense->description }}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md">
                        <label class="col-form-label">Entry Date</label>
                        <input name="created_at" type="date" class="form-control" value="{{$expense->created_at->format('Y-m-d')}}"
                            required>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Accountant</label>
                        <input class="form-control" value="{{ App\Accountant::active()->user->name ?? 'Not set' }}" disabled>
                    </div>
                    <div class="form-group  col-md">
                        <label class="col-form-label">Entry by</label>
                        <input type="text" class="form-control"
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

@endsection
