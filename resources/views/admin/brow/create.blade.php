@extends('layouts.dashboard')

@section('content')
    

<div class="col-12">
    <div class="card">
        <h5 class="card-header">Add New Brow</h5>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label class="col-form-label">Brower</label>
                    <select class="form-control">
                        <option value="">Select Brower</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="textarea">Description</label>
                    <textarea class="form-control" id="textarea" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label class="col-form-label">Amount</label>
                    <input type="number" class="form-control">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Entry Date</label>
                    <input type="date" class="form-control">
                </div>


                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Add New</button>
                </div>

                

            </form>
        </div>
    </div>
</div>



@endsection