@extends('layouts.master')


@section('content')

    <!-- Quick Statistics -->
    <div class="d-flex justify-content-between align-items-center pt-5 pb-4">
        <h2 class="h4 font-weight-normal mb-0">Quick Statistics</h2>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <a class="block" href="javascript:void(0)">
                <div class="block-content">
                    <div class="text-muted mb-2 text-uppercase">{{__('Followers')}}</div>
                    <div class="text-black font-size-lg font-weight-bold">{{auth()->user()->user_profile->followers}}</div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a class="block" href="javascript:void(0)">
                <div class="block-content">
                    <div class="text-muted mb-2 text-uppercase">{{__('Following')}}</div>
                    <div class="text-black font-size-lg font-weight-bold">{{auth()->user()->user_profile->following}}</div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a class="block" href="javascript:void(0)">
                <div class="block-content">
                    <div class="text-muted mb-2 text-uppercase">{{__('Repositories')}}</div>
                    <div class="text-black font-size-lg font-weight-bold">{{auth()->user()->user_profile->public_repos}}</div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-xl-3">
            <a class="block" href="javascript:void(0)">
                <div class="block-content">
                    <div class="text-muted mb-2 text-uppercase">{{__('Gists')}}</div>
                    <div class="text-black font-size-lg font-weight-bold">{{auth()->user()->user_profile->public_gists}}</div>
                </div>
            </a>
        </div>
    </div>
    <!-- END Quick Statistics -->

    <!-- Customer Growth -->
    <div class="d-flex justify-content-between align-items-center pt-5 pb-4">
        <h2 class="h4 font-weight-normal mb-0">{{__('Give a Star!')}}</h2>
        <div class="dropdown">

            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-coins mr-1"></i>
                <span class="d-none d-sm-inline-block">{{__('Buy a Credit!')}}</span>
            </button>

            <a href="{{route('user.sync-repository')}}" class="btn btn-sm btn-dark">
                <i class="fa fa-sync mr-1"></i>
                <span class="d-none d-sm-inline-block">{{__('Sync My Repositories')}}</span>
            </a>

        </div>
    </div>
    <div class="block">
        <div class="block-content">
            <div class="row">
                <div class="col-md-5 col-lg-4 d-md-flex align-items-md-center">
                    <div class="p-md-1 p-lg-3 text-center">
                        <div class="text-left">{{__('up to')}}</div>
                        <div class="display-2">
                            <i class="fa fa-star text-warning"></i>
                            <strong>{{10}}</strong>
                        </div>
                        <div class="text-right">{{__('for one library')}}</div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-8">
                    <div class="p-md-2 p-lg-3">
                        {{ __('Remember, each user can only star a repo once.') }}
                        {!! __('There are currently <strong>:pool_users</strong> users in the pool.', ['pool_users' => 10])  !!}
                        {!! __('Your process takes about <strong>:hourly</strong> hour(s) to complete for organic stargazing.', ['hourly' => "1-2"])  !!}
                    </div>
                    <div class="p-md-2 p-lg-3">
                        <form action="{{route('push-star-job')}}" method="POST">
                            <div class="form-group">
                                <label for="">{{__('Select Repository')}}</label>
                                <select name="repo_id" id="" class="form-control">
                                    @forelse(auth()->user()->repos()->get() as $repo)
                                        <option value="{{$repo->id}}">
                                            {{$repo->name}} - {{__(':starCount stars', ['starCount' => $repo->stargazers_count])}}
                                        </option>
                                    @empty
                                        <option value="">{{__('Please re-sync repositories')}}</option>
                                    @endforelse
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">{{__('Give me!')}}</button>
                            </div>

                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Customer Growth -->



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('Buy Credit')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{__('We can not provide service right now.')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                    <button type="button" class="btn btn-primary" disabled>{{__('Process')}}</button>
                </div>
            </div>
        </div>
    </div>
@endsection
