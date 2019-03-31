@extends('layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-settings"></i>
                    <div class="d-inline">
                        <h5>{{ title()->get() }}</h5>
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
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>General</h3>
                </div>
                <div class="card-block">
                    <p class="m-0">
                        With these settings, session timeout plugin launches a timeout warning dialog in a fixed amount of time regardless of user activity. In this demo warning dialog appears <b>after 3 seconds</b>                                                            of page load.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Language</h3>
                </div>
                <div class="card-block">
                    {{ Form::open(['route' => 'admin.settings.general']) }}
                        <div class="form-group">
                            <label for="exampleInputName1">Site locales</label>
                            <input type="text" class="form-control" id="locale" name="locale" placeholder="Locale">
                        </div>
                        <div class="form-group">
                            <div class="checkbox-fade fade-in-success">
                                <label>
                                    <input type="checkbox" name="hide_locale" value="1">
                                    <span class="cr">
                                        <i class="cr-icon ik ik-check txt-success"></i>
                                    </span>
                                    <span>Hide default locale in Uri</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-fade fade-in-success">
                                <label>
                                    <input type="checkbox" name="use_icon" value="1">
                                    <span class="cr">
                                        <i class="cr-icon ik ik-check txt-success"></i>
                                    </span>
                                    <span>Show icon</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Text Position</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Text position">
                        </div>
                        <button type="submit" class="btn btn-danger mr-2 float-right">
                            <i class="ik ik-check-circle"></i>
                            Save
                        </button>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@stop