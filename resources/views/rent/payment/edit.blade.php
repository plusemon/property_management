@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="card">
        <h3 class="card-header">Update Payment</h3>
        <div class="card-body">
            <form action="{{ route('payment.update',$payment->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-12 form-group">
                    <label class="col-form-label">Agreement</label>
                    <input type="text" class="form-control" value="{{ $payment->agreement->name }}" disabled>
                </div>

                <div class="row">


                    <div class="form-group col-3">
                        <label class="col-form-label">Type</label>
                        <input type="text" class="form-control" value="{{ $payment->agreement->property->type->name }}" disabled>
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Property</label>
                        <input value="{{ $payment->agreement->property->name }}" type="text" class="form-control" disabled>
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Tent</label>
                        <input value="{{ $payment->agreement->tent->fname.' '.$payment->agreement->tent->lname }}" type="text" class="form-control" disabled>
                    </div>
                    <div class="form-group col-3">
                        <label class="col-form-label">Rent</label>
                        <input value="{{ $payment->agreement->property->rate }}" type="text" class="form-control" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-3 form-group">
                        <label class="col-form-label">Payment Method</label>
                        <select class="form-control" name="method" id="method" required>
                            <option value="">Select Method</option>
                            <option value="cash" {{ $payment->method == 'cash' ? 'selected':'' }}>Cash</option>
                            <option value="bank" {{ $payment->method == 'bank' ? 'selected':'' }}>Bank</option>
                        </select>
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Pay Amount</label>
                        <input name="amount" type="number" class="form-control" value="{{ $payment->amount }}">
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Bank A/C no</label>
                        <input name="account" type="text" class="form-control" value="{{ $payment->account }}">
                    </div>

                    <div class="form-group col-3">
                        <label class="col-form-label">Remarks</label>
                        <input name="remarks" type="text" class="form-control" value="{{ $payment->remarks }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 form-group">
                        <label class="col-form-label">Entry Date</label>
                        <input id="created_at" name="created_at" type="date" value="{{ $payment->created_at->format('Y-m-d') }}" class="form-control">
                    </div>
                    <div class="col-4 form-group">
                        <label class="col-form-label">Enter By</label>
                        <input value="{{$payment->entry->name ?? ''}}" class="form-control" disabled>
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
