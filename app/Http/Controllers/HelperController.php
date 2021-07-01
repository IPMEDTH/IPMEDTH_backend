<?php

namespace App\Http\Controllers;

use App\Models\Helper;
use Illuminate\Http\Request;

class HelperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            Helper::with(['user' => function($query) {
                $query->select(['id', 'name', 'image_url', 'knowledge', 'available']);
            }])->get()
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
        //
    }

    /**
     * Display resources for specified user ID.
     *
     * @param  BigInt $userId
     * @return \Illuminate\Http\Response
     */
    public function show($userId)
    {
        return response()->json(
            Helper::where('user_id', $userId)->get()
        );
    }

    /**
     * Display resources for given location
     *
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function location($locationId)
    {
        return response()->json(
            Helper::where('location_id', $locationId)->get()
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Helper $helper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Helper  $helper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Helper $helper)
    {
        //
    }
}
