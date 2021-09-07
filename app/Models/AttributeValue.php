<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    protected $fillable=['value','attribute_id'];
    use HasFactory;
    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }
}
