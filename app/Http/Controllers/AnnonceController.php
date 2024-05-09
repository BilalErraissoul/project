<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $annonces = Annonce::latest()->paginate(5);
        
        return view('annonces.index', compact('annonces'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('annonces.create');
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
            'date' => 'required|date',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048', // Updated to accept PDF files
            'pdf' => 'nullable|mimes:pdf|max:2048', // New validation rule for PDF files
        ]);
        
        
        
    
        $input = $request->all(); 
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $isépingler=false;
        if ($request->has('épingler')) {
            $isépingler=true;
        } else {
            $isépingler=false;
        }
      
        $input['special'] = $isépingler;
        Annonce::create($input);
       
        return redirect()->route('annonces.index')
                        ->with('success', 'Annonce created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\View\View
     */
    public function show(Annonce $annonce): View
    {
        return view('annonces.show', compact('annonce'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\View\View
     */
    public function edit(Annonce $annonce): View
    {
        return view('annonces.edit', compact('annonce'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Annonce $annonce): RedirectResponse
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
            
        $annonce->update($input);
      
        return redirect()->route('annonces.index')
                        ->with('success', 'Annonce has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Annonce  $annonce
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Annonce $annonce): RedirectResponse
    {
        $annonce->delete();
         
        return redirect()->route('admin.index')
                        ->with('success', 'Annonce has been deleted successfully.');
    }
    public function annonces(Request $request)
    {
        // Récupérer les annonces épinglées
        $annoncesEpingler = Annonce::where('special', 1)->orderBy('created_at', 'desc')->get();
        
        // Récupérer les autres annonces
        $annoncesNonEpingler = Annonce::where('special', 0)->orderBy('created_at', 'desc')->get();
        
        // Fusionner les collections
        $annonces = Annonce::where('carousel', 1)->get();
        
        // Passer la collection fusionnée à la vue
        return view('annonces.annonces', compact('annonces', 'annoncesNonEpingler', 'annoncesEpingler'));
    }
    public function updateCheckbox(Request $request)
    {
        $id = $request->id;
        $field = $request->field;

        $annonce = Annonce::find($id);
        if (!$annonce) {
            return response()->json(['error' => 'Annonce not found.']);
        }

        // Invert the value of the checkbox field
        $annonce->$field = !$annonce->$field;

        if ($annonce->save()) {
            return response()->json(['success' => 'Checkbox updated successfully.']);
        } else {
            return response()->json(['error' => 'Failed to update checkbox.']);
        }
    } 

    
}
