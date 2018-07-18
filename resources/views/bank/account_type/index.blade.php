@extends('adminlte::page')

@section('title', __('bank.account_type'))

@section('content_header')
    <h1>{{ __('bank.account_type') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Overzicht account types</h3>
                </div>
                <div class="box-body no-padding">
                    @include('bank.account_type.partials.overview')
                </div>
                <div class="box-footer">
                    <span>Totaal account types : <span class="text-bold">{{ count($accountTypes) }}</span></span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Voeg account type toe</h3>
                </div>
                <div class="box-body">
                    @include('bank.account_type._form', [
                        'route' => route('account-types.store'),
                        'accountType' => null
                    ])
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" form="account_type_form">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>
@endsection