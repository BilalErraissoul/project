@extends('departements.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-dark">Liste des Départements</h2>
                <a href="{{ route('departements.create') }}" class="btn btn-primary">Créer un Nouveau Département</a>
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
                        @foreach ($departements as $departement)
                        <tr>
                            <td>{{ $departement->id }}</td>
                            <td><img src="/images/{{ $departement->image }}" width="100px" class="img-fluid rounded-circle" alt="Image"></td>
                            <td>{{ $departement->name}}</td>
                            <td>{!! $departement->description !!}</td>
                            <td>{{ $departement->date }}</td>
                            <td>
                                <form action="{{ route('departements.destroy',$departement->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('departements.show',$departement->id) }}">Afficher</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('departements.edit',$departement->id) }}">Modifier</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce département ?')">Supprimer</button>
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
            {!! $departements->links() !!}
        </div>
    </div>
</div>
@endsection
