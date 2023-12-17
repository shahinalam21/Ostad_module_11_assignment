@extends('admin.admin_master_layout')

@section('admin_content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Today's Sales</h5>
                    <p class="card-text">${{ number_format($todaySales, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Yesterday's Sales</h5>
                    <p class="card-text">${{ number_format($yesterdaySales, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">This Month's Sales</h5>
                    <p class="card-text">${{ number_format($thisMonthSales, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Last Month's Sales</h5>
                    <p class="card-text">${{ number_format($lastMonthSales, 2) }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection