<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combine extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_first_id',
        'user_first_active',
        'user_secound_id',
        'user_secound_active',
        'active'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'id', 'user_secound_id');
    }

    // public function usersSecound()
    // {
    //     return $this->hasMany(User::class, 'id', 'user_secound_id');
    // }
}
