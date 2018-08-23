<?php

namespace Wotta\IbanValidationField;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Nova::serving(function (ServingNova $event) {
            Nova::script('iban-validation-field', __DIR__.'/../dist/js/field.js');
            Nova::style('iban-validation-field', __DIR__.'/../dist/css/field.css');
        });
    }

    public function register(): void
    {
        //
    }
}
