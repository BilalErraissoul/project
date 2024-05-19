<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<h1 class="logo h4 text-white bg-info p-2 rounded">UCD-FS</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <form method="POST" action="{{ route('admin.logout') }}">
    @csrf
    <button type="submit" class="btn btn-secondary">Logout</button>
</form>        </li>
      </ul>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="list-group" id="list-tab" role="tablist">
                <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action active">Add annonce</a>
                <a href="{{ route('admin.articles') }}" class="list-group-item list-group-item-action">Add article</a>
                <a href="{{ route('admin.departements') }}" class="list-group-item list-group-item-action">Add departments</a>
                <a href="{{ route('admin.events') }}" class="list-group-item list-group-item-action">Add Event</a>
                <a href="{{ route('admin.doyens') }}" class="list-group-item list-group-item-action ">Add Mot de doyen</a>
                <a href="{{ route('admin.services') }}" class="list-group-item list-group-item-action">Add service</a>
                <a href="{{ route('admin.formations') }}" class="list-group-item list-group-item-action">Add Formation</a>
                <a href="{{ route('admin.recherches') }}" class="list-group-item list-group-item-action">Add Recherche</a>

            </div>
        </div>
        <div class="col-9">
            <div class="row">
                <div class="col-12 mb-4 d-flex justify-content-end">
                    <button type="button" class="btn btn-primary ml-2" id="saveBtn" data-toggle="modal" data-target="#addRechercheModal">
                        Add Recherche
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group row">
                        <input type="text" id="keyword" class="form-control mr-2 col-8" placeholder="Enter keyword">
                        <select id="filter" class="form-control col-3">
                            <option selected value="0">Filter by Column</option>
                            <option value="1">Title</option>
                            <option value="2">Modified At</option>
                            <option value="3">Description</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table id="table" class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Special</th>
                                    <th>Carousel</th>
                                    <th>Home</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Replace 'events' with 'recherches' -->
                                @foreach ($recherches as $recherche)
                                <tr>
                                    <td>{{ $recherche->id }}</td>
                                    <td>{{ $recherche->name }}</td>
                                    <td>{!! Str::words($recherche->description, 10, '...') !!}</td>
                                    <td>{{ $recherche->date}}</td>
                                    <td>
                                        <input type="checkbox" class="checkbox" data-item-id="{{ $recherche->id }}" data-field="special" {{ $recherche->special ? 'checked' : '' }} onclick="updateCheckbox('{{ $recherche->id }}', 'special')">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" data-item-id="{{ $recherche->id }}" data-field="carousel" {{ $recherche->carousel ? 'checked' : '' }} onclick="updateCheckbox('{{ $recherche->id }}', 'carousel')">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" data-item-id="{{ $recherche->id }}" data-field="home" {{ $recherche->home ? 'checked' : '' }} onclick="updateCheckbox('{{ $recherche->id }}', 'home')">
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Actions">
                                            <a class="btn btn-info btn-sm" href="{{ route('recherches.show',$recherche->id) }}">Show</a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('recherches.edit',$recherche->id) }}">Edit</a>
                                            <form action="{{ route('recherches.destroy',$recherche->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this recherche?')">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addRechercheModal" tabindex="-1" role="dialog" aria-labelledby="addRechercheModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       
    
    <div class="modal-content">
      <div id="formErrors" class="alert alert-danger" style="display: none;"></div>
      <div class="modal-header">
        <h5 class="modal-title" id="addRechercheModalLabel">Add New Recherche</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">×</span>
</button>
</div>
<div class="modal-body">
<!-- Recherche form goes here -->
<form id="myForm" action="{{ route('recherches.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
@csrf
<div class="mb-3">
<label for="name" class="form-label">Name:</label>
<input type="text" name="name" class="form-control" id="name_recherche" placeholder="Enter name">
@error('name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
<label for="description" class="form-label">Description:</label>
<textarea class="form-control" name="description" rows="5" placeholder="Enter description" id="description_recherche"></textarea>
<div class="invalid-feedback">Please enter a description.</div>
</div>
<div class="mb-3">
<label for="date" class="form-label">Date:</label>
<input type="date" name="date" class="form-control" id="date_recherche">
<div class="invalid-feedback">Please select a date.</div>
</div>
<div class="mb-3">
<label for="image" class="form-label">Image:</label>
<input type="file" name="image" class="form-control-file" id="image">
<div class="invalid-feedback">Please select an image.</div>
</div>
<div class="form-check mb-3">
<input type="checkbox" name="épingler" id="épingler" class="form-check-input">
<label for="épingler" class="form-check-label">Pin this recherche</label>
</div>
<div class="d-grid gap-2">
<button type="button" id="submitFormBtn" class="btn btn-primary btn-lg btn-block fw-bold animate__animated animate__fadeInUp">Submit</button>
<button type="button" class="btn btn-secondary btn-lg btn-block fw-bold animate__animated animate__fadeInUp" data-dismiss="modal">Cancel</button>
</div>
</form>
</div>
</div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function updateCheckbox(id, field) {
        $.ajax({
            url: '/update-checkboxRecherche',
            method: 'POST',
            data: {
                id: id,
                field: field,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#description_recherche'))
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    });

    function handleSaveButtonClick(e) {
        e.preventDefault();   
        document.getElementById('submitFormBtn').addEventListener('click', function() {
            var name = document.getElementById('name_recherche').value;
            var descriptionEditor = window.editor;
            var description = descriptionEditor.getData();
            var image = document.getElementById('image').files[0];
            var date = document.getElementById('date_recherche').value;
            var errors = [];

            if (!name.trim()) {
                errors.push("Name is required.");
            }

            if (!description.trim()) {
                errors.push("Description is required.");
            }

            if (!image) {
                errors.push("Image is required.");
            } else {
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.svg|\.pdf)$/i;
                if (!allowedExtensions.exec(image.name)) {
                    errors.push("Invalid file format. Allowed formats: jpg, jpeg, png, gif, svg, pdf.");
                }
                if (image.size > 2048 * 1024) {
                    errors.push("File size exceeds 2MB limit.");
                }
            }
            
            if (!date) {
                errors.push("Date is required.");
            }

            if (errors.length > 0) {
                var errorString = errors.join("<br>");
                var formErrors = document.getElementById('formErrors');
                formErrors.innerHTML = errorString;
                formErrors.style.display = "block";
            } else {
                console.log(errors);
                document.getElementById('myForm').submit(); 
            }
        });
    }

    document.getElementById('submitFormBtn').addEventListener('click', handleSaveButtonClick);
</script>
</body>
</html>