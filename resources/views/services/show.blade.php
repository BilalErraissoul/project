@extends('services.layout')
@include('header')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row align-items-center">
            <div class="col-lg-3 bg-light p-4 rounded">
                <div class="text-center">
                    <img src="{{ asset('images/fslogo.png') }}" alt="University Logo" style="max-width: 150px; height: auto;">
                    <h1 class="fw-bold mt-3 mb-0">FS-UCD</h1>
                    <h6 class="fw-bold mb-3">FACULTÉ DES SCIENCES</h6>
                    <p class="mb-0">EL JADIDA</p>
                </div>
            </div>
            <div class="col-lg-9">
                <img src="{{ asset('images/services.png') }}" alt="University Logo" class="img-fluid img-thumbnail" style="width: 100%; height: 270px; object-fit: cover;">
            </div>
        </div>
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
                <h2 class="card-title mb-0" style="font-family: 'Arial', sans-serif; font-size: 28px; font-weight: bold;">{{ $service->name_service }}</h2>
                <p class="card-subtitle text-muted mb-0" style="font-family: 'Arial', sans-serif; font-size: 16px;">{{ $service->date_service }}</p>
            </div>
            <div class="card-body">
                <p class="card-text" style="font-family: 'Arial', sans-serif; font-size: 18px;">{!! $service->description_service !!}</p>
                <img src="/images/{{ $service->image }}" class="img-fluid mb-3 rounded" alt="{{ $service->name_service }}" style="max-width: 100%; height: auto; max-height: 400px;">
            </div>
            <div class="card-footer bg-light border-0 py-3">
                <a href="{{ route('services') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</div>
@include('footer')
@endsection
