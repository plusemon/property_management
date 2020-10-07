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
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple2" data-toggle="tab" href="#profile-simple2" role="tab"
                    aria-controls="profile" aria-selected="false">Refund</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            {{-- List of payments  --}}
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Pay for</th>
                                        <th scope="col">Transaction id</th>
                                        <th scope="col">Agreement</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Property</th>
                                        <th scope="col">Tent</th>
                                        <th scope="col">Amount</th>
                                        {{-- <th scope="col">Yearly Increment(%)</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->created_at->format('d-m-y') }}</td>
                                        <td>{{ $payment->type }}</td>
                                        <td>{{ $payment->tnxid }}</td>
                                        <td>{{ $payment->agreement->name }}</td>
                                        <td>{{ $payment->agreement->property->type->name }}</td>
                                        <td>{{ $payment->agreement->property->name }}</td>
                                        <td>{{ $payment->agreement->tent->fname.' '.$payment->agreement->tent->lname}}
                                        </td>
                                        <td>{{ $payment->amount }}</td>
                                        {{-- <td>{{ $payment->agreement->yearly_percent }}%</td> --}}
                                        <td class="text-right">
                                            {{-- <a href="{{ route('payment.edit', $payment->id)}}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a> --}}
                                            <form class="d-inline" action="{{route('payment.destroy', $payment->id)}}"
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
            </div>

            {{-- Payment --}}
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="for" value="payment">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="col-form-label">Agreement</label>
                                <select class="form-control" name="agreement_id" id="agreements" required>
                                    <option value="">Select</option>
                                    @foreach ($agreements as $agreement)
                                    <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="col-form-label">Pay for</label>
                                <select class="form-control" name="type" required>
                                    <option value="">Select</option>
                                    <option value="rent">Rent</option>
                                    <option value="modify">Modification or damage or paint</option>
                                    <option value="bill">Utility Bills</option>
                                    <option value="security">Security Deposit</option>
                                </select>
                            </div>

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
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Payment Method</label>
                                <select class="form-control" name="method" id="method" required>
                                    <option value="">Select Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="col-form-label">Amount</label>
                                <input name="amount" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-md-2 my-auto">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="gstbox" checked class="custom-control-input"><span
                                        class="custom-control-label">Allow GST</span>
                                </label>
                            </div>
                            <div class="form-group col-md-2" id="gst">
                                <label class="col-form-label">GST(%)</label>
                                <input name="gst" type="text" class="form-control">
                            </div>


                        </div>
                        <div class="row" id="bank-row">
                            <div class="form-group col-3">
                                <label class="col-form-label">Bank Name</label>
                                <input name="bank" type="text" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Bank A/C</label>
                                <input name="account" type="text" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Branch</label>
                                <input name="branch" type="text" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Cheque No</label>
                                <input name="cheque" type="text" class="form-control">
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Cheque scan copy</label>
                                <input name="attachment" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- // Refund --}}
            <div class="tab-pane fade" id="profile-simple2" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="for" value="refund">
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Agreement</label>
                                <select class="form-control agreements" name="agreement_id" required>
                                    <option value="">Select</option>
                                    @foreach ($agreements as $agreement)
                                    <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Refund for</label>
                                <select class="form-control" name="type" required>
                                    <option value="">Select</option>
                                    <option value="rent">Rent</option>
                                    <option value="modify">Modification or damage or paint</option>
                                    <option value="bill">Utility Bills</option>
                                    <option value="security">Security Deposit</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label class="col-form-label">Pay Amount</label>
                                <input name="amount" type="number" class="form-control">
                            </div>
                        </div>

                        <div class="row">


                            <div class="form-group col-3">
                                <label class="col-form-label">Type</label>
                                <input type="text" class="form-control type" disabled>
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Property</label>
                                <input type="text" class="form-control property" disabled>
                            </div>

                            <div class="form-group col-3">
                                <label class="col-form-label">Tent</label>
                                <input type="text" class="form-control tent" disabled>
                            </div>
                            <div class="form-group col-3">
                                <label class="col-form-label">Current Rent</label>
                                <input type="text" class="form-control rent" disabled>
                            </div>
                        </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary rounded">Refund</button>
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
    // For pay api
    $('.agreements').on('change', function() {
        var agreement = $(this).val();
        var url = '{{ url('admin/get-agreement') }}?id=' + agreement;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {

                $('.type').val(data.type);
                $('.property').val(data.property);
                $('.tent').val(data.tent);
                $('.rent').val(data.rent);
            }
        });
    });

    // Refund api
    $('#agreements').on('change', function() {
        var agreement = $(this).val();
        var url = '{{ url('admin/get-agreement') }}?id=' + agreement;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {

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
            $('#bank-row').slideDown();
        }else{
            $('#bank-row').slideUp();
        }
    });

    $('#gstbox').click(function() {
        $("#gst").toggle(this.checked);
    });


    
</script>
@endsection