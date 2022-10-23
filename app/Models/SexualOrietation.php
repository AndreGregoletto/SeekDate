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
        return $this->hasOne(User::class, 'sexual_orietation_id', 'id');
    }

    public function filters()
    {
        return $this->hasOne(Filter::class, 'sexual_orientation_id', 'id');
    }
}
