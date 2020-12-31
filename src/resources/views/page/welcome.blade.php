@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <strong>Don't worry</strong>. Logging in with your Github account does not allow you to star other packages.
                <br><i>It's a simple measure to for star your own libraries.</i>
            </div>
        </div>
    </div>
    <!-- Earnings -->
    <div class="d-flex justify-content-between align-items-center pt-5 pb-4">
        <h2 class="h4 font-weight-normal mb-0">Statics</h2>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <a class="block text-center" href="javascript:void(0)">
                <div class="block-content">
                    <div class="icon-circle mx-auto my-3">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    <div class="text-muted mb-1">Today</div>
                    <div class="text-black h1 font-weight-bold">$26.3k</div>
                    <div class="mb-3 font-weight-bold text-success font-size-sm">
                        <i class="fa fa-caret-up mr-1"></i>
                        1.4%
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="block text-center" href="javascript:void(0)">
                <div class="block-content">
                    <div class="icon-circle mx-auto my-3">
                        <i class="fa fa-money-bill-wave"></i>
                    </div>
                    <div class="text-muted mb-1">Last Week</div>
                    <div class="text-black h1 font-weight-bold">$150k</div>
                    <div class="mb-3 font-weight-bold text-success font-size-sm">
                        <i class="fa fa-caret-up mr-1"></i>
                        3.2%
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
            <a class="block text-center" href="javascript:void(0)">
                <div class="block-content">
                    <div class="icon-circle mx-auto my-3">
                        <i class="fa fa-wallet"></i>
                    </div>
                    <div class="text-muted mb-1">Last Month</div>
                    <div class="text-black h1 font-weight-bold">$0.75m</div>
                    <div class="mb-3 font-weight-bold text-success font-size-sm">
                        <i class="fa fa-caret-up mr-1"></i>
                        2.7%
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Earnings -->
@endsection
