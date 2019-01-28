<?php

namespace App\Http\Controllers;

use App\Object;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Object::all();
        return response()->json([$objects], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $object = Object::create([
            'origin_number' => $data['origin_number'],
            'catalog_number' => $data['catalog_number'],
            'appraisal' => $data['appraisal'],
            'origin_description' => $data['origin_description'],
            'date_of_entry' => $data['date_of_entry'],
            'collection_idCollection' => $data['collection_idCollection'],
            'subCollection_idSubCollection' => $data['subCollection_idSubCollection'],
            'type' => $data['type'],
            'location' => $data['location'],
        ]);

        return response()->json([$object], 201);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}