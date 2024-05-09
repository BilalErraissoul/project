@extends('recherches.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTES DES RECHERCHES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('recherches.create') }}"> Create New Recherche</a>
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
            <th>Name</th>
            <th>Description</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($recherches as $recherche)
        <tr>
            <td>{{ $recherche->id }}</td>
            <td><img src="/images/{{ $recherche->image }}" width="100px"></td>
            <td>{{ $recherche->name }}</td>
            <td>{!! $recherche->description !!}</td>
            <td>{{ $recherche->date }}</td>
            <td>
                <form action="{{ route('recherches.destroy',$recherche->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('recherches.show',$recherche->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('recherches.edit',$recherche->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $recherches->links() !!}
        
@endsection
