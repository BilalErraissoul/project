@extends('annonces.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-dark">Liste des Annonces</h2>
                <a href="{{ route('annonces.create') }}" class="btn btn-primary">Créer une Nouvelle Annonce</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="bg-secondary text-white">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Description</th>
                            <th scope="col">Date</th>
                            <th scope="col" width="280px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($annonces as $annonce)
                        <tr>
                            <td>{{ $annonce->id }}</td>
                            <td><img src="/images/{{ $annonce->image }}" width="100px" class="img-fluid rounded-circle" alt="Image"></td>
                            <td>{{ $annonce->name}}</td>
                            <td >{!! $annonce->description !!}</td>
                            <td>{{ $annonce->date }}</td>
                            <td>
                                <form action="{{ route('annonces.destroy',$annonce->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('annonces.show',$annonce->id) }}">Afficher</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('annonces.edit',$annonce->id) }}">Modifier</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-center">
            {!! $annonces->links() !!}
        </div>
    </div>
</div>
@endsection
