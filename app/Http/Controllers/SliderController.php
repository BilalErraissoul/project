<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
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
        $events = Event::latest()->paginate(5);

        return view('sliders', compact('sliders','events'))
        ->with('i', (request()->input('page', 1) - 1) * 5); ;

    }
}
