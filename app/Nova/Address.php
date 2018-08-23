<?php

namespace App\Nova;

use App\Models\Address as AddressModel;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Place;
use Laravel\Nova\Fields\Text;

class Address extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = AddressModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'address';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'address',
        'second_address',
        'city',
        'state',
        'postal_code',
        'country_code',
    ];

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

            MorphTo::make('Addressable')->types([
                Company::class,
            ]),

            Place::make('address', 'address'),

            Text::make('Address Line 2', 'second_address')->hideFromIndex(),

            Text::make('City'),

            Text::make('State')->hideFromIndex(),

            Text::make('Postal Code')->hideFromIndex(),

            Country::make('Country code'),
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
        return [];
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
