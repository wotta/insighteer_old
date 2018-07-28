<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Insighteer\Entities\Bank\AccountType;
use Insighteer\Repositories\Bank\AccountTypeRepositoryInterface;
use Insighteer\Services\Bank\AccountTypeService;

class AccountTypeController extends Controller
{
    /** @var AccountTypeRepositoryInterface */
    private $accountTypeRepository;

    /** @var AccountTypeService */
    private $accountTypeService;

    public function __construct(
        AccountTypeRepositoryInterface $accountTypeRepository,
        AccountTypeService $accountTypeService
    ) {
        $this->accountTypeRepository = $accountTypeRepository;
        $this->accountTypeService = $accountTypeService;
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
        $this->accountTypeService->update($accountType->getId(), $request->all());

        return redirect()->route('account-types.show', $accountType->getId());
    }

    public function destroy(AccountType $accountType): RedirectResponse
    {
        $this->accountTypeRepository->delete($accountType->getId());

        return redirect()->route('account-types.index');
    }
}
