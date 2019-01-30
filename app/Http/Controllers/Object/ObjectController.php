<?php

namespace App\Http\Controllers\Object;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Object;

class ObjectController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(Object::where('deleted','=',Object::ACTIVE));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(Object::create($request->all()));

//        $data = $request->json()->all();
//        $object = Object::create([
//            'origin_number' => $data['origin_number'],
//            'catalog_number' => $data['catalog_number'],
//            'appraisal' => $data['appraisal'],
//            'origin_description' => $data['origin_description'],
//            'date_of_entry' => $data['date_of_entry'],
//            'collection_idCollection' => $data['collection_idCollection'],
//            'subCollection_idSubCollection' => $data['subCollection_idSubCollection'],
//            'type' => $data['type'],
//            'location' => $data['location'],
//        ]);
//
//        return response()->json([$object], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne(Object::findOrFail($id));
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
        $community  = Object::findOrFail($id);
        $community->deleted = Object::DELETED;

        try{
            $community->save();
        }catch (Exception $e){
            return $this->errorResponse("Error: No se pudo eliminar", 500);
        }

        return $this->succesMessaje("Registro eliminado");
    }
}
