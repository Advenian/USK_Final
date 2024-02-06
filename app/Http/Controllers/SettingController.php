<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        // return $setting;
        // $setting = Setting::findOrFail($setting);
        return view('setting', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        // return compact('request', 'setting');

        $request->validate([
            'ceo_name' => 'nullable|string',
            'trainer_name' => 'nullable|string',
            'trainer_agency' => 'nullable|string',
            'place' => 'nullable|string',
            'date' => 'nullable|date',
            'ceo_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'trainer_signature' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // return $request;

        $setting->ceo_name = $request->input('ceo_name');
        $setting->trainer_name = $request->input('trainer_name');
        $setting->trainer_agency = $request->input('trainer_agency');
        $setting->place = $request->input('place');
        $setting->date = $request->input('date');

        if ($request->hasFile('ceo_signature')) {
            if ($setting->ceo_signature) {
                Storage::delete(public_path('images/' . $setting->ceo_signature));
            }
            $ceo_signature = $request->file('ceo_signature')->getClientOriginalName();
            $request->file('ceo_signature')->move(public_path('images'), $ceo_signature);

            $setting->ceo_signature = 'images/' . $ceo_signature;
        }

        if ($request->hasFile('trainer_signature')) {
            if ($setting->trainer_signature) {
                Storage::delete(public_path('images/' . $setting->trainer_signature));
            }
            $trainer_signature = $request->file('trainer_signature')->getClientOriginalName();
            $request->file('trainer_signature')->move(public_path('images'), $trainer_signature);
            $setting->trainer_signature = 'images/' . $trainer_signature;
        }

        $setting->save();


        return redirect()->route('setting-view', $setting->id)
            ->with('success', 'Settings updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
