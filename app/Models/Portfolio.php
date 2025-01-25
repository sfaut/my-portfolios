<?php

namespace App\Models;

use App\Models\Account;
use App\Models\AccountReport;
use App\Models\Operation;
use App\Models\Scopes\AuthUserScope;
use App\Models\User;
use App\Observers\PortfolioObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    protected $attributes = [
        'description' => '',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new AuthUserScope);

        Portfolio::observe(PortfolioObserver::class);
    }

    protected function casts(): array
    {
        return [
            'is_admin' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class)->orderBy('name');
    }

    public function accountsReport(): HasMany
    {
        return $this->hasMany(AccountReport::class)->orderBy('name');
    }

    public function operations(): HasManyThrough
    {
        return $this->hasManyThrough(Operation::class, Account::class);
    }
}
