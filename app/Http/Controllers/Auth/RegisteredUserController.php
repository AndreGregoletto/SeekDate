<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Filter;
use App\Models\Gender;
use App\Models\Smoking;
use Illuminate\Support\Str;
use App\Models\SexualOrietation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Register\RequestCreate;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $genders            = Gender::get();
        $smokings           = Smoking::get();
        $sexualOrientations = SexualOrietation::get();

        return view('auth.register', ['genders'             => $genders, 
                                      'smokings'            => $smokings, 
                                      'sexualOrientations'  => $sexualOrientations]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RequestCreate $request)
    {        
        $data     = $request->only('sexual_orientation', 'gender', 'smokings', 'year_min', 'year_max');
        $dataUser = $request->except('sexual_orientation', 'gender', 'smokings', 'year_min', 'year_max', '_token');
        Filter::create($this->filterName($data));

        $filter   = Filter::get()->last();
        $filterId = [
            'filter_id' => $filter['id']
        ];

        $fileName = Str::slug($dataUser['name'].'_'.$dataUser['nick_name'], '_').'.'.$dataUser['photo']->extension();
        $dataUser['photo'] = $request->photo->storeAs('photo', $fileName, 'public');
        
        $createUser = (array_merge($dataUser, $filterId));
        
        User::create($createUser);

        return view('auth.login');
    }

    public function filterName($data)
    {
        $data = [
            'sexual_orientation_id' => $data['sexual_orientation'],
            'gender_id'             => $data['gender'],
            'smoking_id'            => $data['smokings'],
            'year_min'              => $data['year_min'],
            'year_max'              => $data['year_max']
        ];
        return $data;
    }
}
