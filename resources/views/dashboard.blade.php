@extends('layouts.dashboard')

@section('content')

<div class="row">
    <!-- ============================================================== -->
    <!-- sales  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Properties</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $counter['properties'] }}</h1>
                </div>
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end sales  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- new customer  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Tent</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $counter['tents'] }}</h1>
                </div>
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end new customer  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- visitor  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Agreements</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $counter['agreements'] }}</h1>
                </div>
                
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end visitor  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- total orders  -->
    <!-- ============================================================== -->
    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
        <div class="card border-3 border-top border-top-primary">
            <div class="card-body">
                <h5 class="text-muted">Payments</h5>
                <div class="metric-value d-inline-block">
                    <h1 class="mb-1">{{ $counter['payments'] }}</h1>
                </div>
               
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end total orders  -->
    <!-- ============================================================== -->
</div>


@endsection