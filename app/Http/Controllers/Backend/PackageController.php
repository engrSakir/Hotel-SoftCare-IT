<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
           'hotel'          => 'required|exists:hotels,id',
           'service'        => 'required|exists:services,id',
           'name'           => 'required|min:3|max:250',
           'price'          => 'required|min:0',
           'description'    => 'required|min:3|max:5000',
           'image'          => 'nullable|image|max:5000',

        ]);
        $package = new Package();
        $package->hotel_id = $request->input('hotel');
        $package->service_id = $request->input('service');
        $package->name = $request->input('name');
        $package->description = $request->input('description');
        $package->price = $request->input('price');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $OriginalExtension = $image->getClientOriginalExtension();
            $image_name = 'blog-image-'. Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
            $destinationPath = ('uploads/images');
            $resize_image = Image::make($image->getRealPath());
            $resize_image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            $resize_image->save($destinationPath . '/' . $image_name);
            $package->image = $image_name;
        }
        try {
            $package->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully done',
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
