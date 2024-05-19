@extends('doyens.layout')
     
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTES DES DOYENS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('doyens.create') }}"> Créer un nouveau doyen</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($doyens as $doyen)
        <tr>
            <td>{{ $doyen->id }}</td>
            <td><img src="/images/{{ $doyen->image }}" width="100px"></td>
            <td>{{ $doyen->name }}</td>
            <td>{!! $doyen->description !!}</td>
            <td>{{ $doyen->date }}</td>
            <td>
                <form action="{{ route('doyens.destroy',$doyen->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('doyens.show',$doyen->id) }}">Afficher</a>
                    <a class="btn btn-primary" href="{{ route('doyens.edit',$doyen->id) }}">Modifier</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $doyens->links() !!}
        
@endsection
