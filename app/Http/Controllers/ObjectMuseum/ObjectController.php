<?php

namespace App\Http\Controllers\ObjectMuseum;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\ObjectMuseum;
use Illuminate\Support\Facades\DB;


class ObjectController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(ObjectMuseum::where('deleted','=',ObjectMuseum::ACTIVE)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(ObjectMuseum::create($request->all()));

//        $data = $request->json()->all();
//        $object = ObjectMuseum::create([
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
        return $this->showOne(ObjectMuseum::findOrFail($id));
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
        $community  = ObjectMuseum::findOrFail($id);
        $community->deleted = ObjectMuseum::DELETED;

        try{
            $community->save();
        }catch (Exception $e){
            return $this->errorResponse("Error: No se pudo eliminar", 500);
        }

        return $this->succesMessaje("Registro eliminado");
    }

    public function getAllObjectMuseum($idObject){

        return $this->showList(
            DB::table('object_museums')
                ->join('collections','object_museums.collection_idCollection','=','collections.idCollection')
                ->join('sub_collections', 'sub_collections.idSubCollection','=','object_museums.subCollection_idSubCollection')
                ->join('inventory_catalogs', 'inventory_catalogs.idInventoryCatalogs','=','object_museums.location')
                ->where('idObject','=',"$idObject")
                ->get()
        );
    }
}
