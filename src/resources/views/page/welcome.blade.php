@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger">
                <strong>Don't worry</strong>. Logging in with your Github account does not allow you to star other packages.
                <br><i>It's a simple measure to for star your own libraries.</i>
            </div>
        </div>

        <div class="col-lg-12">
            <img src="{{asset('blurcontent.png')}}" width="100%" height="100%" alt="">
        </div>
    </div>
@endsection

@section('js')

@endsection
