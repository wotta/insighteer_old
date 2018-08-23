<?php

namespace Wotta\IbanValidationField;

use Laravel\Nova\Fields\Field;

class IbanValidationField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'iban-validation-field';
}
