@extends('doyens.layout')

@section('content')
<div class="container-fluid bg-gradient">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h2 class="card-title mb-0">Add New Doyen</h2>
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

                    <form action="{{ route('doyens.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name_doyen" class="form-control" placeholder="Enter name" required>
                            <div class="invalid-feedback">Please enter a name.</div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea class="form-control" name="description_doyen" rows="5" placeholder="Enter description" required></textarea>
                            <div class="invalid-feedback">Please enter a description.</div>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date:</label>
                            <input type="date" name="date_doyen" class="form-control" required>
                            <div class="invalid-feedback">Please select a date.</div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control-file" required>
                            <div class="invalid-feedback">Please select an image.</div>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="épingler" id="épingler" class="form-check-input">
                            <label for="épingler" class="form-check-label">Pin this Doyen</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg btn-block fw-bold animate__animated animate__fadeInUp">Submit</button>
                            <a href="{{ route('doyens.index') }}" class="btn btn-secondary btn-lg btn-block fw-bold animate__animated animate__fadeInUp">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
