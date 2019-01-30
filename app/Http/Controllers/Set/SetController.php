<?php

namespace App\Http\Controllers\Set;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Set;
class SetController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showList(Set::where('deleted','=', Set::ACTIVE)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->showOne(Set::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->showOne(Set::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $set = Set::findOrFail($id);
        $rules = [
            'deleted' => 'in:' . Set::ACTIVE . ',' . Set::DELETED
        ];

        $this->validate($request, $rules);

        if ($request->has('title')) {
            $set->title = $request->title;
        }
        if ($request->has('description')) {
            $set->description = $request->description;
        }

        if ($request->has('deleted')) {
            $set->deleted = $request->deleted;
        }

        if (!$set->isDirty()) {
            return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
        }

        if($set->save()){
            return $this->showOne($set);
        }else{
            return $this->errorResponse('No se pudo guardar los cambios', 500);
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $set = Set::findOrFail($id);
        $set->deleted = Set::DELETED;
        if($set->save()){
            return $this->showOne($set);
        }

        return $this->errorResponse("No se pudo eliminar registro", 500);
    }
}
