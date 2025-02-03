<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Operation extends Model
{
    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $with = [
        'account.portfolio.user',
    ];

    protected $fillable = [
        'id',
        'label',
        'amount',
        'delivery_at',
        'account_id',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
