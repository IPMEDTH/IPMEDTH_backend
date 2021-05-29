<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;

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

  public function store(Request $request){

    $dummyImgUrl = "/no/limits";
    $dummyUser = "Jordain Mains";

    $item = new Material();
    $item->name = $request->name;
    $item->description = $request->description;
    $item->amount = $request->amount;
    $item->unit = $request->unit;
    $item->added_by = $dummyUser;
    $item->img_url = $dummyImgUrl;

    try {
      $item->save();
      return true;
    } catch (\Exception $e) {
      return $e;
    }
  }

  public function getData($term){

    return Material::where('name','like','%'.$term.'%')
    ->orWhere('description','like','%'.$term.'%')
    ->orWhere('added_by','like','%'.$term.'%')
    ->get();
  }

  public function show(){
      return Material::all();
  }
}
