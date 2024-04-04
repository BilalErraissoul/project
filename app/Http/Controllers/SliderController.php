<?php
  
namespace App\Http\Controllers;
   
use App\Models\Slider;
use App\Models\Event;  
class SliderController extends Controller
{
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $sliders = Slider::get();
        $eventsEpingler = Event::where('épingler', 1)
               ->get()
                ;
    $events = Event::where('épingler', 0)
    ->latest()
    ->paginate(5);


        return view('sliders', compact('sliders','eventsEpingler',"events"))
        ->with('i', (request()->input('page', 1) - 1) * 5); ;

    }
}
