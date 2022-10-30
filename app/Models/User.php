<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nick_name',
        'cell',
        'year',
        'photo',
        'description',
        'job',
        'livin_in',
        'gender_id',
        'sexual_orientation_id',
        'smoking_id',
        'filter_id',
        'admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sexualOrietations()
    {
        return $this->hasOne(SexualOrietation::class, 'id', 'sexual_orientation_id');
    }

    public function genders()
    {
        return $this->hasOne(Gender::class, 'id', 'gender_id');
    }

    public function smokings()
    {
        return $this->hasOne(Smoking::class, 'id', 'smoking_id');
    }

    public function filters()
    {
        return $this->hasOne(Filter::class, 'id', 'filter_id');
    }

    public function combines()
    {
        return $this->hasMany(Combine::class, 'user_secound_id', 'id');
    }

    public function setPasswordAttribute($value)
    {
        if(!is_null($value)){
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
