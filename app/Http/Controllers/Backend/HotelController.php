<?php

namespace App\Http\Controllers\Backend;

use App\Hotel;
use App\HotelAndOwner;
use App\Http\Controllers\Controller;
use App\Location;
use App\ServiceCategory;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Spatie\Permission\Models\Role;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting =Setting::find(1);
        $hotels =Hotel::orderBy('id', 'desc')->get();

        return view('backend.hotel.index', compact('setting', 'hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting =Setting::find(1);
        $locations = Location::all();
        return view('backend.hotel.create', compact('setting', 'locations'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $setting =Setting::find(1);
        $hotel = new Hotel();
        $user = new User();
        if ($setting->advance_ownership == 0){
            //Advance ownership 0
            $request->validate([
                'hotel_name'        => 'required|string|min:3|max:250',
                'hotel_location'    => 'required|exists:hotels,id',
                'owner_name'        => 'required|string|min:3|max:50',
                'owner_mobile'      => 'required|unique:users,phone',
                'owner_password'    => 'required|string|min:6|max:50',
            ]);
            //must need owner information
            $user->name = $request->input('owner_name');
            $user->phone = $request->input('owner_mobile');
            $user->password = Hash::make($request->input('owner_password'));
        }else{
            //Advance ownership 1
            if ($request->owner_mobile || $request->owner_name){
                $request->validate([
                    'hotel_name'        => 'required|string|min:3|max:250',
                    'hotel_location'    => 'required|exists:hotels,id',
                    'owner_name'        => 'required|string|min:3|max:50',
                    'owner_mobile'      => 'required|unique:users,phone',
                    'owner_password'    => 'required|string|min:6|max:50',
                ]);
                //owner store if insert owner information
                $user->name = $request->input('owner_name');
                $user->phone = $request->input('owner_mobile');
                $user->password = Hash::make($request->input('owner_password'));
            }else{
                $request->validate([
                    'hotel_name'        => 'required|string|min:3|max:250',
                    'hotel_location'    => 'required|exists:hotels,id',
                ]);
            }
        }
        //must need hotel information for booth
        $hotel->name = $request->input('hotel_name');
        $hotel->location_id = $request->input('hotel_location');
        try {
            $hotel->save();
            if ($request->owner_mobile && $request->owner_name){
                $user->save();
                $user->assignRole(Role::find(3));
                //Bridge of hotel and owner
                $hotelAndOwner =new HotelAndOwner();
                $hotelAndOwner->hotel_id = $hotel->id;
                $hotelAndOwner->owner_id = $user->id;
                $hotelAndOwner->save();
            }

            return response()->json([
                'type' => 'success',
                'message' => 'Successfully added new hotel',
                'url' => url(route('backend.hotel.show',Crypt::encryptString($hotel->id))),
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }


    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show($id)
    {
        if (auth()->user()->can('view-hotel') || auth()->user()->myHotels->where('hotel_id', Crypt::decryptString($id))->count() > 0){
            $setting =Setting::find(1);
            $hotel = Hotel::find(Crypt::decryptString($id));
            $serviceCategories = ServiceCategory::all();
            $locations = Location::all();
            return view('backend.hotel.show', compact('setting', 'hotel', 'serviceCategories', 'locations'));
        }else{
            return redirect()->back();
        }

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $setting =Setting::find(1);
        $locations = Location::all();
        $hotel = Hotel::find(Crypt::decryptString($id));
        return view('backend.hotel.edit', compact('setting', 'locations', 'hotel'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        if (auth()->user()->can('view-hotel') || auth()->user()->myHotels->where('hotel_id', $request->input('hotel'))->count() > 0){
            if ($request->input('purpose') == 'approval' && auth()->user()->can('approval-hotel')){
                $request->validate([
                    'hotel'     => 'required|exists:hotels,id'
                ]);
                $hotel = Hotel::find($request->input('hotel'));
                if ($hotel->status == 1){
                    $hotel->status = 0;
                }else{
                    $hotel->status = 1;
                }
                try {
                    $hotel->save();
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
            }elseif ($request->input('purpose') == 'hotel-information'){
                $request->validate([
                    'name'      =>  'required|min:3|max:250|string',
                    'logo'      =>  'nullable|max:500',
                    'location'  =>  'required|exists:locations,id',
                    'address'   =>  'required|min:3|max:250|string',
                    'phone'     =>  'required|min:3|max:15|string',
                    'facebook'  =>  'nullable|min:3|max:250|string',
                    'instagram' =>  'nullable|min:3|max:250|string',
                    'twitter'   =>  'nullable|min:3|max:250|string',
                    'google'    =>  'nullable|min:3|max:250|string',
                    'youtube'   =>  'nullable|min:3|max:250|string',
                    'linkedin'  =>  'nullable|min:3|max:250|string',
                    'whatsapp'  =>  'nullable|min:3|max:250|string',
                    'website'   =>  'nullable|min:3|max:250|string',
                    'manager'       =>  'nullable|min:3|max:5000',
                    'description'   =>  'nullable|min:3|max:5000',
                    'hotel'         =>  'required|exists:hotels,id'
                ]);
                $hotel = Hotel::find($request->input('hotel'));
                $hotel->name        =   $request->input('name');
                //$hotel->logo        =   $request->input('logo');
                $hotel->location_id    =   $request->input('location');
                $hotel->address     =   $request->input('address');
                $hotel->phone       =   $request->input('phone');
                $hotel->facebook    =   $request->input('facebook');
                $hotel->instagram   =   $request->input('instagram');
                $hotel->twitter     =   $request->input('twitter');
                $hotel->google      =   $request->input('google');
                $hotel->youtube     =   $request->input('youtube');
                $hotel->linkedin    =   $request->input('linkedin');
                $hotel->whatsapp    =   $request->input('whatsapp');
                $hotel->website     =   $request->input('website');
                $hotel->manager     =   $request->input('manager');
                $hotel->description =   $request->input('description');

                if ($request->hasFile('logo')) {
                    $image = $request->file('logo');
                    $OriginalExtension = $image->getClientOriginalExtension();
                    $image_name = 'hotel-logo-'.$hotel->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                    $destinationPath = ('uploads/images');
                    $resize_image = Image::make($image->getRealPath());
                    $resize_image->resize(500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $resize_image->save($destinationPath . '/' . $image_name);
                    $hotel->logo = $image_name;
                }
                try {
                    $hotel->save();
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

            }elseif ($request->input('purpose') == 'license'){
                $request->validate([
                    'image'     => 'required|image|max:500',
                    'hotel'     => 'required|exists:hotels,id'
                ]);
                $hotel = Hotel::find($request->input('hotel'));

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $OriginalExtension = $image->getClientOriginalExtension();
                    $image_name = 'trade-license-'.$hotel->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                    $destinationPath = ('uploads/images');
                    $resize_image = Image::make($image->getRealPath());
                    $resize_image->resize(500, 500, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $resize_image->save($destinationPath . '/' . $image_name);
                    $hotel->trade_license = $image_name;
                }
                try {
                    $hotel->save();
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
            }elseif ($request->input('purpose') == '+banner' || $request->input('purpose') == '+reception' || $request->input('purpose') == '+pool' || $request->input('purpose') == '+highlight'){
                $request->validate([
                    'image'         => 'required|image|max:500',
                    'hotel'         => 'required|exists:hotels,id'
                ]);
                $hotel = Hotel::find($request->input('hotel'));
                $imageDb = new \App\Image();
                $imageDb->user_id = auth()->user()->id;
                $imageDb->hotel_id = $hotel->id;
                $imageDb->type = str_replace(str_split('/:*?"<>|+-.& '), '', $request->input('purpose'));
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $OriginalExtension = $image->getClientOriginalExtension();
                    $image_name = str_replace(str_split('/:*?"<>|+-.& '), '', $request->input('purpose')).'-'.$hotel->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                    $destinationPath = ('uploads/images');
                    $resize_image = Image::make($image->getRealPath());
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
            }elseif($request->input('purpose') == '*banner' || $request->input('purpose') == '*reception' || $request->input('purpose') == '*pool' || $request->input('purpose') == '*highlight'){
                $request->validate([
                    'image'         => 'required|image|max:500',
                    'hotel'         => 'required|exists:hotels,id',
                    'selected_image'=> 'required'
                ]);
                $hotel = Hotel::find($request->input('hotel'));
                $imageDb = \App\Image::find(Crypt::decryptString($request->input('selected_image')));
                if ($imageDb->hotel_id == $hotel->id){
                    if ($request->hasFile('image')) {
                        $image = $request->file('image');
                        $OriginalExtension = $image->getClientOriginalExtension();
                        $image_name = str_replace(str_split('/:*?"<>|+-.& '), '', $request->input('purpose')).$hotel->name . Carbon::now()->format('d-m-Y H-i-s') . '.' . $OriginalExtension;
                        $destinationPath = ('uploads/images');
                        $resize_image = Image::make($image->getRealPath());
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
                }else{
                    return response()->json([
                        'type' => 'danger',
                        'message' => 'Error !!! ',
                    ]);
                }
            }elseif($request->input('purpose') == 'delete-image'){
                $request->validate([
                    'hotel'         => 'required|exists:hotels,id',
                    'selected_image'=> 'required'
                ]);
                $hotel = Hotel::find($request->input('hotel'));
                $imageDb = \App\Image::find(Crypt::decryptString($request->input('selected_image')));
                if ($imageDb->hotel_id == $hotel->id){
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
                        'message' => 'Error !!! ',
                    ]);
                }
            }else{
                return response()->json([
                    'type' => 'danger',
                    'message' => 'Purpose Error !!! ',
                ]);
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'hotel' => 'required|exists:hotels,id' ,
        ]);
        $hotel = Hotel::find($request->input('hotel'));
        try {
            $hotel->delete();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully deleted this hotel.',
                'hotel' => $hotel,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }
}
