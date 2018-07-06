@extends('adminlte::page')

@section('title', __('bank.account_type'))

@section('content_header')
    <h1>{{ __('bank.account_type') }} toevoegen</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Voeg account type toe</h3>
                </div>
                <div class="box-body">
                    @include('bank.account_type._form', [
                        'route' => ('account-types.store')
                    ])
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" form="account_type_form">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>
@endsection