@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('return.update', $return->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="form-group col-md-3">
                        <label class="col-form-label">Loan Number #</label>
                        <input type="text" class="form-control" value="{{ $return->id }}" disabled>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-form-label">Amount</label>
                        <input name="amount" value="{{ $return->amount }}" type="number" class="form-control"
                            onkeyup="word3.innerHTML=toWord(this.value)" autocomplete required>
                        <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                id="word3"></span></div>
                    </div>


                    <div class="form-group col-md-12">
                        <label class="col-form-label">Description</label>
                        <textarea name="description" class="form-control" id="" cols="15"
                            rows="5">{{ $return->description }}</textarea>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="col-form-label">Entry Date</label>
                        <input name="created_at" type="date" class="form-control" value="{{$return->created_at->format('Y-m-d')}}"
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



@endsection
