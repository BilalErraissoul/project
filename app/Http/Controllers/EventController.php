<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $events = Event::latest()->paginate(5);
        
        return view('events.index', compact('events'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('events.create');
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
        Event::create($input);
       
        return redirect()->route('events.index')
                        ->with('success', 'Event created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\View\View
     */
    public function show(Event $event): View
    {
        return view('events.show', compact('event'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\View\View
     */
    public function edit(Event $event): View
    {
        return view('events.edit', compact('event'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Event $event): RedirectResponse
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
            
        $event->update($input);
      
        return redirect()->route('events.index')
                        ->with('success', 'Event has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
         
        return redirect()->route('events.index')
                        ->with('success', 'Event has been deleted successfully.');
    }
    public function events(Request $request)
    
{
    $eventsEpingler = Event::where('special', 1)->orderBy('created_at', 'desc')->get();
        
        // Récupérer les autres annonces
        $eventsNonEpingler = Event::where('special', 0)->orderBy('created_at', 'desc')->get();
        
        // Fusionner les collections
        $Events = Event::where('carousel', 1)->get(); 
    return view('events.events', compact('Events','eventsEpingler','eventsNonEpingler'));
}
    public function updateCheckbox(Request $request)
    {
        $id = $request->id;
        $field = $request->field;

        $Event = Event::find($id);
        if (!$Event) {
            return response()->json(['error' => 'Event not found.']);
        }

        // Invert the value of the checkbox field
        $Event->$field = !$Event->$field;

        if ($Event->save()) {
            return response()->json(['success' => 'Checkbox updated successfully.']);
        } else {
            return response()->json(['error' => 'Failed to update checkbox.']);
        }
    } 
}
