<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Materialhistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $imageName = '';

        if($request->get('image')){
            $image = $request->get('image');
            $imageName = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            $url = Storage::putFileAs(
                'public', $image, $imageName
            );
        }

        $dummyImgUrl = "/no/limits";
        $dummyUser = "Jordan Mains";

        $item = new Material();
        $item->name = $request->name;
        $item->description = $request->description;
        $item->amount = $request->amount;
        $item->unit = $request->unit;
        $item->added_by = $dummyUser;
        $item->location = $request->location;
        $item->img_url = $imageName;

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
        $imageName = '';

        if ($request->get('image')) {
            $image = $request->get('image');
            $imageName = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            $url = Storage::putFileAs(
                'public', $image, $imageName
            );
            $material->img_url = $imageName;

            // TODO: delete old image file
        }

        $dummyUser = "Jordan Mains";

        $material = Material::find($request->id);

        $original_amount = Material::find($request->id)->get('amount');
        $new_amount = $request->amount;

        $material->name = $request->name;
        $material->description = $request->description;
        $material->amount = $request->amount;
        $material->unit = $request->unit;
        $material->added_by = $request->added_by;
        $material->location = $request->location;
        if ($imageName!='') {
          $material->img_url = $imageName;
        }

        $materialhistory = new Materialhistory();
        $materialhistory->name = $request->name;
        $materialhistory->amount = $request->amount;
        $materialhistory->unit = $request->unit;
        $materialhistory->updated_by = $request->added_by;
        $materialhistory->modification = 'unchanged';

        if ($imageName!='') {
          $materialhistory->img_url = $imageName;
        } else {
          $materialhistory->img_url = $material->img_url;
        }

        // if ($original_amount>$new_amount) {
        //   $materialhistory->modification = 'decrease';
        // } else if ($new_amount<$original_amount) {
        //   $materialhistory->modification = 'increase';
        // } else {
        //   $materialhistory->modification = 'unchanged';
        // }

        try {
            $materialhistory->save();
            $material->save();
            return response()->json();

        } catch (\Exception $e) {
          return $e;
        }

        // try {
        //   $materialhistory->save();
        //   return response()->json();
        // } catch (\Exception $e) {
        //   return $e;
        // }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy(Material $material)
    {
      try {
        Material::find($material->id)->delete();
        return response()->json();
      } catch (\Exception $e) {
        return $e;
      }

    }
}
