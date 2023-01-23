<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetails extends Model
{
    protected $fillable = ['order_id', 'menu_id', 'title', 'quantity',  'total', 'is_food'];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeBelongsToOrder(Builder $q, $order_id): Builder
    {
        return $q->where('order_id', $order_id);
    }

    public function scopeIsFood(Builder $q): Builder
    {
        return $q->where('is_food', 1);
    }
}
