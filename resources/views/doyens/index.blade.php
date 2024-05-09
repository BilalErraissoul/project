@extends('doyens.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>MOT DU DOYEN</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('doyens.create') }}"> Create New doyen</a>
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
        @foreach ($events as $event)
        <tr>
            <td>{{ $doyen->id }}</td>
            <td><img src="/images/{{ $doyen->image }}" width="100px"></td>
            <td>{{ $doyen->name }}</td>
            <td>{!! $doyen->description !!}</td>
            <td>{{ $doyen->date }}</td>
            <td>
                <form action="{{ route('doyens.destroy',$event->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('doyen.show',$doyen->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('doyen.edit',$doyen->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $events->links() !!}
        
@endsection
