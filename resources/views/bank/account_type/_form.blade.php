{{ Form::model(
    $accountType ?? null,
    [
        'url' => $route,
        'id' => 'account_type_form',
        'enctype' => 'multipart/form-data',
        'method' => $method ?? 'post',
    ]
) }}

    <div class="form-group">
        {{ Form::label('name', 'Naam') }}
        {{ Form::text(
            'name',
            optional($accountType)->getName() ?? '',
            [
                'class' => 'form-control',
                'placeholder' => 'Account type naam'
            ]
        ) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Beschrijving') }}
        {{ Form::textarea(
            'description',
            optional($accountType)->getDescription() ?? '',
            [
                'class' => 'form-control',
                'placeholder' => 'Account type naam',
                'cols' => 30,
                'rows' => 3,
            ]
        ) }}
    </div>

    <div class="checkbox">
        <label>
            {{ Form::checkbox(
                'is_commercial',
                optional($accountType)->isCommercial() ? 'on' : null,
                optional($accountType)->isCommercial()
            ) }} Commercieel
        </label>
    </div>
{{ Form::close() }}
