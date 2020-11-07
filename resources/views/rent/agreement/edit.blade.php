@extends('layouts.dashboard')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="section-title">Edit Agreement</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('agreement.update', $agreement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-md">
                    <label class="col-form-label">Agreement Name</label>
                    <input name="name" type="text" class="form-control" value="{{$agreement->name}}" required>
                </div>
                <div class="col-md form-group">
                    <label class="col-form-label">Property Type</label>
                    <select id="types" class="form-control" required>
                        <option>Select type</option>
                        @foreach (App\Type::getProperties() as $type)
                        <option value="{{ $type->id }}" {{ $agreement->type_id = $type->id ? 'selected':'' }}>
                            {{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md form-group">
                    <label class="col-form-label">Property Name</label>
                    <select id="properties" class="form-control" name="property_id" required>

                    </select>
                </div>
                <div class="col-md form-group">
                    <label class="col-form-label">Tent</label>
                    <select class="form-control" name="tent_id" required>
                        <option value="">Select Tent</option>
                        @foreach ($tents as $tent)
                        <option value="{{ $tent->id }}" {{ $tent->id == $agreement->tent->id ? 'selected':'' }}>
                            {{ $tent->fname.' '.$tent->lname }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label class="col-form-label">Rent</label>
                    <input name="rent" type="number" value="{{ $agreement->rent }}" class="form-control"
                        onkeyup="word.innerHTML=toWord(this.value)" autocomplete required>
                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary" id="word"></span>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="col-form-label">Security</label>
                    <input name="security" type="number" value="{{ $agreement->security }}" class="form-control"
                        onkeyup="word2.innerHTML=toWord(this.value)" autocomplete required>
                    <div class="border-bottom bg-light p-2">In Word: <span class="text-secondary" id="word2"></span>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md form-group">
                    <label class="col-form-label">Period</label>
                    <select name="period" id="" class="form-control">
                        <option value="6">6 Months</option>
                        <option value="12">1 Year</option>
                        <option value="24">2 Years</option>
                        <option value="36">3 Years</option>
                        <option value="48">4 Years</option>
                        <option value="60">5 Years</option>

                    </select>
                </div>
                <div class="col-md form-group">
                    <label class="col-form-label">Increment (%)</label>
                    <input name="incr" type="number" class="form-control" value="{{$agreement->incr}}" required>
                </div>
                <div class="col-md form-group">
                    <label class="col-form-label">Attachment</label>
                    <input name="attachment" type="file" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-md form-group">
                    <label class="col-form-label">Start Date</label>
                    <input id="created_at" name="created_at" type="date"
                        value="{{ $agreement->created_at->format("Y-m-d") }}" class="form-control" required>
                </div>

                <div class="col-md form-group">
                    <label class="col-form-label">Entry by</label>
                    <input value="{{ Auth::user()->name }}" class="form-control" disabled>
                </div>
            </div>

            <div class="form-group text-right mt-4">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>

</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
    getProperties();
});
    $('#types').on('change', getProperties);

    function getProperties() {
        var type = $('#types').val();
        var url = '{{ url('api/properties') }}?type=' + type;
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
    }

</script>
@endsection
