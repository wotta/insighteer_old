<?php

namespace App\Nova\Payments;

use App\Models\Payments\Payment as PaymentModel;
use App\Nova\Bank\Account;
use App\Nova\Company;
use App\Nova\Resource;
use App\Nova\Status;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Vyuldashev\NovaMoneyField\Money;

class Payment extends Resource
{
    public static $model = PaymentModel::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'description',
        'reference',
    ];

    public function subtitle(): string
    {
        return sprintf('%s: %s', ucfirst(__('bank.iban')), $this->account->iban);
    }

    public function fields(Request $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make('Company', null, Company::class)
                ->searchable()
                ->sortable()
                ->hideFromIndex(),

            BelongsTo::make('Account', null, Account::class)
                ->searchable()
                ->sortable()
                ->hideFromIndex(),

            BelongsTo::make('Status', null, Status::class),

            Text::make(__('payment.name'), 'name')
                ->sortable()
                ->rules('required', 'max:255')
                ->displayUsing(function ($value) {
                    return str_limit($value, 30);
                }),

            Textarea::make(__('payment.description'), 'description'),

            Text::make(__('payment.reference'), 'reference')
                ->sortable()
                ->rules('nullable', 'max:255')
                ->hideFromIndex(),

            Money::make(__('payment.amount'), 'EUR', 'amount')
                ->storedInMinorUnits(),

            Boolean::make(__('payment.recurring'), 'recurring'),

            Number::make(__('payment.recurring_day'), 'recurring_day')
                ->rules('required_if:recurring,1', 'between:0,28')
                ->hideFromIndex(),

            Date::make(__('payment.payment_date'), 'payment_date'),
        ];
    }

    public function cards(Request $request): array
    {
        return [];
    }

    public function filters(Request $request): array
    {
        return [];
    }

    public function lenses(Request $request): array
    {
        return [];
    }

    public function actions(Request $request): array
    {
        return [];
    }
}
