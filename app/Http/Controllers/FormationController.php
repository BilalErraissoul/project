<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $formations = Formation::latest()->paginate(5);
        
        return view('formations.index', compact('formations'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('formations.create');
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

        $isépingler=0;
        if ($request->has('épingler')) {
            $isépingler=1;
        } else {
            $isépingler=0;
        }
      
        $input['special'] = $isépingler;
        Formation::create($input);
       
        return redirect()->route('formations.index')
                        ->with('success', 'Formation created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\View\View
     */
    public function show(Formation $formation): View
    {
        return view('formations.show', compact('formation'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\View\View
     */
    public function edit(Formation $formation): View
    {
        return view('formations.edit', compact('formation'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Formation $formation): RedirectResponse
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
            
        $formation->update($input);
      
        return redirect()->route('formations.index')
                        ->with('success', 'Formation has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formation  $formation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Formation $formation): RedirectResponse
    {
        $formation->delete();
         
        return redirect()->route('formations.index')
                        ->with('success', 'Formation has been deleted successfully.');
    }
    public function formations(Request $request)
    
{
    $formationsEpingler = Formation::where('special', 1)->orderBy('created_at', 'desc')->get();
        
        // Récupérer les autres annonces
        $formationsNonEpingler = Formation::where('special', 0)->orderBy('created_at', 'desc')->get();
        
        // Fusionner les collections
        $formations = Formation::where('carousel', 1)->get(); 
    return view('formations.formations', compact('formations','formationsEpingler','formationsNonEpingler'));
}

public function updateCheckbox(Request $request)
{
    $id = $request->id;
    $field = $request->field;

    $Formation = Formation::find($id);
    if (!$Formation) {
        return response()->json(['error' => 'Formation not found.']);
    }

    // Invert the value of the checkbox field
    $Formation->$field = !$Formation->$field;

    if ($Formation->save()) {
        return response()->json(['success' => 'Checkbox updated successfully.']);
    } else {
        return response()->json(['error' => 'Failed to update checkbox.']);
    }
} 
}
