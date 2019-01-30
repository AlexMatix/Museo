<?php

namespace App\Http\Controllers\Movement;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Movement;

class MovementController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(Movement::where('deleted','=',Movement::ACTIVE)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(Movement::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne(Movement::findOrFail($id));
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
        $movement  = Movement::findOrFail($id);
        $movement->deleted = Movement::DELETED;

        try{
            $movement->save();
        }catch (Exception $e){
            return $this->errorResponse("Error: No se pudo eliminar", 500);
        }

        return $this->succesMessaje("Registro eliminado");
    }
}
