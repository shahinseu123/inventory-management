<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reseller;

class ResellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return Reseller::latest()->paginate(10);
        // return ['masg' => 'success'];
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
            'name' => 'required|String|max:191',
            'email' => 'required|String|email|max:191|unique:users',
        ]);
        Reseller::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'contact' => $request['contact'],
            'company' => $request['company']
        ]);
        return ['masg' => 'I have data'];
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
        $reseller = Reseller::findOrFail($id);
        $reseller->update($request->all());
        return ['msg' => 'updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reseller = Reseller::findOrFail($id);
        $reseller->delete();
        return ['msg' => 'deleted'];
    }
}
