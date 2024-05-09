@extends('formations.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTES DES FORMATIONS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('formations.create') }}"> Create New Formation</a>
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
        @foreach ($formations as $formation)
        <tr>
            <td>{{ $formation->id }}</td>
            <td><img src="/images/{{ $formation->image }}" width="100px"></td>
            <td>{{ $formation->name }}</td>
            <td>{!! $formation->description !!}</td>
            <td>{{ $formation->date }}</td>
            <td>
                <form action="{{ route('formations.destroy',$formation->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('formations.show',$formation->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('formations.edit',$formation->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $formations->links() !!}
        
@endsection
