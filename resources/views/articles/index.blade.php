@extends('articles.layout')
     
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>LISTES DES ARTICLES</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Create New Article</a>
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
        @foreach ($articles as $article)
        <tr>
            <td>{{ $article->id }}</td>
            <td><img src="/images/{{ $article->image }}" width="100px"></td>
            <td>{{ $article->name }}</td>
            <td>{!! $article->description !!}</td>
            <td>{{ $article->date }}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('articles.show',$article->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $articles->links() !!}
        
@endsection
