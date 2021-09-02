<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    protected $table='products';
    use HasFactory;
    protected $fillable=[
        'name','description','inventory','price','view_count',
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function commentzero(Product $product){
        return $product->comments()->where('parent_id',0)->where('approved',1)->get();
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
}
