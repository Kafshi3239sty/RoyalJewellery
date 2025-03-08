<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class RingVariants extends Model
{
    use HasFactory;

            /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'RID',
        'size',
        'Stock_quantity',
        'price'
    ];

    public function rings() : BelongsTo
    {
        return $this->belongsTo(Rings::class);
    }

    public function orderdetails() : BelongsToMany
    {
        return $this->belongsToMany(OrderDetails::class);
    }
}
