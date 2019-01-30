<?php

namespace App\Http\Controllers\Collection;

use App\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\DB;

class CollectionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(Collection::where('deleted','=',Collection::ACTIVE)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(Collection::create($request->all()));
//        $collection = Community::create([
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
        return $this->showOne(Collection::findOrFail($id));
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
        $collection = Collection::findOrFail($id);
        $rules = [
            'deleted' => 'in:' . Collection::ACTIVE . ',' . Collection::DELETED
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $collection->name = $request->name;
        }
        if ($request->has('description')) {
            $collection->description = $request->description;
        }

        if ($request->has('deleted')) {
            $collection->deleted = $request->deleted;
        }

        if (!$collection->isDirty()) {
            return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar'], 422);
        }

        $collection->save();
        return response()->json(['data' => $collection], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $collection  = Collection::findOrFail($id);
        $collection->deleted = Collection::DELETED;

        try{
            $collection->save();
        }catch (Exception $e){
            return $this->errorResponse("Error: No se pudo eliminar", 500);
        }

        return $this->succesMessaje("Registro eliminado");

    }

    public function getAllCollection($idSet){

        return $this->showList( DB::table('collections')
                        ->join('sets','sets.idSet','=','collections.idSet')
                        ->join('sub_collections', 'sub_collections.idCollection','=','collections.idCollection')
                        ->join('object_museums','object_museums.idObject','=','collections.idCollection')
                        ->where('collections.idSet', '=',"$idSet")
                        ->select('*')
                        ->get() );
    }


}
