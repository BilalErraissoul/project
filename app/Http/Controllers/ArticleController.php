<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $articles = Article::latest()->paginate(5);
        
        
        return view('articles.index', compact('articles'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('articles.create');
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
            'description_article' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_article' => 'required|date',
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
      
        $input['épingler'] = $isépingler;
        Article::create($input);
       
        return redirect()->route('articles.index')
                        ->with('success', 'Article created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function show(Article $article): View
    {
        return view('articles.show', compact('article'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\View\View
     */
    public function edit(Article $article): View
    {
        return view('articles.edit', compact('article'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Article $article): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'description_article' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_article' => 'required|date',
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
            
        $article->update($input);
      
        return redirect()->route('articles.index')
                        ->with('success', 'Article has been updated successfully.');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();
         
        return redirect()->route('articles.index')
                        ->with('success', 'Article has been deleted successfully.');
    }

public function articles(Request $request)
{
    // Get pinned articles
    $articlesEpingler = Article::where('épingler', 1)->orderBy('created_at', 'desc')->get();
    
    // Get non-pinned articles
    $articlesNonEpingler = Article::where('épingler', 0)->orderBy('created_at', 'desc')->get();
    
    // Merge the collections
    $articles = $articlesEpingler->merge($articlesNonEpingler);
    
    // Pass the merged collection to the view
    return view('articles.articles', compact('articles', 'articlesNonEpingler', 'articlesEpingler'));
}

}
