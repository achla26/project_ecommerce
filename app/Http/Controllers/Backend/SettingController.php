<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller; 

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = collect(Setting::all())->pluck('value','key')->toArray();
        return view('backend.settings.index',compact('settings'));
    }

    public function update(Request $request){
        foreach ($request->all() as $key => $value) {
            if($key == 'system_logo'){
                if ($request->hasfile('system_logo')) {
                    $value = $request->file('system_logo')->store('uploads/others', 'public');
                }
            }
            if($key == 'system_icon'){
                if ($request->hasfile('system_icon')) {
                    $value = $request->file('system_icon')->store('uploads/others', 'public');
                }
            }
            Setting::query()
                ->where('key',$key)
                ->update([                
                    'value'=>$value
                ]);  
        }    
        return redirect()->route('backend.setting.index')
                        ->with('success_msg',__('app.updated'));    
    }
}
