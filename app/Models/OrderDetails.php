<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetails extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'RVID',
        'quantity',
        'price'
    ];

    public function variants() : HasMany
    {
        return $this->hasMany(RingVariants::class);
    }

    public function orders() : BelongsTo
    {
        return $this->belongsTo(Orders::class);
    }
}
