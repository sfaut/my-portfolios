<?php

namespace App\Http\Controllers;

use App\Http\Requests\PortfolioRequest;
use App\Models\Account;
use App\Models\Portfolio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = auth()->user()->portfolios()->get();

        return view('portfolio.index', [
            'portfolios' => $portfolios,
        ]);
    }

    public function create()
    {
        return view('portfolio.create');
    }

    public function store(PortfolioRequest $request): RedirectResponse
    {
        $request->validated();
        $user_id = auth()->user()->id;
        $data = $request->merge(['user_id' => $user_id])->all(['name', 'description', 'user_id']);
        $portfolio = Portfolio::create($data);

        return to_route('portfolio.show', $portfolio)
            ->with('message', "Le nouveau portfolio a bien été créé.\r\nVous pouvez maintenant y ajouter des comptes.");
    }

    public function show(Portfolio $portfolio)
    {
        return view('portfolio.show', ['portfolio' => $portfolio]);
    }

    public function edit(Portfolio $portfolio)
    {
        return view('portfolio.edit', ['portfolio' => $portfolio]);
    }

    public function update(PortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        $data = $request->validated();
        $portfolio->update($data);

        return to_route('portfolio.show', $portfolio)
            ->with('message', 'Les modifications sur le portfolio ont été enregistrées.');
    }

    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        $portfolio->delete();

        return to_route('portfolio.index')
            ->with('message', 'Le portfolio, les comptes et les opérations ont été supprimés.');
    }
}
