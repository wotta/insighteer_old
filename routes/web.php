<?php

Route::redirect('/', '/administration');

Route::get('test', function () {
    $path = resource_path('assets/js/externalSyncs/kasboekSync.js');

    $data = shell_exec("node $path");

    $datas = json_decode($data);

    foreach ($datas as $data) {
        dump($data);
    }
});
