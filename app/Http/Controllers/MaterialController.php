<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Material::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dummyImgUrl = "/no/limits";
        $dummyUser = "Jordain Mains";

        $item = new Material();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->amount = $request->amount;
        $item->unit = $request->unit;
        $item->added_by = $dummyUser;
        $item->location = $request->location;
        $item->img_url = $dummyImgUrl;

        try {
            $item->save();
            return true;
        } catch (\Exception $e) {
            return $e;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        return response()->json(
            $material
        );
    }

    /**
     * Display results from search terms
     *
     * @param  String $searchTerms
     * @return \Illuminate\Http\Response
     */
    public function search($searchTerms){
        return Material::where('name','like','%'.$searchTerms.'%')
            ->orWhere('description','like','%'.$searchTerms.'%')
            ->orWhere('added_by','like','%'.$searchTerms.'%')
            ->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
        //
    }
}
