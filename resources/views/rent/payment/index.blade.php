@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Payments</h3>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                    aria-controls="list" aria-selected="true">Payment List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#refund_list" role="tab" aria-controls="pay"
                    aria-selected="false">Refund List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#pay" role="tab" aria-controls="pay"
                    aria-selected="false">Payment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="" data-toggle="tab" href="#refund" role="tab" aria-controls="refund"
                    aria-selected="false">Refund</a>
            </li>
        </ul>
        <div class="tab-content">
            {{-- List of payments  --}}
            <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Tent</th>
                                        <th scope="col">Property</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Tnx No</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->id }}</td>
                                        <td>{{ $payment->created_at->format('d-m-y') }}</td>
                                        <td>
                                        <a class="badge badge-light" href="{{ route('tent.show', $payment->agreement->tent->id ) }}" target="_blank">{{ $payment->agreement->tent->fname." ".$payment->agreement->tent->lname }}</a>
                                        </td>
                                        <td>{{ $payment->agreement->property->name }}</td>
                                        <td>{{ $payment->type }}</td>
                                        <td class="text-success">{{ $payment->amount }}</td>
                                        <td>{{ $payment->method }}</td>
                                        <td>{{ $payment->tnxid }}</td>

                                        <td class="text-right">
                                            <button class="btn badge badge-secondary" onclick="window.open('{{ route('payment.show',$payment->id)}}', '_blank')"><i class="fas fa-eye"></i> View</button>

                                            {{-- <a href="{{ route('payment.edit', $payment->id)}}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a> --}}

                                            {{-- <a href="#" data-toggle="modal" data-target="#details"
                                                class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a> --}}

                                            {{-- <form class="d-inline" action="{{route('payment.destroy', $payment->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- List of Refunds  --}}
            <div class="tab-pane fade" id="refund_list" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Payment #</th>
                                        <th scope="col">Tent</th>
                                        <th scope="col">Payment for</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Description</th>
                                        {{-- <th scope="col">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($refunds as $refund)
                                    <tr>
                                        <td>{{ $refund->created_at->format('d-m-y') }}</td>
                                        <td>{{ $refund->payment_id }}</td>
                                        <td>{{ $refund->payment->agreement->tent->fname ?? 'deleted' }}
                                            {{ $refund->payment->agreement->tent->lname ?? ''}}
                                        </td>
                                        <td>{{ $refund->payment->type }}</td>
                                        <td class="text-danger">{{ $refund->amount }}</td>
                                        <td>{{ $refund->description }}</td>
                                        {{-- <td class="text-right"> --}}
                                            {{-- <a href="{{ route('refund.edit', $refund->id)}}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a> --}}

                                            {{-- <a href="#" data-toggle="modal" data-target="#details"
                                                class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>

                                            <form class="d-inline" action="{{route('payment.destroy', $payment->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Payment --}}
            <div class="tab-pane fade" id="pay" role="tabpanel" aria-labelledby="pay">
                <div class="card-body">
                    <form action="{{ route('payment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            {{-- serial no  --}}
                            <div class="form-group col-md">
                                <label class="col-form-label">Serial No. </label>
                                <input type="number" name="serial" value="{{ $id = App\Payment::nextId() }}"
                                    class="form-control" {{ $id ? 'disabled':'' }}>
                            </div>
                            {{-- Agreement --}}
                            <div class="col-md form-group">
                                <label class="col-form-label">Agreement</label>
                                <select class="form-control" name="agreement_id" id="agreements" required>
                                    <option value="">Select</option>
                                    @foreach ($agreements as $agreement)
                                    <option value="{{ $agreement->id }}">{{ $agreement->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        {{-- Agreement information --}}
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

                        <div class="row">
                            {{-- Pay for --}}
                            <div class="col-md form-group" id="pay-for">
                                <label class="col-form-label">Pay for</label>
                                <select class="form-control" name="type" id="pay-type" required>
                                    <option value="">Select</option>
                                    <option value="rent">Rent</option>
                                    <option value="bill">Utility Bills</option>
                                    <option value="modification">Modification or damage or paint</option>
                                    <option value="advance">Advance</option>
                                    <option value="security">Security Deposit</option>
                                </select>
                            </div>
                        </div>

                        {{-- montly payment  --}}
                        <div class="row" id="rent-row">
                            <div class="form-group col-md-2">
                                <label class="col-form-label">Year</label>
                                <select name="year" class="form-control">
                                    @foreach (range(2015, strftime("%Y", time())+30) as $year)
                                    <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- month list  --}}
                            <div class="form-group col-md">
                                <label class="col-form-label">Month</label>
                                <ul class="ks-cboxtags">
                                    <li><input name="month[]" type="checkbox" id="jan" value="1"><label
                                            for="jan">January</label></li>
                                    <li><input name="month[]" type="checkbox" id="feb" value="2"><label
                                            for="feb">February</label></li>
                                    <li><input name="month[]" type="checkbox" id="mar" value="3"><label
                                            for="mar">March</label></li>
                                    <li><input name="month[]" type="checkbox" id="apr" value="4"><label
                                            for="apr">April</label></li>
                                    <li><input name="month[]" type="checkbox" id="may" value="5"><label
                                            for="may">May</label></li>
                                    <li><input name="month[]" type="checkbox" id="jun" value="6"><label
                                            for="jun">June</label></li>
                                    <li><input name="month[]" type="checkbox" id="jul" value="7"><label
                                            for="jul">July</label></li>
                                    <li><input name="month[]" type="checkbox" id="aug" value="8"><label
                                            for="aug">Aug</label></li>
                                    <li><input name="month[]" type="checkbox" id="sep" value="9"><label
                                            for="sep">September</label></li>
                                    <li><input name="month[]" type="checkbox" id="oct" value="10"><label
                                            for="oct">October</label></li>
                                    <li><input name="month[]" type="checkbox" id="nov" value="11"><label
                                            for="nov">November</label></li>
                                    <li><input name="month[]" type="checkbox" id="dec" value="12"><label
                                            for="dec">December</label></li>
                                </ul>
                            </div>

                        </div>


                        {{-- Amount row --}}
                        <div class="row">
                            <div class="form-group col">
                                <label class="col-form-label">Amount</label>
                                <input name="amount" type="number" class="form-control"
                                    onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                                <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary"
                                        id="word"></span></div>
                            </div>
                        </div>

                        {{-- Payment Method  --}}
                        <div class="row" id="payment-info">
                            <div class="col-md-4 form-group">
                                <label class="col-form-label">Payment Method</label>
                                <select class="form-control" name="method" id="method" required>
                                    <option value="cash">Cash</option>
                                    <option value="bank">Bank</option>
                                    <option value="wallet">Wallet</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2" id="wallet">
                                <label class="col-form-label">Balance</label>
                                <input id="balance" type="text" class="form-control" disabled>
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
                        {{-- Bank Row --}}
                        <div id="bank-row">
                            <div class="row">
                                <div class="form-group col-md">
                                    <label class="col-form-label">Bank Name</label>
                                    <input name="bank" type="text" class="form-control">
                                </div>

                                <div class="form-group col-md">
                                    <label class="col-form-label">Bank A/C</label>
                                    <input name="account" type="number" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md">
                                    <label class="col-form-label">Branch</label>
                                    <input name="branch" type="text" class="form-control">
                                </div>

                                <div class="form-group col-md">
                                    <label class="col-form-label">Cheque No</label>
                                    <input name="cheque" type="text" class="form-control">
                                </div>

                                <div class="form-group col-md">
                                    <label class="col-form-label">Cheque scan copy</label>
                                    <input name="attachment" type="file" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md form-group">
                                <label class="col-form-label">Description</label>
                                <textarea name="remarks" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md form-group">
                                <label class="col-form-label">Payment Date</label>
                                <input id="created_at" name="created_at" type="date" value="{{ date('Y-m-d') }}"
                                    class="form-control">
                            </div>

                            <div class="col-md form-group">
                                <label class="col-form-label">Entry by</label>
                                <input value="{{ Auth::user()->name }}" class="form-control" disabled>
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
            <div class="tab-pane fade" id="refund" role="tabpanel" aria-labelledby="refund">
                <div class="card-body">
                    <form action="{{ route('refund.store') }}" method="POST">
                        @csrf
                        <div class="row">

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Payment #</label>
                            <select name="payment_id" id="payment_id" class="form-control">
                                <option value="">Select</option>
                                @foreach (App\Payment::all() as $payment)
                                <option value="{{ $payment->id }}">{{ $payment->id }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">Paid</label>
                            <input id="paid" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">For</label>
                            <input id="for" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="col-form-label">method</label>
                            <input id="by" class="form-control" disabled>
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
                            <label class="col-form-label">Date</label>
                            <input name="created_at" type="date" class="form-control" value="{{date('Y-m-d')}}"
                                required>
                        </div>
                        <div class="form-group  col-md-4">
                            <label class="col-form-label">Refund by</label>
                            <input name="entry" type="text" class="form-control" value="{{ Auth::user()->name }}"
                                disabled>
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
        $('#rent-row').slideUp();
        $('#gst').slideUp();
        $('#bank-row').fadeOut();
        $('#wallet').fadeOut();
    })
    // Get and show agreement information - payment
    $('#agreements').on('change', function() {
        var id = $(this).val();
        var url = '{{ url('api/agreement-info') }}?agreement=' + id;
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
        if ( type == 'rent' || type == 'bill' ) {
            $('#rent-row').slideDown();
        }else{
            $('#rent-row').slideUp();
        }

        if (type != 'advance') {
            $('#payment-info').fadeIn();
        }else{
            $('#payment-info').fadeOut();
        }
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
            var url = '{{ url('api/balance'.'?user='.Auth::id()) }}';
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
        $("#gst").fadeToggle();
    });

    // Get and show payment information - Refund
    $('#payment_id').on('change', function() {
        // e.preventDefault();
        var id = $('#payment_id').val();
        var url = '{{ url('api/payment-info') }}?payment=' + id;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                $('#paid').val(data.paid);
                $('#for').val(data.for);
                $('#by').val(data.method);
            },
            error: function () {
                toastr.warning('No payments found');
                $('#paid').val('');
                $('#for').val('');
                $('#by').val('');
            }
        });
    });

</script>
@endsection
