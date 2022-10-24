<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Match\Request as MatchRequest;
use App\Models\Filter;
use App\Models\User;

class MatchController extends Controller
{
    public function index()
    {
        $oUsers = User::with('sexualOrietations', 'genders', 'smokings');

        $filter = Filter::where('id', auth()->user()->id)
                          ->with('sexualOrietations', 'genders', 'smokings')
                          ->get();

        $data  = $this->getFilter($oUsers, $filter);
        // dd($data->get());
        $datas = $data->paginate(1);
        
        // $recuse = $this->recuseMatch($datas[0]->id);
            
        return view('match', ['datas' => $datas]);
    }

    protected function getFilter($data, $filter)
    {
        if(!empty($filter[0]['sexual_orientation_id'])){
            $data = $data->where('sexual_orientation_id', $filter[0]['sexual_orientation_id']);
        }

        if(!empty($filter[0]['smoking_id'])){
            $data = $data->where('smoking_id', $filter[0]['smoking_id']);
        }

        if(!empty($filter[0]['gender_id'])){
            $data = $data->where('gender_id', $filter[0]['gender_id']);
        }

        if(!empty($filter[0]['year_min'])){
            if($filter[0]['year_min'] < 18){
                $filter[0]['year_min'] = 18;
            }
            $data = $data->whereBetween('year', [$filter[0]['year_min'], $filter[0]['year_max']]);
        }

        return $data;
    }

    public function acceptMatch(MatchRequest $request)
    {
        dd($request->validated(), 'Aceitou');
    }

    public function recuseMatch(MatchRequest $request)
    {
        dd('Recusou', $request->validated());
    }

}
