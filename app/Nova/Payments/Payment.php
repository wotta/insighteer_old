<?php

namespace App\Nova\Payments;

use App\Models\Payments\Payment as PaymentModel;
use App\Nova\Resource;
use App\Nova\Status;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Vyuldashev\NovaMoneyField\Money;

class Payment extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = PaymentModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'description',
        'reference',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Balance', null, Balance::class)
                ->searchable()
                ->sortable(),

            BelongsTo::make('Status', null, Status::class),

            Text::make(__('payment.name'), 'name')
                ->sortable()
                ->rules('required', 'max:255'),

            Textarea::make(__('payment.description'), 'description'),

            Text::make(__('payment.reference'), 'reference')
                ->sortable()
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Money::make(__('payment.amount'), 'EUR', 'amount')
                ->storedInMinorUnits(),

            Boolean::make(__('payment.recurring'), 'recurring'),

            Number::make(__('payment.recurring_day'), 'recurring_day')
                ->rules('required_if:recurring,1', 'between:1,28')
                ->hideFromIndex(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
