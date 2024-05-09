<?php

namespace App\Http\Controllers;

use App\Models\Doyen;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoyenController extends Controller
{
    /**
     * Affiche une liste des ressources.
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
     * Affiche le formulaire de création d'une nouvelle ressource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('doyens.create');
    }
  
    /**
     * Stocke une nouvelle ressource dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
        }

        $isEpingler = $request->has('epingler') ? 1 : 0;
      
        $input['special'] = $isEpingler;
        Doyen::create($input);
       
        return redirect()->route('doyens.index')
                        ->with('success', 'Doyen créé avec succès.');
    }
  
    /**
     * Affiche la ressource spécifiée.
     *
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\View\View
     */
    public function show(Doyen $doyen): View
    {
        return view('doyens.show', compact('doyen'));
    }
  
    /**
     * Affiche le formulaire pour modifier la ressource spécifiée.
     *
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\View\View
     */
    public function edit(Doyen $doyen): View
    {
        return view('doyens.edit', compact('doyen'));
    }
  
    /**
     * Met à jour la ressource spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Doyen $doyen): RedirectResponse
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
            
        $doyen->update($input);
      
        return redirect()->route('doyens.index')
                        ->with('success', 'Doyen mis à jour avec succès.');
    }
  
    /**
     * Supprime la ressource spécifiée du stockage.
     *
     * @param  \App\Models\Doyen  $doyen
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doyen $doyen): RedirectResponse
    {
        $doyen->delete();
         
        return redirect()->route('doyens.index')
                        ->with('success', 'Doyen supprimé avec succès.');
    }
}
