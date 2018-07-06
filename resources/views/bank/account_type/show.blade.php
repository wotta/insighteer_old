@extends('adminlte::page')

@section('title', __('bank.account_type'))

@section('content_header')
    <h1>{{ __('bank.account_type') }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Bekijk {{ $model->id }}</h1>

            {{-- Account type information here --}}
        </div>
    </div>
@endsection
