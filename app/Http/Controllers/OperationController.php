<?php

namespace App\Http\Controllers;

use App\Http\Requests\OperationRequest;
use App\Models\Account;
use App\Models\Operation;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function create(Account $account)
    {
        return view('operation.create', [
            'account' => $account,
        ]);
    }

    public function store(OperationRequest $request, Portfolio $portfolio, Account $account)
    {
        $new_operation = $request->validated();
        // $new_operation['account_id'] = $account->id;

        $account->operations()->create($new_operation);

        return to_route('account.show', ['portfolio' => $portfolio, 'account' => $account])
            ->with(['alert', 'operation.stored']);
    }

    public function edit(Operation $operation)
    {
        return view('operation.edit', [
            'operation' => $operation,
        ]);
    }

    public function update(OperationRequest $request, Operation $operation)
    {
        $data = $request->validated();
        $operation->update($data);

        return to_route('account.show', $operation->account)
            ->with('alert', 'Opération modifiée avec succès.')
            ->with('updated_operation_id', $operation->id);
    }

    public function destroy(Operation $operation)
    {
        $operation->delete();

        return to_route('account.show', $operation->account)
            ->with('alert', 'Opération supprimée avec succès');
    }
}
