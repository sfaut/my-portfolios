<?php

namespace App\Models;

use App\Models\Operation;
use App\Models\OperationReport;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $dateFormat = 'Y-m-d H:i:s.u';

    protected $with = [
        'portfolio.user',
    ];

    protected $fillable = [
        'name',
        'description',
        'portfolio_id',
    ];

    protected $casts = [

    ];

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function operations(): HasMany
    {
        return $this->hasMany(Operation::class);
    }

    public function operationsReport(): HasMany
    {
        return $this->hasMany(OperationReport::class);
    }
}
