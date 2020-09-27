@extends('layouts.dashboard')

@section('content')

{{-- <div class="col-12 text-right">
    <a href="{{ route('tent.index') }}" class="btn btn-primary">Back to Tent</a>
</div> --}}

<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Add New Tent</h2>
    </div>
    <div class="simple-card">
        <div class="tab-content" id="myTabContent5">
            <form action="{{ route('tent.store') }}" method="POST" enctype="multipart/form-data">
                <div class="tab-pane fade active show" id="home-simple" role="tabpanel"
                    aria-labelledby="home-tab-simple">
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
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">CINC</label>
                            <input name="tent[cnic]" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">CINC Attachment</label>
                            <input name="tent[cnica]" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-">
                        <label class="col-form-label">Address</label>
                        <input name="tent[address]" type="text" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">City</label>
                            <input name="tent[city]" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Country</label>
                            <input name="tent[country]" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="form-group col-10">
                                <label class="col-form-label">Contact</label>
                                <input name="tent[contact][]" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-1" style="margin: 37px auto auto;">
                                <i type="button" class="btn btn-sm btn-success add_button fas fa-plus"></i>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-5 mb-0">Granter information</h4>
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
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">CINC</label>
                            <input name="g1[cnic]" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">CINC Attachment</label>
                            <input name="g1[cnica]" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input name="g1[address]" type="text" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">City</label>
                            <input name="g1[city]" type="text" class="form-control" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Country</label>
                            <input name="g1[country]" type="text" class="form-control" required>
                        </div>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="form-group col-10">
                                <label class="col-form-label">Contact</label>
                                <input name="g1[contact][]" type="text" class="form-control" required>
                            </div>
                            <div class="form-group col-1" style="margin: 37px auto auto;">
                                <i type="button" class="btn btn-sm btn-success add_buttong1 fas fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-0">Add Another Granter</h4>

                <div class="switch-button">
                    <input type="checkbox" id="addg2"><span>
                <label for="addg2"></label></span> 
                </div>

                <div style="display:none" id="g2">
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
                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">CINC</label>
                            <input name="g2[cnic]" type="text" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">CINC Attachment</label>
                            <input name="g2[cnica]" type="file" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Address</label>
                        <input name="g2[address]" type="text" class="form-control">
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label class="col-form-label">City</label>
                            <input name="g2[city]" type="text" class="form-control">
                        </div>
                        <div class="form-group col-6">
                            <label class="col-form-label">Country</label>
                            <input name="g2[country]" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="field_wrapper">
                        <div class="row">
                            <div class="form-group col-10">
                                <label class="col-form-label">Contact</label>
                                <input name="g2[contact][]" type="text" class="form-control">
                            </div>
                            <div class="form-group col-1" style="margin: 37px auto auto;">
                                <i type="button" class="btn btn-sm btn-success add_buttong2 fas fa-plus"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right mt-4">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
    
    var fieldHTML = '<div class="row"><div class="form-group col-10"><input name="tent[contact][]" type="text" class="form-control" required></div><div class="form-group col-1" style="margin:auto;"><input type="button" class="btn btn-sm btn-danger remove_button" value="-"></div></div>'; //New input field html 
    var g1 = '<div class="row"><div class="form-group col-10"><input name="g1[contact][]" type="text" class="form-control" required></div><div class="form-group col-1" style="margin:auto;"><input type="button" class="btn btn-sm btn-danger remove_buttong1" value="-"></div></div>'; //New input field html 
    var g2 = '<div class="row"><div class="form-group col-10"><input name="g2[contact][]" type="text" class="form-control"></div><div class="form-group col-1" style="margin:auto;"><input type="button" class="btn btn-sm btn-danger remove_buttong2" value="-"></div></div>'; //New input field html 
    var x = 1;
    var xg1 = 1;
    var xg2 = 1;

    $('.add_button').click(function(){
        if(x < 3){ 
            x++;
            $(this).parent('div').parent('div').parent('div').append(fieldHTML);
        }
    });

    $('.add_buttong1').click(function(){
        if(xg1 < 3){ 
            xg1++;
            $(this).parent('div').parent('div').parent('div').append(g1);
        }
    });

    $('.add_buttong2').click(function(){
        if(xg2 < 3){ 
            xg2++;
            $(this).parent('div').parent('div').parent('div').append(g2);
        }
    });
    
    $('.field_wrapper').on('click', '.remove_button', function(){
        $(this).parent('div').parent('div').remove();
        x--;
    });

    $('.field_wrapper').on('click', '.remove_buttong1', function(){
        $(this).parent('div').parent('div').remove();
        xg1--;
    });

    $('.field_wrapper').on('click', '.remove_buttong2', function(){
        $(this).parent('div').parent('div').remove();
        xg2--;
    });


    $('#addg2').on('click', function(){
        $('#g2').fadeToggle();
    });
    






    
});
</script>
@endsection