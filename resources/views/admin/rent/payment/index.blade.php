@extends('layouts.dashboard')

@section('content')

{{-- <div class="col-12 text-right">
    <a href="{{ url('admin/payment/type') }}" class="btn btn-primary">Add New Type</a>
</div> --}}

<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Rent / Payments</h3>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Pay</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    {{-- <h5 class="card-header">Payments</h5> --}}
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Agreement</th>
                                        <th scope="col">Tent</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Account</th>
                                        <th scope="col">Remarks</th>
                                        <th scope="col">Enter by</th>
                                        <th scope="col">Entry Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->agreement->name }}</td>
                                        <td>{{ $payment->agreement->tent->fname.' '.$payment->agreement->tent->lname}}</td>
                                        <td>{{ $payment->amount }}</td>
                                        <td>{{ $payment->method }}</td>
                                        <td>{{ $payment->account }}</td>
                                        <td>{{ $payment->remarks }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td>{{ $payment->created_at->format('d-m-Y') }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('payment.edit', $payment->id)}}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('payment.destroy', $payment->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <div class="col-12 form-group">
                            <label class="col-form-label">Agreement</label>
                            <select class="form-control" name="agreement_id" id="agreements" required>
                                <option value="">Select Agreement</option>
                                @foreach ($agreements as $agreement)
                                <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            

                            <div class="form-group col-3">
                                <label class="col-form-label">Type</label>
                                <input id="type" type="text" class="form-control" disabled>
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Property</label>
                                <input id="property" type="text" class="form-control" disabled>
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Tent</label>
                                <input id="tent" type="text" class="form-control" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label class="col-form-label">Rent</label>
                                <input id="rent" type="text" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-3 form-group">
                                <label class="col-form-label">Payment Method</label>
                                <select class="form-control" name="method" id="method" required>
                                    <option value="">Select Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Pay Amount</label>
                                <input name="amount" type="number" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Bank A/C no</label>
                                <input id="acno" name="account" type="text" class="form-control" disabled>
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Remarks</label>
                                <input name="remarks" type="text" class="form-control">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="col-form-label">Entry Date</label>
                                <input id="created_at" name="created_at" type="date" value="{{ date('Y-m-d') }}" class="form-control">
                            </div> 
                            <div class="col-4 form-group">
                                <label class="col-form-label">Enter By</label>
                                <input value="{{auth()->user()->name}}" class="form-control" disabled>
                            </div>      
                        </div>


                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection



@section('scripts')
<script>

    $('#agreements').on('change', function() {
        var agreement = $(this).val();
        var url = '{{ url('admin/get-agreement') }}?id=' + agreement;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                // if (!data.length) {
                //     toastr.info('No property found');
                // }

                $('#type').val(data.type);
                $('#property').val(data.property);
                $('#tent').val(data.tent);
                $('#rent').val(data.rent);
            }
        });
    });

    $('#method').on('change', function() {
        var method = $(this).val();
        
        if (method == 'bank') {
            $('#acno').prop("disabled", false);
        }else{
            $('#acno').prop("disabled", true);
        }
    });


    
</script>
@endsection