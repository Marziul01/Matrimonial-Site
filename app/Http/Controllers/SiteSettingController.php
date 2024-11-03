<?php

namespace App\Http\Controllers;

use App\Models\AboutSetting;
use App\Models\FaqSetting;
use App\Models\HomePage;
use App\Models\HomeSettings;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiteSettingController extends Controller
{
    public static function siteSetting(){
        return view('admin.sitesettings.headersettings',[
            'siteSettings' => SiteSetting::find(1),
        ]);
    }

    public function siteSettingUpdate(Request $request)
    {
        $siteSettings = SiteSetting::find($request->id);

        // Update required fields
        $siteSettings->title = $request->title;

        // Handle logo upload and path saving
        if ($request->hasFile('logo')) {
            // Delete old logo if it exists
            if ($siteSettings->logo && file_exists(public_path($siteSettings->logo))) {
                unlink(public_path($siteSettings->logo));
            }
            // Store new logo and save the path
            $logoPath = $request->file('logo')->move('admin-assets/img/', 'logo'. rand() . '.' . $request->file('logo')->extension());
            $siteSettings->logo = $logoPath;
        }

        // Handle favicon upload and path saving
        if ($request->hasFile('favicon')) {
            // Delete old favicon if it exists
            if ($siteSettings->favicon && file_exists(public_path($siteSettings->favicon))) {
                unlink(public_path($siteSettings->favicon));
            }
            // Store new favicon and save the path
            $faviconPath = $request->file('favicon')->move('admin-assets/img/', 'favicon'.rand() . '.' . $request->file('favicon')->extension());
            $siteSettings->favicon = $faviconPath;
        }

        // Save the updated settings to the database
        $siteSettings->save();

        // Return success message
        return back()->with('success', 'Site settings have been updated successfully!');
    }

    public static function siteSettingUpdatetwo(Request $request){
        $siteSettings = SiteSetting::find($request->id);
        // Update other nullable fields
        $siteSettings->phone = $request->phone;
        $siteSettings->address = $request->address;
        $siteSettings->email = $request->email;
        $siteSettings->facebook = $request->facebook;
        $siteSettings->instagram = $request->instagram;
        $siteSettings->youtube = $request->youtube;
        $siteSettings->twitter = $request->twitter;
        $siteSettings->app_store = $request->app_store;
        $siteSettings->play_store = $request->play_store;
         // Save the updated settings to the database
         $siteSettings->save();

         // Return success message
         return back()->with('success', 'Site settings have been updated successfully!');
    }

    public static function testimonials(){
        return view('admin.sitesettings.testimonials',[
            'testimonials' => HomeSettings::all(),
        ]);
    }

    public static function about(){
        return view('admin.sitesettings.about',[
            'about' => AboutSetting::find(1),
        ]);
    }

    public static function faq(){
        return view('admin.sitesettings.faq',[
            'faqs' => FaqSetting::all(),
        ]);
    }

    public static function admintestimonialStore(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'desc' => 'required',
            'image' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $home = new HomeSettings();
        $home->name = $request->name;
        $home->address = $request->address;
        $home->desc = $request->desc;

        if ($request->hasFile('image')) {
            if ($home->image && file_exists(public_path($home->image))) {
                unlink(public_path($home->image));
            }

            $image = $request->file('image');
            $imageName = 'testimonial'.time() . '_' . $image->getClientOriginalName();
            $imagePath = 'admin-assets/images/' . $imageName;

            $image->move(public_path('admin-assets/images'), $imageName);

            $home->image = $imagePath;
        }

        $home->save();
        return back()->with('success', ' Testimonial created Successfully');
    }

    public static function admintestimonialupdate(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'address' => 'required',
            'desc' => 'required',
            'image' => 'nullable',
        ]);
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $home = HomeSettings::find($id);
        $home->name = $request->name;
        $home->address = $request->address;
        $home->desc = $request->desc;

        if ($request->hasFile('image')) {
            if ($home->image && file_exists(public_path($home->image))) {
                unlink(public_path($home->image));
            }

            $image = $request->file('image');
            $imageName = 'testimonial'.time() . '_' . $image->getClientOriginalName();
            $imagePath = 'admin-assets/images/' . $imageName;

            $image->move(public_path('admin-assets/images'), $imageName);

            $home->image = $imagePath;
        }

        $home->save();
        return back()->with('success', ' Testimonial created Successfully');
    }

    public static function admintestimonialDestroy(Request $request, $id) {
        $home = HomeSettings::find($id);

        if (!$home) {
            return back()->with('error', 'Testimonial not found.');
        }
    
        // Delete the image file if it exists
        if ($home->image && file_exists(public_path($home->image))) {
            unlink(public_path($home->image));
        }
    
        // Delete the testimonial record
        $home->delete();
    
        return back()->with('success', 'Testimonial deleted successfully.');
    }

    public static function aboutSettingUpdate(Request $request, $id) {
        $home = AboutSetting::find($id);
        $home->desc = $request->desc;
        $home->desc2 = $request->desc2;
        
        $home->save();
        return back()->with('success', 'About Page Settings Updated Successfully');
    }


    public static function adminfaqStore(Request $request) {

        $validator = Validator::make($request->all(), [
            'icon' => 'required',
            'ques' => 'required',
            'ans' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $home = new FaqSetting();
        $home->icon = $request->icon;
        $home->ques = $request->ques;
        $home->ans = $request->ans;

        $home->save();
        return back()->with('success', ' Faq created Successfully');
    }

    public static function adminfaqupdate(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'icon' => 'required',
            'ques' => 'required',
            'ans' => 'required',
        ]);
        
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $home = FaqSetting::find($id);
        $home->icon = $request->icon;
        $home->ques = $request->ques;
        $home->ans = $request->ans;

        $home->save();
        return back()->with('success', ' Faq created Successfully');
    }

    public static function adminfaqDestroy(Request $request, $id) {
        $home = FaqSetting::find($id);

        if (!$home) {
            return back()->with('error', 'Faq not found.');
        }

        $home->delete();
    
        return back()->with('success', 'Faq deleted successfully.');
    }


}
