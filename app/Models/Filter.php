<?php

namespace App\Models;

use App\Models\User;
use App\Models\Gender;
use App\Models\Smoking;
use App\Models\SexualOrietation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'sexual_orientation_id',
        'gender_id',
        'smoking_id',
        'year_min',
        'year_max'
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'filter_id');
    }

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
}
