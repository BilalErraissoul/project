@extends('doyens.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Add New Doyen</h2>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('doyens.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter name">
                        </div>

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" name="description" rows="5" placeholder="Enter description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" name="date" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="épingler" id="épingler">
                            <label for="épingler">Pin this doyen</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('doyens.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
