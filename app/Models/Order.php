<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = ['user_id', 'tax', 'total', 'sub_total', 'note', 'status'];

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function scopeNewOrders(Builder $query){
        return $query->whereStatus('new');
    }

    public function scopeReceivedOrders(Builder $query){
        return $query->whereStatus('received');
    }

    public function scopeProcessedOrders(Builder $query){
        return $query->whereStatus('processed');
    }

}
