<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelAndOwner;
use App\Setting;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class HotelRegisterController extends Controller
{
    public function showPage(){
        $setting = \App\Setting::find(1);
        $locations = \App\Location::all();
        return view('auth.hotel-registration', compact('setting', 'locations'));
    }

    public function submitForm(Request $request){
        $request->validate([
            'hotel_name'        => 'required|string|min:3|max:250',
            'hotel_location'    => 'required|exists:hotels,id',
            'owner_name'        => 'required|string|min:3|max:50',
            'owner_mobile'      => 'required|unique:users,phone',
            'password'          => 'required|string|min:6|max:50|confirmed',

        ]);

        $hotel = new Hotel();
        $user = new User();

        $user->name = $request->input('owner_name');
        $user->phone = $request->input('owner_mobile');
        $user->password = Hash::make($request->input('password'));
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
            if(Auth::attempt(['phone' => $request->owner_mobile, 'password' => $request->password, 'status' => 1])) {
                Auth::user()->last_login_at = Carbon::now();
                Auth::user()->save();
                session()->flash('message', 'Login success.');
                session()->flash('type', 'success');
                return redirect(route('backend.dashboard.index'));
            }  else {
                $this->incrementLoginAttempts($request);
                return redirect()->back()->with('error', 'This account is not activated.');
            }

            //return redirect()->route('backend.dashboard.index');
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }
}
