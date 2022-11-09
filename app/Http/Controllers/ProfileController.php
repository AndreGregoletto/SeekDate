<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Filter;
use App\Models\Gender;
use App\Models\Smoking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SexualOrietation;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Auth\Register\RequestUpdate;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $oUser)
    {
        $oUser = auth()->user('id');
        return view('profile', ['oUser' => $oUser]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oUser             = User::where('id', $id)->with(
                                                        'sexualOrietations', 
                                                        'genders', 
                                                        'smokings', 
                                                        'filters'
                                                    )->get();
                                                    // dd($oUser);
        $sexualOrietations = SexualOrietation::get();
        $smokings          = Smoking::get();
        $genders           = Gender::get();

        return view('profile.edit', [
                                    'oUser' => $oUser, 
                                    'sexualOrietations' => $sexualOrietations, 
                                    'smokings' => $smokings, 
                                    'genders' => $genders
                                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdate $request, $id)
    {
        $data = $request->except(
                                'sexual_orientation', 
                                'gender', 
                                'smokings', 
                                'year_min', 
                                'year_max', 
                                '_token', 
                                '_method'
                            );
        
        if($request->hasFile('photo')){
            Storage::disk('public')->delete(auth()->user()->photo);

            $fileName      = Str::slug($data['name'].'_'.$data['nick_name'], '_').'.'.$data['photo']->extension();
            $data['photo'] = $request->photo->storeAs('photo', $fileName, 'public');
        }
  
        User::where('id', $id)->update($data);

        $dataFilter = $request->only(
                                    'sexual_orientation', 
                                    'gender', 
                                    'smokings', 
                                    'year_min', 
                                    'year_max'
                                );

        $updateData      = $this->filterName($dataFilter);

        Filter::where('id', $id)->update($updateData);

        return redirect()->route('profile.index');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
