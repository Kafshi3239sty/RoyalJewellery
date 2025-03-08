<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Orders extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'total_price',
        'status'
    ];

    public function customers() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderdetails() : HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }
}
