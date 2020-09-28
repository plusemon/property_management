@extends('layouts.dashboard')

@section('content')

<div class="card">
<div class="card-header">
    <h3 class="section-title">Rent / Edit Agreement</h3>
</div>
    <div class="card-body">
        <form action="{{ route('agreement.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-4">
                    <label class="col-form-label">Agreement Name</label>
                    <input name="name" type="text" class="form-control" value="{{$agreement->name}}" required>
                </div>
                <div class="col-4 form-group">
                    <label class="col-form-label">Property Type</label>
                    <select id="types" class="form-control" required>
                        <option>Select type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            {{-- {{ $type->id = $agreement->property->type->id ? 'selected':'' }} --}}
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
                    <input name="advance" type="number" class="form-control" value="{{$agreement->advance}}" required>
                </div>
                <div class="col-4 form-group">
                    <label class="col-form-label">Yearly Increment (%)</label>
                    <input name="yearly_percent" type="number" class="form-control" value="{{$agreement->yearly_percent}}" required>
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
                        value="{{$agreement->created_at->format("Y-m-d")}}" class="form-control" required>
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