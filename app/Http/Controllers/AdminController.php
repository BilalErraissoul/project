<?php

// AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Article;
use App\Models\Event;
use App\Models\Service; // Import du modèle Service
use App\Models\Departement; // Import du modèle Departement

class AdminController extends Controller
{
    public function index()
    {
        $annonces = Annonce::latest()->paginate(5);
        return view('admin.admin', compact('annonces'));
    }
    
    public function articles()
    {
        $articles = Article::latest()->paginate(5);
        return view('admin.createArticle', compact('articles'));
    }
    
    public function events()
    {
        $events = Event::latest()->paginate(5);
        return view('admin.createEvent', compact('events'));
    }

    public function services()
    {
        $services = Service::latest()->paginate(5);
        return view('admin.createService', compact('services'));
    }

    public function departements()
    {
        $departements = Departement::latest()->paginate(5);
        return view('admin.createDepartement', compact('departements'));
    }
}
