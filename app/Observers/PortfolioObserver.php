<?php

namespace App\Observers;

use App\Mail\PortfolioCreatedMail;
use App\Mail\PortfolioDeletedMail;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Mail;

class PortfolioObserver
{
    public function created(Portfolio $portfolio): void
    {
        Mail::to('sebastien.faut@gmail.com')
            // ->queue(new App\Mail\PortfolioCreatedMail);
            ->later(now()->addMinutes(2), new PortfolioCreatedMail($portfolio));
    }

    public function updated(Portfolio $portfolio): void
    {
        //
    }

    public function deleted(Portfolio $portfolio): void
    {
        Mail::to('sebastien.faut@gmail.com')
            // ->queue(new App\Mail\PortfolioCreatedMail);
            ->later(now()->addMinutes(2), new PortfolioDeletedMail($portfolio));
    }

    public function restored(Portfolio $portfolio): void
    {
        //
    }

    public function forceDeleted(Portfolio $portfolio): void
    {
        //
    }
}
