<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Http\Resources\AdCollection;
use App\Models\Ad;
use App\Models\User;
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
            'ads' => Ad::all()
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
     * add a new ad.
     */
    public function create(): View
    {
        return view('ad.create', []);
    }

    /**
     * create the ad.
     */
    public function post(AdRequest $request): RedirectResponse
    {
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
     * Display the ad's form.
     */
    public function edit(Ad $ad): View
    {
        return view('ad.edit', [
            'ad' => $ad
        ]);
    }

    /**
     * Update the ad's information.
     */
    public function update(Request $request): RedirectResponse
    {
        return Redirect::route('ad.edit')->with('status', 'ad-created');
    }

    /**
     * Delete the ad.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $ad = $request->ad();

        $ad->delete();

        return Redirect::to('/');
    }
}
