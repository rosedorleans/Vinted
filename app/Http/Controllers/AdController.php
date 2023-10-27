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
        // on définit la date de publication (aujourd'hui)
        // on définit la date d'expiration (dans 2 semaines)

        $now = date('Y-m-d H:i:s');
        $request['published_at'] = $now;
        $request['expired_at'] = date('Y-m-d H:i:s', strtotime($now. ' + 14 days'));

        $req = $request->all();

        // on vérifie s'il y a une image dans la requete de création de post
        // on vérifie si l'image est de type valide
        // on lui donne un nom et on l'enregistre dans le dossier "storage" dans public (modifié dans config/filesystems.php)
        // on enregistre son chemin dans l'objet post

        if($request->file()) {
            $validation = $request->validate([
                'photos'  =>  'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $photos = $validation['photos'];

            $photosName = 'ad-'.time().'.'.$photos->getClientOriginalExtension();

            $storage = Storage::disk('public_uploads')->put($photosName, $photos);

            $req["photos"] = Storage::url($storage);
        }

        Ad::create($req);

        return Redirect::route('dashboard')->with('status', 'ad-created');
    }

    /**
     * Display the ad's update form.
     */
    public function edit(Ad $ad): View
    {
        // afficher la page d'update

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
        // lors de l'update je remplace l'image comme pour la création

        $ad = Ad::find($id);
        $req = $request->all();

        if($request->file()) {
            $validation = $request->validate([
                'photos'  =>  'required|file|image|mimes:jpeg,png,jpg|max:2048'
            ]);
            $photos = $validation['photos'];

            $photosName = 'ad-'.time().'.'.$photos->getClientOriginalExtension();

            $storage = Storage::disk('public_uploads')->put($photosName, $photos);

            $req["photos"] = Storage::url($storage);
        }

        $ad->update($req);

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
