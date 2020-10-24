<?php

namespace App\Http\Controllers\Backend;

use App\Hotel;
use App\Http\Controllers\Controller;
use App\Image;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting =Setting::find(1);
        $banners = Image::orderBy('id', 'desc')->where('type', 'websiteSlider')->get();
        return view('backend.frontend.index', compact('setting', 'banners'));
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
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {

        if ($request->input('purpose') == 'system-information'){
            $request->validate([
                'name'              => 'required|string|min:3|max:250',
                'slogan'            => 'required|string|min:3|max:250',
                'address'           => 'required|string|min:3|max:250',
                'email'             => 'required|string|min:3|max:250',
                'phone'             => 'required|string|min:3|max:250',
                'logo'              => 'nullable|max:250',
                'fav_icon'          => 'nullable|max:150',
                'contact_note'      => 'nullable|string|min:3|max:500',
                'subscribe_note'    => 'nullable|string|min:3|max:500',
                'footer_left'       => 'nullable|string|min:3|max:500',
            ]);
            $setting = Setting::find(1);
            $setting->name  =   $request->input('name');
            $setting->slogan    =   $request->input('slogan');
            $setting->address   =   $request->input('address');
            $setting->email =   $request->input('email');
            $setting->phone =   $request->input('phone');
           // $setting->logo  =   $request->input('logo');
            $setting->contact_note  =   $request->input('contact_note');
            $setting->subscribe_note    =   $request->input('subscribe_note');
            $setting->footer_left   =   $request->input('footer_left');

            if ($request->hasFile('logo')) {
                $image = $request->file('logo');
                $OriginalExtension = $image->getClientOriginalExtension();
                $image_name = 'website-logo-'.auth()->user()->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                $destinationPath = ('uploads/images');
                $resize_image = \Intervention\Image\ImageManagerStatic::make($image->getRealPath());
                $resize_image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $setting->logo = $image_name;
            }

            if ($request->hasFile('fav_icon')) {
                $image = $request->file('fav_icon');
                $OriginalExtension = $image->getClientOriginalExtension();
                $image_name = 'website-fav-'.auth()->user()->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                $destinationPath = ('uploads/images');
                $resize_image = \Intervention\Image\ImageManagerStatic::make($image->getRealPath());
                $resize_image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $setting->logo = $image_name;
            }
            try {
                $setting->save();
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


        }elseif ($request->input('purpose') == '+websiteSlider'){
            $request->validate([
                'image'         => 'required|image|max:500',
            ]);
            $imageDb = new \App\Image();
            $imageDb->user_id = auth()->user()->id;
            $imageDb->type = str_replace(str_split('/:*?"<>|+-.& '), '', $request->input('purpose'));
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $OriginalExtension = $image->getClientOriginalExtension();
                $image_name = str_replace(str_split('/:*?"<>|+-.& '), '', $request->input('purpose')).'-'.auth()->user()->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                $destinationPath = ('uploads/images');
                $resize_image = \Intervention\Image\ImageManagerStatic::make($image->getRealPath());
                $resize_image->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $resize_image->save($destinationPath . '/' . $image_name);
                $imageDb->image = $image_name;
            }
            try {
                $imageDb->save();
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
        }elseif($request->input('purpose') == '*websiteSlider'){
            $request->validate([
                'image'         => 'required|image|max:500',
                'selected_image'=> 'required'
            ]);
            $imageDb = \App\Image::find(Crypt::decryptString($request->input('selected_image')));

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $OriginalExtension = $image->getClientOriginalExtension();
                    $image_name = str_replace(str_split('/:*?"<>|+-.& '), '', $request->input('purpose')).'-'.auth()->user()->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                    $destinationPath = ('uploads/images');
                    $resize_image = \Intervention\Image\ImageManagerStatic::make($image->getRealPath());
                    $resize_image->resize(500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $resize_image->save($destinationPath . '/' . $image_name);
                    $imageDb->image = $image_name;
                }
                try {
                    $imageDb->save();
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

        }elseif($request->input('purpose') == 'delete-image'){
            $request->validate([
                'selected_image'=> 'required'
            ]);
            $imageDb = \App\Image::find(Crypt::decryptString($request->input('selected_image')));

            try {
                $imageDb->delete();
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

        }else{
            return response()->json([
                'type' => 'danger',
                'message' => 'Purpose Error !!! ',
            ]);
        }
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
