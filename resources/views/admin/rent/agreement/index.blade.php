@extends('layouts.dashboard')

@section('content')

{{-- <div class="col-12 text-right">
    <a href="{{ url('admin/agreement/type') }}" class="btn btn-primary">Add New Type</a>
</div> --}}

<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Agreement</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Entry</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    {{-- <h5 class="card-header">Properties</h5> --}}
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">District</th>
                                        <th scope="col">Street</th>
                                        <th scope="col">City</th>
                                        <th scope="col">Country</th>
                                        {{-- <th scope="col">Entry Date</th> --}}
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agreements as $agreement)
                                    <tr>
                                        <td>{{ $agreement->id }}</td>
                                        <td>{{ $agreement->name }}</td>
                                        <td>{{ $agreement->type->name ?? 'Deleted' }}</td>
                                        <td>{{ $agreement->district }}</td>
                                        <td>{{ $agreement->street }}</td>
                                        <td>{{ $agreement->city }}</td>
                                        <td>{{ $agreement->country }}</td>
                                        {{-- <td>{{ $agreement->created_at->format('d/m/Y') }}</td> --}}
                                        <td class="text-right">
                                            <a href="{{ route('agreement.edit', $agreement->id)}}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline"
                                                action="{{route('agreement.destroy', $agreement->id)}}" method="POST">
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




            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card-body">
                    <form action="{{ route('agreement.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- <h4>Agreement Details</h4> --}}
                        <div class="row">
                            <div class="form-group col-4">
                                <label class="col-form-label">Agreement Name</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label">Property Type</label>
                                <select id="types" class="form-control">
                                    <option>Select type</option>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 form-group">
                                <label class="col-form-label">Property Name</label>
                                <select id="properties" class="form-control" name="property_id" required>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="col-form-label">Tent</label>
                                <select class="form-control" name="tent_id" required>
                                    <option value="">Select Tent</option>
                                    @foreach ($tents as $tent)
                                    <option value="{{ $tent->id }}">{{ $tent->fname.' '.$tent->lname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label">Security Money</label>
                                <input name="advance" type="number" class="form-control" required>
                            </div>
                            <div class="col-4 form-group">
                                <label class="col-form-label">Yearly Increment (%)</label>
                                <input name="yearly_percent" type="number" class="form-control" required>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-4 form-group">
                                <label class="col-form-label">Attachment</label>
                                <input name="attachment" type="file" class="form-control">
                            </div>


                            <div class="col-4 form-group">
                                <label class="col-form-label">Entry Date</label>
                                <input id="created_at" name="created_at" type="date"
                                    value="<?php echo date('Y-m-d'); ?>" class="form-control">
                            </div>

                            <div class="col-4 form-group">
                                <label class="col-form-label">Entry by</label>
                                <input value="Admin" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="form-group text-right mt-4">
                            <button type="submit" class="btn btn-primary">Save Agreement</button>
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

    $('#types').on('change', function() {
        var type = $('#types').val();
        var url = '{{ url('admin/get-properties') }}?type=' + type;
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data,status) {
                if (!data.length) {
                    toastr.info('No property found');
                }

                $('#properties').html('');

                data.forEach(element => {
                        $('#properties').append('<option value="'+element.id+'">'+element.name+'</option>')
                });   
            }
        });
    });


    
</script>
@endsection