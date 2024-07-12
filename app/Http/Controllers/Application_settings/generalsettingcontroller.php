<?php

namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Models\generalsetting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class generalsettingcontroller extends Controller
{
    public function index()
    {
        $settings = generalsetting::first();
        return view('settings.generalsetting', compact('settings'));
    }

    public function create()
    {
        return view('general_settings.create');
    }

    public function store(Request $request)
    {
        try {
            // Find the existing general setting by its ID
            $generalsetting = generalsetting::findOrFail(1);
            // Update the fields with the new data
            $generalsetting->objectives = ['en' => $request->objectives_en, 'ar' => $request->objectives_ar];
            $generalsetting->mission = ['en' => $request->mission_en, 'ar' => $request->mission_ar];
            $generalsetting->vision = ['en' => $request->vision_en, 'ar' => $request->vision_ar];
            $generalsetting->address = ['en' => $request->address_en, 'ar' => $request->address_ar];
            $generalsetting->about = ['en' => $request->about_en, 'ar' => $request->about_ar];
            $generalsetting->phone = $request->phone;
            $generalsetting->email = $request->email;
            $generalsetting->facebook = $request->facebook;
            $generalsetting->twitter = $request->twitter;
            $generalsetting->instagram = $request->instagram;
            $generalsetting->snapchat = $request->snapchat;
            $generalsetting->linkedIn = $request->linkedIn;
            $generalsetting->whatsApp = $request->whatsApp;
            $generalsetting->tiktok = $request->tiktok;
            $generalsetting->youtube = $request->youtube;
            $generalsetting->user_add = Auth::user()->id;
            // Save the updated general setting
            $generalsetting->save();
            // Flash a success message and redirect to the index page
            session()->flash('add');
            return redirect()->route('generalsettings.index');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(generalsetting $generalSetting)
    {
        return view('general_settings.edit', compact('generalSetting'));
    }

    public function update(Request $request)
    {
        try {
            // Find the existing general setting by its ID
            $generalsetting = generalsetting::findOrFail(1);

            // Update the fields with the new data
            $generalsetting->objectives = ['en' => $request->objectives_en, 'ar' => $request->objectives_ar];
            $generalsetting->mission = ['en' => $request->mission_en, 'ar' => $request->mission_ar];
            $generalsetting->vision = ['en' => $request->vision_en, 'ar' => $request->vision_ar];
            $generalsetting->address = ['en' => $request->address_en, 'ar' => $request->address_ar];
            $generalsetting->phone = $request->phone;
            $generalsetting->email = $request->email;
            $generalsetting->facebook = $request->facebook;
            $generalsetting->twitter = $request->twitter;
            $generalsetting->instagram = $request->instagram;
            $generalsetting->snapchat = $request->snapchat;
            $generalsetting->linkedIn = $request->linkedIn;
            $generalsetting->whatsApp = $request->whatsApp;
            $generalsetting->tiktok = $request->tiktok;
            $generalsetting->youtube = $request->youtube;
            $generalsetting->user_add = Auth::user()->id;
            // Save the updated general setting
            $generalsetting->save();
            // Flash a success message and redirect to the index page
            session()->flash('update');
            return redirect()->route('generalsettings.index');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(generalsetting $generalSetting)
    {
        $generalSetting->delete();

        return redirect()->route('general_settings.index')->with('success', 'General Setting deleted successfully.');
    }
}