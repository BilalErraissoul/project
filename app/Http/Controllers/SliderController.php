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
         
         
        
        // Get events marked for home page
        // $eventsHome = Event::where('home', 1)->get();
        
        $eventsHome = Event::where('home', 1)->orderBy('special', 'desc')->get();
        
        // Get all events
        $eventsCursor = Event::where('carousel', 1)->get();
         
        
        // Get non-pinned articles
        $articles = Article::where('home', 1)->get();
        
        // Get articles marked for home page
        $articlesHome = Article::where('home', 1)->orderBy('special', 'desc')->get();
        
        // Get articles marked as special
        $articlesSpecial = Article::where('special', 1)->get();
        
        // Get all articles
        $articlesCursor = Article::where('carousel', 1)->get();
         
        
        // Get announcements for home page
        $annoncesHome = Annonce::where('home', 1)->orderBy('special', 'desc')->get();
        
        // Get announcements marked as special
        $annoncesSpecial = Annonce::where('special', 1)->get();
        
        // Get all announcements
        $annoncesCursor = Annonce::where('carousel', 1)->get();
         
        
        // Get departments marked for home page
        $departementsHome = Departement::where('home', 1)->orderBy('special', 'desc')->get();
        // Get departments marked as special
        $departementsSpecial = Departement::where('special', 1)->get();
        
        // Get all departments
        $departementsCursor = Departement::where('carousel', 1)->get();
         
        
        // Get services marked for home page
        $servicesHome = Service::where('home', 1)->orderBy('special', 'desc')->get();
        
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
        
        // dd($carouselhome);
        // Pass data to the view
        return view('sliders', compact(
            'sliders',  
            'eventsHome', 
            'eventsCursor', 
            'articles',
            'articlesHome',
            'articlesSpecial',
            'articlesCursor', 
            'annoncesHome',
            'annoncesSpecial',
            'annoncesCursor', 
            'departementsHome',
            'departementsSpecial',
            'departementsCursor',  
            'servicesHome',
            'servicesSpecial',
            'servicesCursor',
            'carouselhome'
        ))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
