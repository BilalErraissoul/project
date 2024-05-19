<?php

namespace App\Http\Controllers;

use App\Models\Doyen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $doyens = Doyen::latest()->paginate(5);
        
        return view('doyens.index', compact('doyens'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('doyens.create');
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
            'title' => 'required',
            'message' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all(); 
    
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        $input['special'] = $request->has('special') ? 1 : 0;
        Doyen::create($input);
       
        return redirect()->route('doyens.index')
                        ->with('success', 'Doyen created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\View\View
     */
    public function show(Doyen $doyen): View
    {
        return view('doyens.show', compact('doyen'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\View\View
     */
    public function edit(Doyen $doyen): View
    {
        return view('doyens.edit', compact('doyen'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Doyen $doyen): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'message' => 'required',
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
            
        $doyen->update($input);
      
        return redirect()->route('doyens.index')
                        ->with('success', 'Doyen has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doyen $doyen): RedirectResponse
    {
        $doyen->delete();
         
        return redirect()->route('doyens.index')
                        ->with('success', 'Doyen has been deleted successfully.');
    }

    /**
     * Display a listing of the resource with special field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function doyens(Request $request): View
    {
        // Get pinned doyens
        $doyensEpingler = Doyen::where('special', 1)->orderBy('created_at', 'desc')->get();
        
        // Get non-pinned doyens
        $doyensNonEpingler = Doyen::where('special', 0)->orderBy('created_at', 'desc')->get();
        
        // Merge the collections
        $doyens = Doyen::where('special', 1)->get();
        
        // Pass the merged collection to the view
        return view('doyens.doyens', compact('doyens', 'doyensNonEpingler', 'doyensEpingler'));
    }

    /**
     * Update the specified checkbox field of the resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCheckbox(Request $request)
    {
        $id = $request->id;
        $field = $request->field;

        $doyen = Doyen::find($id);
        if (!$doyen) {
            return response()->json(['error' => 'Doyen not found.']);
        }

        // Invert the value of the checkbox field
        $doyen->$field = !$doyen->$field;

        if ($doyen->save()) {
            return response()->json(['success' => 'Checkbox updated successfully.']);
        } else {
            return response()->json(['error' => 'Failed to update checkbox.']);
        }
    }
}
