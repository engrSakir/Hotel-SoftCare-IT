<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceCategory;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ServiceCategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $setting =Setting::find(1);
        $categories =ServiceCategory::orderBy('id', 'desc')->get();
        return view('backend.service.index', compact('setting', 'categories'));
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
            'type' => 'required',
            'name' => 'required|string|min:3|max:250',
            'icon' => 'nullable|string|min:3|max:25',
            'image' => 'nullable',
        ]);
        if ($request->input('type') == 'service'){
            $request->validate([
                'category' => 'required|exists:service_categories,id',
                'name' => 'unique:services,name',
            ]);
            $service = new Service();
            $service->category_id = $request->input('category');
            $service->name = $request->input('name');
            $service->icon = $request->input('icon');
            if($request->hasFile('image')){
                $image              = $request->file('image');
                $OriginalExtension  = $image->getClientOriginalExtension();
                $image_name         ='service-'. Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
                $destinationPath    = ('uploads/images');
                $resize_image       = Image::make($image->getRealPath());
                $resize_image->resize(500, 500, function($constraint){
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $service->image    = $image_name;
            }
            try {
                $service->save();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully added new service.',
                    'return' => $service,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! '.$exception->getMessage(),
                ]);
            }
        }else if($request->input('type') == 'category'){
            $request->validate([

                'name' => 'unique:service_categories,name',
            ]);
            $serCategory = new ServiceCategory();
            $serCategory->name = $request->input('name');
            $serCategory->icon = $request->input('icon');
            if($request->hasFile('image')){
                $image              = $request->file('image');
                $OriginalExtension  = $image->getClientOriginalExtension();
                $image_name         ='service-category-'. Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
                $destinationPath    = ('uploads/images');
                $resize_image       = Image::make($image->getRealPath());
                $resize_image->resize(500, 500, function($constraint){
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $serCategory->image    = $image_name;
            }

            try {
                $serCategory->save();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully added new service category.',
                    'return' => $serCategory,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! '.$exception->getMessage(),
                ]);
            }
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
            'selector_id' => 'required',
            'type' => 'required',
            'name' => 'required|string|min:3|max:250',
            'icon' => 'nullable|string|min:3|max:25',
            'image' => 'nullable',
        ]);
        if ($request->input('type') == 'service'){
            $request->validate([
                'selector_id' => 'exists:services,id',
                'name' => 'unique:services,name,'.$request->input('selector_id'),
            ]);
            $service = Service::find($request->input('selector_id'));
            $service->name = $request->input('name');
            $service->icon = $request->input('icon');
            if($request->hasFile('image')){
                $image              = $request->file('image');
                $OriginalExtension  = $image->getClientOriginalExtension();
                $image_name         ='service-'. Carbon::now()->format('d-m-Y H-i-s') .'.'. $OriginalExtension;
                $destinationPath    = ('uploads/images');
                $resize_image       = Image::make($image->getRealPath());
                $resize_image->resize(500, 500, function($constraint){
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $service->image    = $image_name;
            }
            try {
                $service->save();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated service.',
                    'return' => $service,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! '.$exception->getMessage(),
                ]);
            }
        }else if($request->input('type') == 'category') {
            $request->validate([
                'selector_id' => 'exists:service_categories,id',
                'name' => 'unique:service_categories,name,'.$request->input('selector_id'),
            ]);
            $serCategory = ServiceCategory::find($request->input('selector_id'));
            $serCategory->name = $request->input('name');
            $serCategory->icon = $request->input('icon');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $OriginalExtension = $image->getClientOriginalExtension();
                $image_name = 'service-category-' . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                $destinationPath = ('uploads/images');
                $resize_image = Image::make($image->getRealPath());
                $resize_image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $serCategory->image = $image_name;
            }

            try {
                $serCategory->save();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully updated service category.',
                    'return' => $serCategory,
                ]);
            } catch (\Exception $exception) {
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! ' . $exception->getMessage(),
                ]);
            }
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'selector_id' => 'required',
            'type' => 'required',
        ]);
        if ($request->input('type') == 'service'){
            $request->validate([
                'selector_id' => 'exists:services,id',
            ]);
            $service = Service::find($request->input('selector_id'));
            try {
                $service->delete();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully deleted service.',
                    'return' => $service,
                ]);
            }catch (\Exception $exception){
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! '.$exception->getMessage(),
                ]);
            }
        }else if($request->input('type') == 'category') {
            $request->validate([
                'selector_id' => 'exists:service_categories,id',
            ]);
            $serCategory = ServiceCategory::find($request->input('selector_id'));
            try {
                $serCategory->delete();
                return response()->json([
                    'type' => 'success',
                    'message' => 'Successfully deleted service category.',
                    'return' => $serCategory,
                ]);
            } catch (\Exception $exception) {
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Error !!! ' . $exception->getMessage(),
                ]);
            }
        }
    }
}
