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
                    if(($combine->user_first_id != auth()->user()->id) == true){
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

        Combine::create($newCombine);

        return redirect()->route('match');
    }

    public function recuseMatch(MatchRequest $request)
    {
        dd('Recusou', $request->validated());
    }

    protected function filter($firstId, $secoundId, $data)
    {
        // dd($firstId, $secoundId, $data); // Entrou
        if(isset($firstId, $secoundId) && $firstId != $secoundId){
            dd($data);
            dd(count($data->where('user_secound_id', $secoundId)) != $secoundId);
            if(count($data = $data->where('user_secound_active', $secoundId)) == 0 && count($data->where('user_secound_active', $secoundId)) == 0){
                $data = [
                    'user_first_id'       => $firstId,
                    'user_first_active'   => 1,
                    'user_secound_id'     => $secoundId,
                    'user_secound_active' => 0,
                    'active'              => 0
                ];

                Combine::create($data);
                return back();
            }else{
                dd('else');
            };
            //count($data = $data->where('user_secound_active', 1)) == 0
        }
        
    }

}
