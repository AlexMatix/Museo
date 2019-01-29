<?php

namespace App\Http\Controllers\Collection;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CollectionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::all();
        return response()->json([$collections], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $collection = Collection::create([
            'name' => $data['name'],
            'idSet' => $data['idSet'],
            'description' => $data['description']
        ]);

        return response()->json([$collection], 201);
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
        //
    }
}
