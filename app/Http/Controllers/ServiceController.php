<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $services = Service::latest()->paginate(5);
        
        return view('services.index', compact('services'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('services.create');
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
        Service::create($input);
       
        return redirect()->route('services.index')
                        ->with('success', 'Service created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function show(Service $service): View
    {
        return view('services.show', compact('service'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\View\View
     */
    public function edit(Service $service): View
    {
        return view('services.edit', compact('service'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Service $service): RedirectResponse
    {
        $request->validate([
            'name_service' => 'required',
            'description_service' => 'required',
            'date_service' => 'required|date',
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
            
        $service->update($input);
      
        return redirect()->route('services.index')
                        ->with('success', 'Service has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();
         
        return redirect()->route('services.index')
                        ->with('success', 'Service has been deleted successfully.');
    }
    public function services(Request $request)
    
{
    $servicesEpingler = Service::where('special', 1)->orderBy('created_at', 'desc')->get();
        
        // Récupérer les autres annonces
        $servicesNonEpingler = Service::where('special', 0)->orderBy('created_at', 'desc')->get();
        
        // Fusionner les collections
        $services = Service::where('carousel', 1)->get(); 
    return view('services.services', compact('services','servicesEpingler','servicesNonEpingler'));
}

public function updateCheckbox(Request $request)
{
    $id = $request->id;
    $field = $request->field;

    $Service = Service::find($id);
    if (!$Service) {
        return response()->json(['error' => 'Service not found.']);
    }

    // Invert the value of the checkbox field
    $Service->$field = !$Service->$field;

    if ($Service->save()) {
        return response()->json(['success' => 'Checkbox updated successfully.']);
    } else {
        return response()->json(['error' => 'Failed to update checkbox.']);
    }
} 
}
