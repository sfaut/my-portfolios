<?php

namespace App\Http\Controllers;

use App\Mail\PortfolioCreatedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailingController extends Controller
{
    public function sendPortfolioCreatedMail()
    {
        Mail::to('sebastien.faut@gmail.com')->send(new PortfolioCreatedMail());
    }
}
