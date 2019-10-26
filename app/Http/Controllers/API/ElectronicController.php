<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Electronic;

class ElectronicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Electronic::latest()->paginate(20);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|integer',
            'name' => 'required|String|max:191',
            'model' => 'required|String|max:191',
            'quality' => 'required|String|max:191',
            'company' => 'required|String|max:191', 
             ]);
        return Electronic::create([
            'code' => $request['code'],
            'name' => $request['name'],
            'model' => $request['model'],
            'quality' => $request['quality'],
            'company' => $request['company']
        ]);
        
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $electronic = Electronic::findOrFail($id);
        $electronic->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $electronic = Electronic::findOrFail($id);
        $electronic->delete();
    }
}
