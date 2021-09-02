<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    protected $table='activation_code';
    use HasFactory;
    protected $fillable=[
        'user_id',
        'code',
        'expired_at',
    ];
    public $timestamps=false;
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function scopeGenerationCode($query){
        if ($code=$this->User_Code()):
            $code=$code->code;
        else:
            auth()->user()->ActivationCode()->delete();
            $code=mt_rand(100000,999999);
            auth()->user()->ActivationCode()->create([
                'code'=>$code,
                'expired_at'=>now()->addMinutes(5)
            ]);
        endif;
        return $code;
    }
    public function User_Code(){
        return auth()->user()->ActivationCode()->where('expired_at','>',now())->first();
    }
    public function scopeVerifyCode($query,$token,$user)
    {
        return !! $user->ActivationCode()->where('code','=',$token)->where('expired_at','>',now())->first();
    }

}
