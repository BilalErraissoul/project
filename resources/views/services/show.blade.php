<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>services</title>
</head>
@include('header')

<body>
    
@extends('services.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row align-items-center">
            <div class="col-lg-3 bg-light p-4 rounded mt-3">
                <div class="text-center">
                    <img src="{{ asset('images/fslogo.png') }}" alt="University Logo" style="max-width: 150px; height: auto;">
                    <h2 class="fw-bold mt-3 mb-0">FS-UCD</h2>
                    <h6 class="fw-bold mb-3">FACULTÉ DES SCIENCES</h6>
                    <p class="mb-0">EL JADIDA</p>
                </div>
            </div>
            <div class="col-lg-9">
                <img src="{{ asset('images/service.png') }}" alt="University Logo" class="img-fluid img-thumbnail" style="width: 100%; height: 280px; object-fit: cover;">
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-3 bg-light p-4 rounded">
        <div class="quick-access col-lg-9 ">
            <h2 class="mb-4 mt-4" style="font-size: 20px; color: #003366;">ACCÈS RAPIDES</h2>
            <div class="list-group">
                <a href="{{ route('events') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2 ">Événements</a>
                <a href="{{ route('articles') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Articles</a>
                <a href="{{ route('annonces') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Annonces</a>
                <a href="{{ route('departements') }}" class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Départements</a>
            </div>
        </div>
    
</div>


    <div class="col-lg-9">
        <div class="card border-0 shadow-lg">
            <div class="card-header  text-white py-3"style="background-color:#001229">
                <h2 class="card-title mb-0">{{ $service->name }}</h2>
                <p class="card-subtitle text-muted ">{{ $service->date }}</p>
            </div>
            <div class="card-body">
                <p class="card-text text-justify">{!! $service->description !!}</p>
                <img src="/images/{{ $service->image }}" class="img-fluid mb-3 rounded" alt="{{ $service->name }}">
            </div>
            <div class="card-footer bg-light border-0 py-3">
                <a href="{{ route('services') }}" class="btn btn-secondary">Retour</a>
            </div>
        </div>
    </div>
</div>
</div>

@include('footer')
@endsection

</body>
</html>