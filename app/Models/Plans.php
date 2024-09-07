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

        $plan->name = $request->input('title');
        $plan->subtitle = $request->input('sub_title');
        $plan->badge = $request->input('badge');
        $plan->price = $request->input('price');
        $plan->duration_in_days = $request->input('time');
        $plan->subdesc = $request->input('subdesc');
        $plan->background_color = $request->input('background_color') ?? 'white';
        $plan->title_color = $request->input('title_color') ?? 'black';
        $plan->text_color = $request->input('text_color') ?? 'black';
        $plan->plantimes_color = $request->input('times_color') ?? '#b5b5b5';
        $plan->buttons_color = $request->input('button_color') ?? 'black';
        $plan->buttons_background = $request->input('button_background') ?? '#ffffff';

        if($request->input('time') == 15){
            $plan->time = '15 days';
        }elseif($request->input('time') == 30){
            $plan->time = '30 days';
        }elseif($request->input('time') == 45){
            $plan->time = '45 days';
        }elseif($request->input('time') == 60){
            $plan->time = '2 mo';
        }elseif($request->input('time') == 90){
            $plan->time = '3 mo';
        }
        elseif($request->input('time') == 180){
            $plan->time = '6 mo';
        }
        elseif($request->input('time') == 365){
            $plan->time = '1 yr';
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
