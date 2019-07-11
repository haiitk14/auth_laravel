@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    @include('admin.partials.breadcrumb')
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-default">
                <i class="fa fa-file-text-o float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Products</h6>
                <h1 class="m-b-20 text-white counter">1,587</h1>
                <span class="text-white">15 New Product</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fa fa-bar-chart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Manufature</h6>
                <h1 class="m-b-20 text-white counter">250</h1>
                <span class="text-white">3 New Manufature</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="fa fa-user-o float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Customers</h6>
                <h1 class="m-b-20 text-white counter">120</h1>
                <span class="text-white">25 New Customers</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-danger">
                <i class="fa fa-bell-o float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-20">Comments</h6>
                <h1 class="m-b-20 text-white counter">58</h1>
                <span class="text-white">5 New Comments</span>
            </div>
        </div>
    </div>
    
</div>
@endsection