<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'month',
        'year',
        'total_budget',
        'saving_target',
    ];

    protected $casts = [
        'total_budget' => 'decimal:2',
        'saving_target' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function getTotalSpentAttribute(): float
    {
        return $this->expenses()->sum('amount');
    }

    public function getRemainingBudgetAttribute(): float
    {
        return $this->total_budget - $this->total_spent;
    }
}
