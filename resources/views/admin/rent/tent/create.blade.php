@extends('layouts.dashboard')

@section('content')

<div class="col-12 text-right">
    <a href="{{ route('tent.index') }}" class="btn btn-primary">Back to Tent</a>
</div>

<div class="col-12">
    <div class="section-block">
        <h4 class="section-title">Add New Tent</h4>
        <p>* Mendotory fields!</p>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">Tent Info *</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Granter 1 *</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab-simple" data-toggle="tab" href="#contact-simple" role="tab"
                    aria-controls="contact" aria-selected="false">Granter 2</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <form action="{{ route('tent.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Fist Name</label>
                            <input name="tent[fname]" type="text" class="form-control" required>
                        </div>

                        <div class="form-group col-6">
                            <label class="col-form-label">Last Name</label>
                            <input name="tent[lname]" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">CINC</label>
                        <input name="tent[cinc]" type="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input name="tent[address]" type="text" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Contact 1</label>
                            <input name="tent[contact][]" type="text" class="form-control" required>
                        </div>

                        <div class="form-group col-6">
                            <label class="col-form-label">Contact 2</label>
                            <input name="tent[contact][]" type="text" class="form-control" required>
                        </div>
                    </div>
                    <p>Goto Granter1 and fillup fields</p>
                </div>
                <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Fist Name</label>
                            <input name="g1[fname]" type="text" class="form-control" required>
                        </div>

                        <div class="form-group col-6">
                            <label class="col-form-label">Last Name</label>
                            <input name="g1[lname]" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">CINC</label>
                        <input name="g1[cinc]" type="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input name="g1[address]" type="text" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Contact 1</label>
                            <input name="g1[contact][]" type="text" class="form-control" required>
                        </div>

                        <div class="form-group col-6">
                            <label class="col-form-label">Contact 2</label>
                            <input name="g1[contact][]" type="text" class="form-control" required>
                        </div>
                    </div>
                    <p>Goto Granter2</p>
                </div>
                <div class="tab-pane fade" id="contact-simple" role="tabpanel" aria-labelledby="contact-tab-simple">
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Fist Name</label>
                            <input name="g2[fname]" type="text" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label class="col-form-label">Last Name</label>
                            <input name="g2[lname]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">CINC</label>
                        <input name="g2[cinc]" type="file" class="form-control">
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input name="g2[address]" type="text" class="form-control">
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">Contact 1</label>
                            <input name="g2[contact][]" type="text" class="form-control">
                        </div>

                        <div class="form-group col-6">
                            <label class="col-form-label">Contact 2</label>
                            <input name="g2[contact][]" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-right mt-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>
    @endsection