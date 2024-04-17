<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Event;
use App\Models\Article;
use App\Models\Annonce;
use App\Models\Departement;
use App\Models\Service;

class SliderController extends Controller
{
    /**
     * Display sliders with events, articles, announcements, departments, and services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get sliders
        $sliders = Slider::get();
        
        // Get events marked as pinned
        $eventsEpingler = Event::where('épingler', 1)->get();
        
        // Get non-pinned events
        $events = Event::where('épingler', 0)->latest()->paginate(5);
        
        // Get all events
        $eventsCursor = Event::all();
        
        // Get articles marked as pinned
        $articlesEpingler = Article::where('épingler', 1)->get();
        
        // Get non-pinned articles
        $articles = Article::where('épingler', 0)->latest()->paginate(5);
        
        // Get all articles
        $articlesCursor = Article::all();
        
        // Get announcements
        $annonces = Annonce::latest()->paginate(5);
        $annoncesEpingler = Annonce::where('épingler', 1)->get();

        // Get departments marked as pinned
        $departementsEpingler = Departement::where('épingler', 1)->get();
        
        // Get non-pinned departments
        $departements = Departement::where('épingler', 0)->latest()->paginate(5);
        
        // Get all departments
        $departementsCursor = Departement::all();
        
        // Get services marked as pinned
        $servicesEpingler = Service::where('épingler', 1)->get();
        
        // Get non-pinned services
        $services = Service::where('épingler', 0)->latest()->paginate(5);
        
        // Get all services
        $servicesCursor = Service::all();
        
        // Pass data to the view
        return view('sliders', compact(
            'sliders',
            'eventsEpingler',
            'events',
            'eventsCursor',
            'articlesEpingler',
            'articles',
            'articlesCursor',
            'annoncesEpingler',
            'annonces',
            'departementsEpingler',
            'departements',
            'departementsCursor',
            'servicesEpingler',
            'services',
            'servicesCursor'
        ))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
