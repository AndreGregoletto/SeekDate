<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Default\RequestCreate;
use App\Http\Requests\Admin\Default\RequestUpdate;
use App\Models\SexualOrietation;
use Illuminate\Http\Request;

class SexualOrientationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sexualOrientations = SexualOrietation::paginate(10);
        return view('admin.sexualOrientation.index', ['sexualOrientations' => $sexualOrientations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sexualOrientation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreate $request)
    {
        SexualOrietation::create($request->validated());
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
        $sexualOrientations = SexualOrietation::where('id', $id)->get();
        return view('admin.sexualOrientation.edit', ['sexualOrientations' => $sexualOrientations]);
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
        SexualOrietation::where('id', $id)->update($request->validated());
        return redirect()->route('admin.sexualOrientation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SexualOrietation::where('id', $id)->delete();

        return back();
    }
}
