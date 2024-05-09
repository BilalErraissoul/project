<?php

// AdminController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\User;
use App\Models\Article;
use App\Models\Event;
use App\Models\Service; // Import du modèle Service
use App\Models\Departement; // Import du modèle Departement
use App\Models\Formation; // Import the Formation model
use App\Models\Recherche; // Import the Formation model
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
 

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
    public function formations()
    {
        $formations = Formation::latest()->paginate(5);
        return view('admin.createFormation', compact('formations'));
    }
    public function recherches()
    {
        $recherches = Recherche::latest()->paginate(5);
        return view('admin.createRecherche', compact('recherches'));
    }



    
    // Method to display the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function showregisterForm()
    {
        return view('auth.register');
    }
    // Method to handle login form submission
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/admin'); // Redirect to admin dashboard
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function store(Request $request) 
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('admin.index'));
    }
    // Method to log out the user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/sliders');
    }

}
