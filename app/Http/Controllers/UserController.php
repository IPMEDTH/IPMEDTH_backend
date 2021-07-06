<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            User::all()
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
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json(
            User::with(['locations' => function($query) {
                $query->select(['id', 'name', 'image_url']);
            }])->findOrFail($user->id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->isadmin = $request->isadmin;

        try {

            $user->save();
            return response()->json();

        } catch (\Exception $e) {
          return $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHelpers()
    {
        return response()->json(
            User::with(['locations' => function($query) {
                $query->select(['id', 'name', 'image_url']);
            }])->has('locations')->get()
            // User::all()
        );
    }

    /**
     * Update the current user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCurrentUser(Request $request)
    {
        $user = $request->user();

        $imageName = '';

        if ($request->get('image_url')) {
            $image = $request->get('image_url');
            $imageName = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Storage::putFileAs(
                'public', $image, $imageName
            );
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->knowledge = $request->knowledge;
        $user->available = $request->available;
        if ($imageName!='') {
          $user->image_url = URL::to('/storage/public') . '/' . $imageName;
        }

        try {

            $user->save();
            return response()->json();

        } catch (\Exception $e) {
          return $e;
        }

    }
}
