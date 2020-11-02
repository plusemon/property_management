@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Edit Borrow</h5>
        <div class="card-body">
            <form action="{{ route('borrow.update',$borrow->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="col-form-label">Borrowers</label>
                        <select class="form-control" name="user_id">
                            <option value="">Select User</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $borrow->user->id ? 'selected':'' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label class="col-form-label">Amount</label>
                        <input name="amount" type="number" class="form-control" value="{{ $borrow->amount }}"
                            onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                id="word"></span></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="textarea">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ $borrow->description }}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Entry Date</label>
                        <input type="date" name="created_at" class="form-control"
                            value="{{ $borrow->created_at->format('Y-m-d') }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Accountant</label>
                        <input name="accountant_id" class="form-control" value="{{ $borrow->accountant->name }}" disabled>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="col-form-label">Entry by</label>
                        <input class="form-control" value="{{ $borrow->entry->name }}" disabled>
                    </div>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>



            </form>
        </div>
    </div>
</div>



@endsection
