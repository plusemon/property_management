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
                                        <th scope="col">Pay (m)</th>
                                        <th scope="col">Transaction id</th>
                                        <th scope="col">Agreement</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Property</th>
                                        <th scope="col">Tent</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->created_at->format('d-m-y') }}</td>
                                        <td>{{ $payment->type }} - {{ $payment->month ?? '' }}</td>
                                        <td>{{ $payment->tnxid }}</td>
                                        <td>{{ $payment->agreement->name }}</td>
                                        <td>{{ $payment->agreement->property->type->name ?? 'Deleted' }}</td>
                                        <td>{{ $payment->agreement->property->name }}</td>
                                        <td>{{ $payment->agreement->tent->fname ?? 'deleted' }} {{ $payment->agreement->tent->lname ?? ''}}
                                        </td>
                                        <td>{{ $payment->amount }}</td>
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

                        {{-- Agreement --}}
                        <div class="row">
                            {{-- agreement --}}
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Agreement</label>
                                <select class="form-control" name="agreement_id" id="agreements" required>
                                    <option value="">Select</option>
                                    @foreach ($agreements as $agreement)
                                    <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- Pay for --}}
                            <div class="col-md-4 form-group" id="pay-for">
                                <label class="col-form-label">Pay for</label>
                                <select class="form-control" name="type" id="pay-type" required>
                                    <option value="">Select</option>
                                    <option value="rent">Rent</option>
                                    <option value="modify">Modification or damage or paint</option>
                                    <option value="bill">Utility Bills</option>
                                    <option value="security">Security Deposit</option>
                                </select>
                            </div>
                            {{-- month list  --}}
                            <div class="col-md-2 form-group" id="month-row">
                                <label class="col-form-label">Select month</label>
                                <select class="form-control" name="month" id="month">
                                    <option value="jan" {{ date('m') == 1 ? 'selected':'' }}>January</option>
                                    <option value="feb" {{ date('m') == 2 ? 'selected':'' }}>February</option>
                                    <option value="mar" {{ date('m') == 3 ? 'selected':'' }}>March</option>
                                    <option value="apr" {{ date('m') == 4 ? 'selected':'' }}>April</option>
                                    <option value="may" {{ date('m') == 5 ? 'selected':'' }}>May</option>
                                    <option value="jun" {{ date('m') == 6 ? 'selected':'' }}>June</option>
                                    <option value="jul" {{ date('m') == 7 ? 'selected':'' }}>July</option>
                                    <option value="aug" {{ date('m') == 8 ? 'selected':'' }}>August</option>
                                    <option value="sep" {{ date('m') == 9 ? 'selected':'' }}>September</option>
                                    <option value="oct" {{ date('m') == 10 ? 'selected':'' }}>October</option>
                                    <option value="nov" {{ date('m') == 11 ? 'selected':'' }}>November</option>
                                    <option value="dec" {{ date('m') == 12 ? 'selected':'' }}>December</option>
                                </select>
                            </div>
                            {{-- status --}}
                            <div class="form-group col-md-2" id="status-row">
                                <label class="col-form-label">Status</label>
                                <input id="status" type="text" class="form-control" disabled>
                            </div>

                        </div>

                        {{-- Agreement Details --}}
                        <div class="row" id="agreement-info">
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
                                <label class="col-form-label">Rent(Montly)</label>
                                <input id="rent" type="text" class="form-control" disabled>
                            </div>
                        </div>

                        {{-- Payment Method  --}}
                        <div class="row" id="payment-info">
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Payment Method</label>
                                <select class="form-control" name="method" id="method" required>
                                    <option value="">Select</option>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                    <option value="wallet">Wallet</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2" id="wallet">
                                <label class="col-form-label">Balance</label>
                                <input id="balance" type="text" class="form-control" disabled>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="col-form-label">Amount</label>
                                <input name="amount" id="amount" type="text" class="form-control" required>
                            </div>

                            <div class="form-group col-md-2 my-auto" id="gst-row">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" id="gstbox" class="custom-control-input"><span
                                        class="custom-control-label">Allow GST</span>
                                </label>
                            </div>
                            <div class="form-group col-md-2" id="gst">
                                <label class="col-form-label">GST(%)</label>
                                <input name="gst" type="text" class="form-control">
                            </div>
                        </div>
                        {{-- Bank Options --}}
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
                        {{-- Submit --}}
                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Pay Now</button>
                        </div>

                    </form>
                </div>
            </div>

            {{-- Refund --}}
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

$(document).ready(function() {
    $('#agreement-info').slideUp();
    $('#pay-for').slideUp();
    $('#month-row').slideUp();
    $('#status-row').slideUp();
    // $('#payment-info').slideUp();
    $('#gst').slideUp();
    $('#bank-row').fadeOut();
    $('#wallet').fadeOut();
})
    // Get and show agreement information - payment
    $('#agreements').on('change', function() {
        var id = $(this).val();
        var url = '{{ url('/ajax/agreement-info') }}?agreement=' + id;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                $('#pay-for').slideDown();
                $('#agreement-info').slideDown();
                $('#type').val(data.type);
                $('#property').val(data.property);
                $('#tent').val(data.tent);
                $('#rent').val(data.rent);
                $('#amount').val(data.rent);
            }
        });
    });
    // type for rent show month list
    $('#pay-type').on('change', function() {
        // $('#payment-info').slideDown();
        var type = $(this).val();
        if (type == 'rent') {
            $('#month-row').show();
        }else{
            $('#month-row').hide();
        }
    });
    // Get selected month status
    $('#month').on('change', function() {
        $('#status-row').slideDown();
        var agreement = $('#agreements').val();
        var month = $(this).val();
        var url = '{{ url('/ajax/payment-status') }}?agreement=' + agreement + '&month='+ month;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                $('#status').val(data);
            }
        });
    });

    // show related field by method
    $('#method').on('change', function() {
        var method = $(this).val();

        if (method == 'bank') {
            $('#bank-row').fadeIn();
        }else{
            $('#bank-row').fadeOut();
        }

        if (method == 'wallet') {
            $('#wallet').fadeIn();
            var url = '{{ url('/ajax/wallet-balance') }}';
            $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                $('#balance').val(data);
            }
        });
        }else{
            $('#wallet').fadeOut();
        }

    });


    // gst field show
    $('#gstbox').on('change',function() {
        $("#gst").toggle();
    });




    // Get and show agreement information - Refund
    $('.agreements').on('change', function() {
        var id = $(this).val();
        var url = '{{ url('/ajax/agreement-info') }}?agreement=' + id;
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

</script>
@endsection
