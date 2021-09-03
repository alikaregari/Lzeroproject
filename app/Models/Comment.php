<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=[
        'comment','approved','parent_id','commentable_id','commentable_type'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function product(): MorphTo
    {
        return $this->morphTo();
    }
    public function child(){
        return $this->hasMany(Comment::class,'parent_id','id');
    }
}
