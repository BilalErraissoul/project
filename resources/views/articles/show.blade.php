@extends('articles.layout')
@include('header')

@section('content')
<div class="container-fluid bg-gradient">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <img src="{{ asset('images/COVER.png') }}" alt="University Logo" class="img-fluid img-thumbnail" style="width: 100%; height: 270px; object-fit: cover;">
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="quick-access p-4 rounded" style="background-color: #f8f9fa; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
                <h2 class="mb-4" style="font-size: 20px; color: #003366;">ACCES RAPIDES</h2>
                <div class="list-group">
                    <a href="{{ route('sliders') }}" class="list-group-item list-group-item-action bg-light text-dark rounded-pill mb-2">Événements</a>
                    <a href="{{ route('articles') }}" class="list-group-item list-group-item-action bg-light text-dark rounded-pill mb-2">Articles</a>
                    <a href="{{ route('annonces') }}" class="list-group-item list-group-item-action bg-light text-dark rounded-pill mb-2">Annonces</a>
                    <a href="{{ route('departements') }}" class="list-group-item list-group-item-action bg-light text-dark rounded-pill mb-2">Départements</a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-primary text-white py-3">
                    <h2 class="card-title mb-0" style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;">{{ $article->name }}</h2>
                    <p class="card-subtitle text-muted" style="font-family: 'Arial', sans-serif; font-size: 16px;">{{ $article->date_article }}</p>
                </div>
                <div class="card-body">
                    <p class="card-text text-justify" style="font-family: 'Arial', sans-serif; font-size: 18px;">{!! $article->description_article !!}</p>
                    <img src="/images/{{ $article->image }}" class="img-fluid mb-3 rounded" alt="{{ $article->name }}">
                </div>
                <div class="card-footer bg-light border-0 py-3">
                    <a href="{{ route('articles') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
