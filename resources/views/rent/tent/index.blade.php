@extends('layouts.dashboard')

@section('content')

<div class="col-12">
    <div class="section-block">
        <h3 class="section-title">Tents</h3>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="" data-toggle="tab" href="#list" role="tab"
                    aria-controls="list" aria-selected="true">List</a>
            </li>
            @can('tent manage')
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#add" role="tab"
                    aria-controls="profile" aria-selected="false">Add</a>
            </li>
            @endcan
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="list" role="tabpanel" aria-labelledby="add">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered second">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">T-Full Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Courtry</th>
                                <th scope="col">T-Attachment</th>
                                <th scope="col">Granter</th>
                                {{-- @can('tent manage')
                                <th scope="col">Action</th>
                                @endcan --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tents as $tent)
                            <tr>
                                <th scope="row">{{ $tent->id }}</th>
                                <td>{{ $tent->fname.' '.$tent->lname }}</td>
                                <td>
                                    {{ $tent->contact1 }}<br>
                                    {{ $tent->contact2 }}<br>
                                    {{ $tent->contact3 }}<br>
                                </td>
                                <td>{{ $tent->address}}</td>
                                <td>{{ $tent->city }}</td>
                                <td>{{ $tent->country }}</td>
                                <td class="text-center">
                                    @if ($tent->cnica)
                                    <a href="{{ url('public/storage/'.$tent->cnica) }}"
                                        class="badge badge-secondary mb-1"><i class="fas fa-eye"></i> View</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#details"
                                    class="badge badge-secondary mb-1"><i class="fas fa-eye"></i> Details</a>
                                </td>

                                {{-- @can('tent manage')
                                <td class="text-right">
                                    <form class="d-inline" action="{{route('tent.destroy', $tent->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                @endcan --}}
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="add" role="tabpanel" aria-labelledby="add">
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
                                        <label class="col-form-label">CNIC</label>
                                        <input name="tent[cnic]" type="number" class="form-control" maxlength="15"
                                            required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CNIC Attachment</label>
                                        <input name="tent[cnica]" type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Address</label>
                                        <input name="tent[address]" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group col-3">
                                        <label class="col-form-label">City</label>
                                        <input name="tent[city]" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="col-form-label">Country</label>
                                        <input name="tent[country]" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="form-group col-10">
                                            <label class="col-form-label">Contact</label>
                                            <input name="tent[contact][]" type="number" class="form-control" required>
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
                                        <label class="col-form-label">CNIC</label>
                                        <input name="g1[cnic]" type="number" class="form-control" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="col-form-label">CNIC Attachment</label>
                                        <input name="g1[cnica]" type="file" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="col-form-label">Address</label>
                                        <input name="g1[address]" type="text" class="form-control" required>
                                    </div>

                                    <div class="form-group col-3">
                                        <label class="col-form-label">City</label>
                                        <input name="g1[city]" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="col-form-label">Country</label>
                                        <input name="g1[country]" type="text" class="form-control" required>
                                    </div>
                                </div>

                                <div class="field_wrapper">
                                    <div class="row">
                                        <div class="form-group col-10">
                                            <label class="col-form-label">Contact</label>
                                            <input name="g1[contact][]" type="number" class="form-control" required>
                                        </div>
                                        <div class="form-group col-1" style="margin: 37px auto auto;">
                                            <i type="button"
                                                class="btn btn-sm btn-success add_buttong1 fas fa-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h4 class="mb-0">Add Another Granter</h4>

                            <div class="switch-button">
                                <input type="checkbox" id="addg2"><span>
                                    <label for="addg2"></label></span>
                            </div>

                            <div id="g2">

                            </div>
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Save Tent</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsLabel">Granter Information</h5>
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <div class="modal-body">
                Another information will show here
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-secondary" data-dismiss="modal">Close</a>
                {{-- <a href="#" class="btn btn-primary">Save changes</a> --}}
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')
<script>
    var fieldHTML = '<div class="row"><div class="form-group col-10"><input name="tent[contact][]" type="number" class="form-control" required></div><div class="form-group col-1" style="margin:auto;"><input type="button" class="btn btn-sm btn-danger remove_button" value="-"></div></div>'; //New input field html
    var g1 = '<div class="row"><div class="form-group col-10"><input name="g1[contact][]" type="number" class="form-control" required></div><div class="form-group col-1" style="margin:auto;"><input type="button" class="btn btn-sm btn-danger remove_buttong1" value="-"></div></div>'; //New input field html
    var g2 = '<div class="row"><div class="form-group col-10"><input name="g2[contact][]" type="number" class="form-control"></div><div class="form-group col-1" style="margin:auto;"><input type="button" onclick="rmvg2c(this)" class="btn btn-sm btn-danger remove_buttong2" value="-"></div></div>'; //New input field html
    var x = 1;
    var xg1 = 1;
    var xg2 = 1;



    function addg2c(){
            // alert('abc');
            if(xg2 < 3){
                xg2++;
                $('.add_buttong2').parent('div').parent('div').parent('div').append(g2);
            }
    }

    function rmvg2c(a){
        $(a).parent('div').parent('div').remove();
        xg2--;
    }


    $(document).ready(function(){



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

    $('.field_wrapper').on('click', '.remove_button', function(){
        $(this).parent('div').parent('div').remove();
        x--;
    });

    $('.field_wrapper').on('click', '.remove_buttong1', function(){
        $(this).parent('div').parent('div').remove();
        xg1--;
    });




    $('#addg2').on('click', function(){
        if (this.checked) {
            $('#g2').html('<div class="row"><div class="form-group col-6"><label class="col-form-label">Fist Name</label><input name="g2[fname]" type="text" class="form-control"></div><div class="form-group col-6"><label class="col-form-label">Last Name</label><input name="g2[lname]" type="text" class="form-control"></div></div><div class="row"><div class="form-group col-6"><label class="col-form-label">CNIC</label><input name="g2[cnic]" type="number" class="form-control"></div><div class="form-group col-6"><label class="col-form-label">CNIC Attachment</label><input name="g2[cnica]" type="file" class="form-control"></div></div><div class="row"><div class="form-group col-6"><label class="col-form-label">Address</label><input name="g2[address]" type="text" class="form-control"></div><div class="form-group col-3"><label class="col-form-label">City</label><input name="g2[city]" type="text" class="form-control"></div><div class="form-group col-3"><label class="col-form-label">Country</label><input name="g2[country]" type="text" class="form-control"></div></div><div class="field_wrapper"><div class="row"><div class="form-group col-10"><label class="col-form-label">Contact</label><input name="g2[contact][]" type="number" class="form-control"></div><div class="form-group col-1" style="margin: 37px auto auto;"><i type="button" onclick="addg2c()" class="btn btn-sm btn-success add_buttong2 fas fa-plus"></i></div></div></div>');
        }else{
            $('#g2').html('');
        }


    });








});
</script>
@endsection
