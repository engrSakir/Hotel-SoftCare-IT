<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('backend.setting.index', compact('setting'));
    }

    public function advanceOwnership(){
        $setting = Setting::find(1);
        if ($setting->advance_ownership == 1){
            $setting->advance_ownership = 0;
        }else{
            $setting->advance_ownership = 1;
        }
        try {
            $setting->save();
            return response()->json([
                'type' => 'success',
                'message' => 'Successfully changed advance ownership.',
                'return' => $setting,
            ]);
        }catch (\Exception $exception){
            return response()->json([
                'type' => 'danger',
                'message' => 'Error !!! '.$exception->getMessage(),
            ]);
        }
    }
}
