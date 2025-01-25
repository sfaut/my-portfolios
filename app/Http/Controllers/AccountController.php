<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\Account;
use App\Models\OperationReport;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        // portfolio.show
    }

    public function create(Portfolio $portfolio)
    {
        return view('account.create', ['portfolio' => $portfolio]);
    }

    public function store(AccountRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $new_account = $request->validated();
        $new_account['portfolio_id'] = $portfolio->id;

        Account::create($new_account);

        return to_route('portfolio.show', $portfolio)
            ->with(['message' => 'Le compte a bien été ajouté au portfolio.']);
    }

    public function show(Account $account)
    {
        // $operations = OperationReport::where('account_id', $account->id)->get();

        return view('account.show', [
            'account' => $account,
            // 'operations' => $operations,
        ]);
    }

    public function edit(Account $account)
    {
        return view('account.edit', [
            'account' => $account,
        ]);
    }

    public function update(AccountRequest $request, Account $account): RedirectResponse
    {
        $data = $request->validated();
        $account->update($data);

        return to_route('account.show', $account)
            ->with('alert', 'Les modifications sur le compte ont été enregistrées.');
    }

    public function destroy(string $id)
    {
        //
    }
}
