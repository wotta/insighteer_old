<?php

namespace App\Http\Controllers\Bank;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Insighteer\Entities\Bank\AccountType;
use Insighteer\Repositories\Bank\AccountTypeRepositoryInterface;

class AccountTypeController extends Controller
{
    /** @var AccountTypeRepositoryInterface */
    private $accountTypeRepository;

    public function __construct(AccountTypeRepositoryInterface $accountTypeRepository)
    {
        $this->accountTypeRepository = $accountTypeRepository;
    }

    public function index(): View
    {
        return $this->quick()->with('accountTypes', $this->accountTypeRepository->all());
    }

    public function create(): View
    {
        return $this->quick();
    }

    public function store(Request $request): RedirectResponse
    {
        $this->accountTypeRepository->create($request->all());

        return redirect()->route('account-types.index');
    }

    public function show(AccountType $accountType): View
    {
        return $this->quick()->with('accountType', $accountType);
    }

    public function edit(AccountType $accountType): View
    {
        return $this->quick()->withIncome($accountType);
    }

    public function update(Request $request, AccountType $accountType): RedirectResponse
    {
        $accountType->update($request->all());

        return redirect()->route('account-types.index');
    }

    public function destroy(AccountType $accountType): RedirectResponse
    {
        $this->accountTypeRepository->delete($accountType->getId());

        return redirect()->route('account-types.index');
    }
}
