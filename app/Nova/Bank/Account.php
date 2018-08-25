<?php

namespace App\Nova\Bank;

use App\Models\Bank\Account as AccountModel;
use App\Nova\Metrics\Payments\PaymentsPerDay;
use App\Nova\Payments\Balance;
use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Wotta\IbanValidation\IbanValidation;

class Account extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AccountModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'iban';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'iban',
        'bic',
        'bank_name',
    ];

    public function subtitle()
    {
        return __('bank.bank_name', ['name' => $this->bank_name]);
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('AccountType'),

            IbanValidation::make(__('bank.iban'), 'iban')
                ->sortable()
                ->rules('required', 'max:32', 'iban'),

            Text::make(__('bank.bic'), 'bic')
                ->sortable()
                ->rules('nullable', 'max:11'),

            Text::make(__('bank.name'), 'bank_name'),

            HasMany::make('Balance', null, Balance::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [
            new PaymentsPerDay,
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
