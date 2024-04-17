@extends('services.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-dark">Liste des Services</h2>
                <a href="{{ route('services.create') }}" class="btn btn-primary">Créer un Nouveau Service</a>
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
                        @foreach ($services as $service)
                        <tr>
                            <td>{{ $service->id }}</td>
                            <td><img src="/images/{{ $service->image }}" width="100px" class="img-fluid rounded-circle" alt="Image"></td>
                            <td>{{ $service->name_service }}</td>
                            <td>{{ $service->description_service }}</td>
                            <td>{{ $service->date_service }}</td>
                            <td>
                                <form action="{{ route('services.destroy',$service->id) }}" method="POST">
                                    <a class="btn btn-info btn-sm" href="{{ route('services.show',$service->id) }}">Afficher</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('services.edit',$service->id) }}">Modifier</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?')">Supprimer</button>
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
            {!! $services->links() !!}
        </div>
    </div>
</div>
@endsection
