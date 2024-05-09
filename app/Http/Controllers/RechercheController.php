<?php

namespace App\Http\Controllers;

use App\Models\Recherche;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $recherches = Recherche::latest()->paginate(5);

        return view('recherches.index', compact('recherches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('recherches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $isépingler = $request->has('épingler') ? 1 : 0;
        $input['special'] = $isépingler;
        Recherche::create($input);

        return redirect()->route('recherches.index')
            ->with('success', 'Recherche created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recherche  $recherche
     * @return \Illuminate\View\View
     */
    public function show(Recherche $recherche): View
    {
        return view('recherches.show', compact('recherche'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recherche  $recherche
     * @return \Illuminate\View\View
     */
    public function edit(Recherche $recherche): View
    {
        return view('recherches.edit', compact('recherche'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recherche  $recherche
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Recherche $recherche): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }

        $recherche->update($input);

        return redirect()->route('recherches.index')
            ->with('success', 'Recherche has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recherche  $recherche
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Recherche $recherche): RedirectResponse
    {
        $recherche->delete();

        return redirect()->route('recherches.index')
            ->with('success', 'Recherche has been deleted successfully.');
    }

    public function recherches(Request $request)
    {
        $recherchesEpingler = Recherche::where('special', 1)->orderBy('created_at', 'desc')->get();

        // Récupérer les autres annonces
        $recherchesNonEpingler = Recherche::where('special', 0)->orderBy('created_at', 'desc')->get();

        // Fusionner les collections
        $recherches = Recherche::where('carousel', 1)->get();
        return view('recherches.recherches', compact('recherches', 'recherchesEpingler', 'recherchesNonEpingler'));
    }

    public function updateCheckbox(Request $request)
    {
        $id = $request->id;
        $field = $request->field;

        $recherche = Recherche::find($id);
        if (!$recherche) {
            return response()->json(['error' => 'Recherche not found.']);
        }

        // Invert the value of the checkbox field
        $recherche->$field = !$recherche->$field;

        if ($recherche->save()) {
            return response()->json(['success' => 'Checkbox updated successfully.']);
        } else {
            return response()->json(['error' => 'Failed to update checkbox.']);
        }
    }
}
