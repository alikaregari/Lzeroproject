<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\This;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'tow_factor_type',
        'is_superuser',
        'is_staff',
    ];
    /**
     * @var mixed
     */

    public function setPasswordAttribute($value)
    {
        $this->attributes['password']=bcrypt($value);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }

    public function ActivationCode(): HasMany
    {
        return $this->hasMany(ActivationCode::class);
    }
    public function scopeCheck_TowFactor($query,$key){
        return $this->tow_factor_type ==$key;
    }
    public function Check_TowFactor_Enable(){
        return $this->tow_factor_type !='off';
    }
    public function Check_TowFactor_Sms_Type(){
        return $this->tow_factor_type=='sms';
    }
    public function scopeFind_User_By_Email($query,$key)
    {
        return User::where('email',$key)->first();
    }
    public function Is_Super_User(){
        return !! $this->is_superuser;
    }
    public function Is_Staff_User(){
        return !! $this->is_staff;
    }
    public function scopeIs_Verified($query){
        return $this->email_verified_at;
    }
    public function rules(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Rule::class);
    }
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function hasRule($rules){
        return !! $rules->intersect($this->rules)->all();
    }
    private function hasPermissions($permission)
    {
        return $this->permissions->contains('name',$permission->name);
    }
    public function hasPermission($permission){
        return !! $this->hasPermissions($permission) || $this->hasRule($permission->rules);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}

