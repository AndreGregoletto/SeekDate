<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Filter;
use App\Models\Gender;
use App\Models\Smoking;
use Illuminate\Support\Str;
use App\Models\SexualOrietation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\User\RequestCreate;
use App\Http\Requests\Auth\Register\RequestUpdate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('sexualOrietations', 'genders')->paginate(10);

        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders            = Gender::get();
        $smokings           = Smoking::get();
        $sexualOrientations = SexualOrietation::get();

        return view('admin.user.create', [
                                        'genders'            => $genders, 
                                        'smokings'           => $smokings, 
                                        'sexualOrientations' => $sexualOrientations
                                        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreate $request)
    {
        $data     = $request->only(
                                'sexual_orientation', 
                                'gender', 
                                'smokings', 
                                'year_min', 
                                'year_max'
                            );

        $dataUser = $request->except(
                                'sexual_orientation', 
                                'gender', 
                                'smokings', 
                                'year_min', 
                                'year_max', 
                                '_token'
                            );
        
        Filter::create($this->filterName($data));

        $filter   = Filter::get()->last();
        $filterId = [
            'filter_id' => $filter['id']
        ];

        $fileName          = Str::slug($dataUser['name'].'_'.$dataUser['nick_name'], '_').'.'.$dataUser['photo']->extension();
        $dataUser['photo'] = $request->photo->storeAs('photo', $fileName, 'public');
        $createUser        = (array_merge($dataUser, $filterId));

        User::create($createUser);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oUser = User::where('id', $id)->with(
                                            'sexualOrietations', 
                                            'genders', 
                                            'smokings', 
                                            'filters'
                                        )->get();

        return view('admin.user.show', ['oUser' => $oUser]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $users = User::where('id', $id)->with(
                                            'sexualOrietations', 
                                            'genders', 
                                            'smokings', 
                                            'filters'
                                        )->get();

        $genders            = Gender::get();
        $smokings           = Smoking::get();
        $sexualOrientations = SexualOrietation::get();

        return view('admin.user.edit', [
                                        'users'              => $users,
                                        'genders'            => $genders, 
                                        'smokings'           => $smokings, 
                                        'sexualOrientations' => $sexualOrientations
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

        $dataFilter   = $request->only('sexual_orientation', 'gender', 'smokings', 'year_min', 'year_max');
        $updateFilter = $this->filterName($dataFilter);
        Filter::where('id', $id)->update($updateFilter);

        $filterId = [
            'filter_id' => auth()->user()->filter_id
        ];
        
        $updateProfile = (array_merge($data, $filterId));
     
        User::where('id', $id)->update($updateProfile);

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
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
