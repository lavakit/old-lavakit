@extends('layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-package bg-blue"></i>
                    <div class="d-inline">
                        <h5>Session Timeout</h5>
                        <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    {!! Breadcrumbs::render('admin.settings.general', 'Setting', Route::currentRouteName()) !!}
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Session Timeout</h3>
                </div>
                <div class="card-block">
                    <p class="m-0">
                        With these settings, session timeout plugin launches a timeout warning dialog in a fixed amount of time regardless of user activity. In this demo warning dialog appears <b>after 3 seconds</b>                                                            of page load.
                    </p>
                </div>
            </div>

        </div>
    </div>
@stop