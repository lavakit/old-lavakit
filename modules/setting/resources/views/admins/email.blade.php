@extends('layouts.master')

@section('content')

    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-package"></i>
                    <div class="d-inline">
                        <h5>Session Timeout</h5>
                    </div>
                </div>
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
                    <lavakit-form-select-multiple></lavakit-form-select-multiple>
                </div>
            </div>
        </div>
    </div>
@stop