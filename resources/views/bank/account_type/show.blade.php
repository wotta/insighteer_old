@extends('adminlte::page')

@section('title', __('general.account_type'))

@section('content_header')
    <h1>{{ __('general.account_type') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('bank.account_type.view') }} - {{ $accountType->getId() }}</h3>
                </div>
                <div class="box-body no-padding">
                    @include('bank.account_type.partials.show')
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Update account type</h3>
                </div>
                <div class="box-body">
                    @include('bank.account_type._form', [
                        'route' => route('account-types.update', $accountType->getId()),
                        'method' => 'put',
                    ])
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary" form="account_type_form">Toevoegen</button>
                </div>
            </div>
        </div>
    </div>
@endsection