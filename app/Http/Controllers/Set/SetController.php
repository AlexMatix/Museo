<?php

namespace App\Http\Controllers\Set;

use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SetController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sets = Set::all();
        return response()->json([$sets], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $set = Set::create([
            'title' => $data['title'],
            'idCommunity' => $data['idCommunity'],
            'description' => $data['description']
        ]);

        return response()->json([$set], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            return response()->json(['error' => 'Se debe especificar al menos un valor diferente para actualizar'], 422);
        }

        $set->save();
        return response()->json(['data' => $set], 200);
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
        //
    }
}
