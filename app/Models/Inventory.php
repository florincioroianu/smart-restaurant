<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    protected $fillable = ['stock_id', 'menu_id', 'starting_stock', 'current_stock', 'description', 'type', 'inventory_date'];
    protected $casts = [
        'inventory_date' => 'datetime:Y-m-d\TH:i:s',
    ];

    public function stock(): BelongsTo
    {
        return $this->belongsTo(Stock::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
