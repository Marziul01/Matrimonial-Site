<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlansController extends Controller
{
    public static function index(){
        return view('admin.plan.plan',[
            'plans' => Plans::orderBy('created_at' , 'desc')->get(),
        ]);
    }

    public static function addCreditPlan(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'time' => 'required|integer',
            'subdesc' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|size:7',
            'title_color' => 'nullable|string|size:7',
            'text_color' => 'nullable|string|size:7',
            'times_color' => 'nullable|string|size:7',
            'button_color' => 'nullable|string|size:7',
            'button_background' => 'nullable|string|size:7',
            'services.*' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Plans::saveInfo($request);

        return back();

    }

    public static function editCreditPlan(Request $request, $id){

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'time' => 'required|integer',
            'subdesc' => 'nullable|string|max:255',
            'services.*' => 'nullable|string|max:255',
            'background_color' => 'nullable|string|size:7',
            'title_color' => 'nullable|string|size:7',
            'text_color' => 'nullable|string|size:7',
            'times_color' => 'nullable|string|size:7',
            'button_color' => 'nullable|string|size:7',
            'button_background' => 'nullable|string|size:7',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Plans::saveInfo($request, $id);

        return back();
    }

    public static function deletePlan($id){
        $plan = Plans::find($id);
        $plan->delete();
        return back()->with('success', 'Plan has been deleted.');
    }
}
