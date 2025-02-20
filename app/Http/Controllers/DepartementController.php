<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $departements = Departement::latest()->paginate(5);
        
        return view('departements.index', compact('departements'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('departements.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
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

        $isépingler=0;
        if ($request->has('épingler')) {
            $isépingler=1;
        } else {
            $isépingler=0;
        }
      
        $input['special'] = $isépingler;
        Departement::create($input);
       
        return redirect()->route('departements.index')
                        ->with('success', 'Departement created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\View\View
     */
    public function show(Departement $departement): View
    {
        return view('departements.show', compact('departement'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\View\View
     */
    public function edit(Departement $departement): View
    {
        return view('departements.edit', compact('departement'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Departement $departement): RedirectResponse
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
            
        $departement->update($input);
      
        return redirect()->route('departements.index')
                        ->with('success', 'Departement has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Departement  $departement
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Departement $departement): RedirectResponse
    {
        $departement->delete();
         
        return redirect()->route('admin.index')
                        ->with('success', 'Departement has been deleted successfully.');
                        
    }
    public function departements(Request $request)
    {
        // Récupérer les départements épinglés
        $departementsEpingler = Departement::where('special', 1)->orderBy('created_at', 'desc')->get();
        
        // Récupérer les autres départements
        $departementsNonEpingler = Departement::where('special', 0)->orderBy('created_at', 'desc')->get();
        
        // Fusionner les collections
        $departements = Departement::where('carousel', 1)->get();
        
        // Passer la collection fusionnée à la vue
        return view('departements.departements', compact('departements', 'departementsNonEpingler', 'departementsEpingler'));
    }
    public function updateCheckbox(Request $request)
    {
        $id = $request->id;
        $field = $request->field;

        $Departement = Departement::find($id);
        if (!$Departement) {
            return response()->json(['error' => 'Departement not found.']);
        }

        // Invert the value of the checkbox field
        $Departement->$field = !$Departement->$field;

        if ($Departement->save()) {
            return response()->json(['success' => 'Checkbox updated successfully.']);
        } else {
            return response()->json(['error' => 'Failed to update checkbox.']);
        }
    } 
}
