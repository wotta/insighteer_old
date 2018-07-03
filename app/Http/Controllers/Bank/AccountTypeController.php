<?php

namespace App\Http\Controllers\Bank;

use App\Models\Bank\AccountType;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Insighteer\Services\Bank\AccountTypeService;

class AccountTypeController extends Controller
{
    /** @var AccountTypeService */
    private $accountTypeService;

    public function __construct(AccountTypeService $accountTypeService)
    {
        $this->accountTypeService = $accountTypeService;
    }

    public function index(): View
    {
        return $this->quick()->withData(AccountType::all());
    }

    public function create(): View
    {
        return $this->quick();
    }

    public function store(Request $request): RedirectResponse
    {
        AccountType::create($request->all());

        return redirect()->route('bank.accounttype.index');
    }

    public function show(AccountType $accountType): View
    {
        return $this->quick()->withData($accountType);
    }

    public function edit(AccountType $accountType): View
    {
        return $this->quick()->withIncome($accountType);
    }

    public function update(Request $request, AccountType $accountType): RedirectResponse
    {
        $accountType->update($request->all());

        return redirect()->route('bank.accounttype.index');
    }

    public function destroy(AccountType $accountType): RedirectResponse
    {
        $accountType->delete();

        return redirect()->route('bank.accounttype.index');
    }
}
