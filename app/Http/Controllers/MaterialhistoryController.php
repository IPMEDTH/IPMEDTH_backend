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
}
