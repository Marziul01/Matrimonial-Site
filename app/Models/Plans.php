<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    public static function saveInfo($request, $id = null){

        $services = implode(',', $request->input('services'));

        if($id == null){
           $plan = new Plans();
           $action = 'created';
        }else{
            $plan = Plans::find($id);
            $action = 'updated';
        }
        $plan->plan_type = $request->input('plan_type');
        $plan->name = $request->input('title');
        $plan->subtitle = $request->input('sub_title');
        $plan->badge = $request->input('badge');
        $plan->price = $request->input('price');
        $plan->duration_in_days = $request->input('time');

        if($request->input('time') == 30){
            $plan->time = '1 Month';
        }elseif($request->input('time') == 90){
            $plan->time = '3 Month';
        }elseif($request->input('time') == 180){
            $plan->time = '6 Month';
        }elseif($request->input('time') == 365){
            $plan->time = '1 Year';
        }elseif($request->input('time') == 730){
            $plan->time = '2 Year';
        }
        elseif($request->input('time') == 1095){
            $plan->time = '3 Year';
        }
        elseif($request->input('time') == 1825){
            $plan->time = '5 Year';
        }


        if($request->status != null){
            $plan->status = $request->status;
        }

        $plan->services = $services;

        $plan->save();

        $successMessage = " Plan has been " . $action . " successfully";
        $request->session()->flash('success', $successMessage);
    }
}
