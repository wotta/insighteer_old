<?php

return [
    'route_bindings' => [
        [
            'route_key' => 'account_type',
            'transformer' => \Insighteer\Transformers\AccountTypeTransformer::class,
            'model' => \App\Models\Bank\AccountType::class,
        ],
    ],
];