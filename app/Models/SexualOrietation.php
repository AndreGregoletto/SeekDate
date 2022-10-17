<?php

namespace App\Models;

use App\Models\User;
use App\Models\Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SexualOrietation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'status'
    ];    

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'sexual_orietation_id');
    }

    public function filters()
    {
        return $this->hasOne(Filter::class, 'id', 'sexual_orietation_id');
    }
}
