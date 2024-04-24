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
        
        // Get pinned events
        $eventsEpingler = Event::where('épingler', 1)->get();
        
        // Get non-pinned events
        $events = Event::where('épingler', 0)->latest()->paginate(5);
        
        // Get events marked for home page
        $eventsHome = Event::where('home', 1)->get();
        
        // Get events marked as special
        $eventsSpecial = Event::where('special', 1)->get();
        
        // Get all events
        $eventsCursor = Event::where('carousel', 1)->get();
        
        // Get pinned articles
        $articlesEpingler = Article::where('épingler', 1)->get();
        
        // Get non-pinned articles
        $articles = Article::where('home', 1)->get();
        
        // Get articles marked for home page
        $articlesHome = Article::where('home', 1)->get();
        
        // Get articles marked as special
        $articlesSpecial = Article::where('special', 1)->get();
        
        // Get all articles
        $articlesCursor = Article::where('carousel', 1)->get();
        
        // Get pinned announcements
        $annoncesEpingler = Annonce::where('épingler', 1)->get();
        
        // Get announcements for home page
        $annoncesHome = Annonce::where('home', 1)->get();
        
        // Get announcements marked as special
        $annoncesSpecial = Annonce::where('special', 1)->get();
        
        // Get all announcements
        $annoncesCursor = Annonce::where('carousel', 1)->get();
        
        // Get pinned departments
        $departementsEpingler = Departement::where('épingler', 1)->get();
        
        // Get non-pinned departments
        $departements = Departement::where('épingler', 0)->latest()->paginate(5);
        
        // Get departments marked for home page
        $departementsHome = Departement::where('home', 1)->get();
        
        // Get departments marked as special
        $departementsSpecial = Departement::where('special', 1)->get();
        
        // Get all departments
        $departementsCursor = Departement::where('carousel', 1)->get();
        
        // Get pinned services
        $servicesEpingler = Service::where('épingler', 1)->get();
        
        // Get non-pinned services
        $services = Service::where('épingler', 0)->latest()->paginate(5);
        
        // Get services marked for home page
        $servicesHome = Service::where('home', 1)->get();
        
        // Get services marked as special
        $servicesSpecial = Service::where('special', 1)->get();
        
        // Get all services
        $servicesCursor = Service::where('carousel', 1)->get();
        $carouselhome = array_merge(
            $eventsCursor->toArray(),
            $annoncesCursor->toArray(),
            $departementsCursor->toArray(),
            $articlesCursor->toArray(),
            $servicesCursor->toArray()
        );
        
        // Shuffle the merged array to randomize the order
        shuffle($carouselhome);
        // Pass data to the view
        return view('sliders', compact(
            'sliders',
            'eventsEpingler',
            'events',
            'eventsHome',
            'eventsSpecial',
            'eventsCursor',
            'articlesEpingler',
            'articles',
            'articlesHome',
            'articlesSpecial',
            'articlesCursor',
            'annoncesEpingler',
            'annoncesHome',
            'annoncesSpecial',
            'annoncesCursor',
            'departementsEpingler',
            'departements',
            'departementsHome',
            'departementsSpecial',
            'departementsCursor',
            'servicesEpingler',
            'services',
            'servicesHome',
            'servicesSpecial',
            'servicesCursor',
            'carouselhome'
        ))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
