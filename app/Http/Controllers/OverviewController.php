<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class OverviewController extends Controller
{
    public function index(): View
    {
        return view('overview');
    }
}
