<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Currency extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'symbol',
        'exchange_rate',
    ];

    /**
     * The attributes that should be cast
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'exchange_rate' => 'float',
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, ProductPrice::class);
    }
}
