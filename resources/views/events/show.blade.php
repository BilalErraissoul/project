@extends('events.layout')
@include('header')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <img src="{{ asset('images/COVER.png') }}" alt="University Logo" class="img-fluid img-thumbnail" style="width: 100%; height: 270px; object-fit: cover;">
    </div>
    <div class="col-lg-4">
        <div class="quick-access p-4 rounded bg-light shadow-sm">
            <h2 class="mb-4" style="font-size: 20px; color: #003366;">ACCÈS RAPIDES</h2>
            <div class="list-group">
                <a href="{{ route('sliders') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Événements</a>
                <a href="{{ route('articles') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Articles</a>
                <a href="{{ route('annonces') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Annonces</a>
                <a href="{{ route('departements') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Départements</a>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white py-3">
                        <h2 class="card-title mb-0">{{ $event->name_event }}</h2>
                        <p class="card-subtitle text-muted">{{ $event->date_event }}</p>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-justify">{{ $event->description_event }}</p>
                        <img src="/images/{{ $event->image }}" class="img-fluid mb-3 rounded" alt="{{ $event->name_event }}">
                    </div>
                    <div class="card-footer bg-light border-0 py-3">
                        <a href="{{ route('sliders') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
