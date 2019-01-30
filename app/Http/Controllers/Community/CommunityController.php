<?php

namespace App\Http\Controllers\Community;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Community;

class CommunityController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(Community::where('deleted','=',Community::ACTIVE)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(Community::create($request->all()));
//        $community = Community::create([
//            'name' => $data['name'],
//            'director' => $data['director'],
//            'address' => $data['address']
//        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne(Community::findOrFail($id));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $community  = Community::findOrFail($id);
        $community->deleted = Community::DELETED;

        try{
            $community->save();
        }catch (Exception $e){
            return $this->errorResponse("Error: No se pudo eliminar", 500);
        }

        return $this->succesMessaje("Registro eliminado");

    }
}
