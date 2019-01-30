<?php

namespace App\Http\Controllers\Exhibition;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Exhibition;

class ExhibitionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(Exhibition::where('deleted','=',Exhibition::ACTIVE)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(Exhibition::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne(Exhibition::findOrFail($id));
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
        $exhibition  = Exhibition::findOrFail($id);
        $exhibition->deleted = Exhibition::DELETED;

        try{
            $exhibition->save();
        }catch (Exception $e){
            return $this->errorResponse("Error: No se pudo eliminar", 500);
        }

        return $this->succesMessaje("Registro eliminado");
    }
}
