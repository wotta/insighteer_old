<?php

use App\Jobs\ExternalSyncs\CashBookSync;

Route::redirect('/', '/administration');

Route::get('test', function () {
    $sync = app()->make(CashBookSync::class);
    $sync->handle();
});
