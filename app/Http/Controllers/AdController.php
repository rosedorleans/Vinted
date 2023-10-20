<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Http\Resources\AdCollection;
use App\Models\Ad;
use App\Models\User;
use App\Models\Category;
use App\Models\City;
use App\Models\Condition;
use App\Models\Delivery;
use App\Models\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdController extends Controller
{
    /**
     * Show all ads.
     */
    public function index(): View
    {
        return view('ad.index', [
            'ads' => Ad::all(),
        ]);
    }

    /**
     * Show the ad.
     */
    public function show(string $id): View
    {
        return view('ad.show', [
            'ad' => Ad::findOrFail($id)
        ]);
    }

    /**
     * Display the ad's create form.
     */
    public function create(): View
    {
        return view('ad.create', [
            'categories' => Category::all(),
            'cities' => City::all(),
            'conditions' => Condition::all(),
            'deliveries' => Delivery::all(),
        ]);
    }

    /**
     * create the ad.
     */
    public function post(AdRequest $request): RedirectResponse
    {
        $now = date('Y-m-d H:i:s');
        $request['published_at'] = $now;
        $request['expired_at'] = date('Y-m-d H:i:s', strtotime($now. ' + 14 days'));

        $req = $request->all();

        $fileModel = new File;
        if($request->file()) {
            $validation = $request->validate([
                'file'  =>  'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
        
            $file = $validation['file'];
            $fileName = 'ad-'.time().'.'.$file->getClientOriginalExtension();

            $storage = Storage::disk('public')->put($fileName, $file);

            $req["file"] = Storage::url($storage);
        }

        Ad::create($req);

        return Redirect::route('dashboard')->with('status', 'ad-created');
    }

    /**
     * Display the ad's update form.
     */
    public function edit(Ad $ad): View
    {
        return view('ad.edit', [
            'ad' => $ad,
            'categories' => Category::all(),
            'cities' => City::all(),
            'conditions' => Condition::all(),
            'deliveries' => Delivery::all(),
        ]);
    }

    /**
     * Update the ad's information.
     */
    public function update($id, AdRequest $request): RedirectResponse
    {
        $ad = Ad::find($id);
        $ad->update($request->all());

        return Redirect::route('dashboard')->with('status', 'ad-edited');
    }

    /**
     * Delete the ad.
     */
    public function destroy($id, Request $request): RedirectResponse
    {
        $ad = Ad::find($id);
        $ad->delete();

        return Redirect::route('dashboard')->with('status', 'ad-destroyed');
    }
}
