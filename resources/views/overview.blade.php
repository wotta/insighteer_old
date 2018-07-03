@extends('adminlte::page')

@section('title', __('general.overview'))

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            @include('partials/overview/budget/overview')
        </div>
        <div class="col-md-4">
            @include('partials/overview/risk_meter/info_box')

            @include('partials.overview.accounts.overview')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('partials.overview.accounts.income-expenses-overview', [
                'expensesTitle' => __('accounts.income & expenses')
            ])
        </div>
    </div>
@stop