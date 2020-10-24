<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Location;
use App\Setting;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting =Setting::find(1);
        $locations =Location::orderBy('id', 'desc')->get();
        return view('backend.location.index', compact('setting', 'locations'));
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:locations,name|min:3|max:250'
        ]);
        $location = new Location();
        $location->name = $request->input('name');
        try {
            $location->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully added new location.',
                'return' => $location,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->validate([
           'location' => 'required|exists:locations,id' ,
           'name' => 'required|unique:locations,name,'. $request->input('location'),
        ]);
        $location = Location::find($request->input('location'));
        $location->name = $request->input('name');

        try {
            $location->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully edited location.',
                'return' => $location,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'location' => 'required|exists:locations,id' ,
        ]);
        $location = Location::find($request->input('location'));
        if ($location->hotels->count() > 0){
            return response()->json([
                'type' => 'info',
                'message' => 'Sorry, this location contain '.$location->hotels->count(). ' hotels.',
            ]);
        }else{
            try {
                $location->delete();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully deleted location.',
                    'return' => $location,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! '.$exception->getMessage(),
                ]);
            }
        }
    }
}
