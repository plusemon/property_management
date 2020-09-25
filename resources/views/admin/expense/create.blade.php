@extends('layouts.dashboard')

@section('content')
    

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Add Expense</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label class="col-form-label">Expense Type</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="textarea">Description</label>
                    <textarea class="form-control" id="textarea" rows="3"></textarea>
                </div>

                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>

            </form>
        </div>
    </div>
</div>



@endsection