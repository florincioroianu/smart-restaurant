<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'price'];

    public function menu_category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
