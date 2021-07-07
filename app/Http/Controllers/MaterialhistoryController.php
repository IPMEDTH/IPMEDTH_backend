<?php

namespace App\Http\Controllers;

use App\Models\Materialhistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialhistoryController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          return response()->json(
              Materialhistory::all()
          );
      }

      /**
       * Display results from search terms
       *
       * @param  String $searchTerms
       * @return \Illuminate\Http\Response
       */
      public function search($searchTerms){
          return Materialhistory::where('name','like','%'.$searchTerms.'%')
              ->orWhere('modification','like','%'.$searchTerms.'%')
              ->orWhere('updated_by','like','%'.$searchTerms.'%')
              ->get();
      }
}
