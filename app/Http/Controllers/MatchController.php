<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Match\Request as MatchRequest;
use App\Models\Combine;
use App\Models\Filter;
use App\Models\User;

class MatchController extends Controller
{
    public function index()
    {
        $oUsers = User::with(
                        'sexualOrietations', 
                        'genders', 
                        'smokings', 
                        'combines'
                    );
        $filter = Filter::where('id', auth()->user()->id)
                          ->with('sexualOrietations', 'genders', 'smokings')
                          ->get();

        $data   = $this->getFilter($oUsers, $filter);
        $datas  = $data->get(); 

        foreach($datas as $data){
            if ((count($data['combines']) == 0) && ($data->id != auth()->user()->id)) {
                $checkIn[] = $data;
            }else{
                foreach($data['combines'] as $combine){
                    if((($combine->user_first_id != auth()->user()->id) == true) && ($combine->user_first_active != 1)){
                        $checkIn[] = $data;
                    }else{
                        $checkIn = []; //erro
                    }
                }
            }
        }
        
        if(count($checkIn) == 0){
            $data = null;
        }else{
            $data = $checkIn[0];
        }
        return view('match', ['data' => $data]);
    }

    protected function getFilter($data, $filter)
    {       
        if(isset($filter[0]['sexual_orientation_id'])){
            $data = $data->where('sexual_orientation_id', $filter[0]['sexual_orientation_id']);
        }

        if(isset($filter[0]['smoking_id'])){
            $data = $data->where('smoking_id', $filter[0]['smoking_id']);
        }

        if(isset($filter[0]['gender_id'])){
            $data = $data->where('gender_id', $filter[0]['gender_id']);
        }

        if(isset($filter[0]['year_min'])){
            if($filter[0]['year_min'] < 18){
                $filter[0]['year_min'] = 18;
            }
            $data = $data->whereBetween('year', [$filter[0]['year_min'], $filter[0]['year_max']]);
        }

        return $data;
    }

    public function acceptMatch(MatchRequest $request)
    {
        $newCombine = [
            'user_first_id'       => auth()->user()->id,
            'user_first_active'   => 1,
            'user_secound_id'     => $request->only('id')['id'],
            'user_secound_active' => 0,
            'active'              => 0
        ];

        Combine::updateOrCreate($newCombine);

        return redirect()->route('match');
    }

    public function recuseMatch(MatchRequest $request)
    {
        $newCombine = [
            'user_first_id'       => auth()->user()->id,
            'user_first_active'   => 0,
            'user_secound_id'     => $request->only('id')['id'],
            'user_secound_active' => 0,
            'active'              => 0
        ];

        Combine::updateOrCreate($newCombine);

        return redirect()->route('match');
    }

    public function whoMatchMe()
    {
        $combines = Combine::where('user_secound_id', auth()->user()->id)->orderBy('active', 'asc')->with('users')->get();

        foreach($combines as $combine){

            if(($combine->user_secound_id == auth()->user()->id) && ($combine->user_first_active == 1) && ($combine->active == 0)){
                $aDatas[] = [
                    'user_first_id' => $combine->user_first_id
                ] ;

                foreach ($aDatas as $data) {
                    if(isset($data)){
                        $users      = User::where('id', $data['user_first_id'])->get();
                    }else{
                        $error[] = [];
                    }
                }
                $oProfile = $users[0];

                return view('dashboard', ['oProfile' => $oProfile]);
                
            }else{
                return view('dashboard'); 
            }
        }

    }

    public function returnAccept(MatchRequest $request)
    {
        $combines = Combine::where('user_first_id', $request->only('id')['id'])
                           ->where('user_first_active', 1)
                           ->where('user_secound_id', auth()->user()->id)
                           ->get();

        $newStatus = [
            'user_first_id'       => $request->only('id')['id'],
            'user_first_active'   => 1,
            'user_secound_id'     => auth()->user()->id,
            'user_secound_active' => 1,
            'active'              => 1
        ];

        Combine::where('id', $combines[0]->id)->update($newStatus);
        return redirect()->route('dashboard');
    }

    public function returnRecuse(MatchRequest $request)
    {
        $combines = Combine::where('user_first_id', $request->only('id')['id'])
                    ->where('user_first_active', 1)
                    ->where('user_secound_id', auth()->user()->id)
                    ->get();

        $newStatus = [
            'user_first_id'       => $request->only('id')['id'],
            'user_first_active'   => 0,
            'user_secound_id'     => auth()->user()->id,
            'user_secound_active' => 0,
            'active'              => 0
        ];

        Combine::where('id', $combines[0]->id)->update($newStatus);
        return redirect()->route('dashboard');
    }

}
