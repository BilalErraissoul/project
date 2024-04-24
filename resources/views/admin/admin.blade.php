<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">My Interface</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <button type="button" class="btn btn-secondary">Logout</button>
        </li>
        <!-- Button trigger modal -->
        
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
<a href="#" class="list-group-item list-group-item-action">Add Mot de doyen</a>
<a href="{{ route('admin.services') }}" class="list-group-item list-group-item-action">Add service</a>

      </div>
    </div>



    <div class="col-9">
        <div class="row">
        <div class="col-12 mb-4 d-flex justify-content-end">
    <button type="button" class="btn btn-primary ml-2" id="saveBtn" data-toggle="modal" data-target="#addAnnonceModal">
        Add Annonce
    </button>
</div>

        </div>
        <div class="row">
    <div class="col-12">
        <div class="form-group row">
            <div class="col-md-8">
                <input type="text" id="keyword" class="form-control mr-2" placeholder="Enter keyword">
            </div>
            <div class="col-md-3">
                <select id="filter" class="form-control">
                    <option selected value="0">Filter by Column</option>
                    <option value="1">Title</option>
                    <option value="2">Modified At</option>
                    <option value="3">Description</option>
                </select>
            </div>
        </div>
    </div>
</div>


<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <!-- Table -->
        <div class="table-responsive">
            <table id="table" class="table table-striped table-bordered">
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
                    @foreach ($annonces as $annonce)
                    <tr>
                        <td>{{ $annonce->id }}</td>
                        <td>{{ $annonce->name  }}</td>
                        <td>{!! Str::limit($annonce->description , 100, '...') !!}</td>
                        <td>{{ $annonce->date }}</td>
                        <td>
                         <input type="checkbox" class="checkbox" data-item-id="{{ $annonce->id }}" data-field="special" {{ $annonce->special ? 'checked' : '' }} onclick="updateCheckbox('{{ $annonce->id }}', 'special')">
                        </td>
                        <td>
                         <input type="checkbox" class="checkbox" data-item-id="{{ $annonce->id }}" data-field="carousel" {{ $annonce->carousel ? 'checked' : '' }} onclick="updateCheckbox('{{ $annonce->id }}', 'carousel')">
                         </td>
                         <td>
                         <input type="checkbox" class="checkbox" data-item-id="{{ $annonce->id }}" data-field="home" {{ $annonce->home ? 'checked' : '' }} onclick="updateCheckbox('{{ $annonce->id }}', 'home')">
                          </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Actions">
                                <a class="btn btn-info btn-sm" href="{{ route('annonces.show',$annonce->id) }}">Afficher</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('annonces.edit',$annonce->id) }}">Modifier</a>
                                <form action="{{ route('annonces.destroy',$annonce->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">Supprimer</button>
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

        <!-- Other tab panes -->
      </div>
    </div>
  </div>
</div>

<!-- Modal -->

<div class="modal fade" id="addAnnonceModal" tabindex="-1" role="dialog" aria-labelledby="addAnnonceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div id="formErrors" class="alert alert-danger" style="display: none;"></div>
            <div class="modal-header">
            

                <h5 class="modal-title" id="addAnnonceModalLabel">Add New Annonce</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Annonce form goes here -->
                <form id="myForm"  action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data"  class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" id="name_annonce" placeholder="Enter name" >
                        @error('name_annonce')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" rows="5" placeholder="Enter description" id="description_annonce" ></textarea>
                        <div class="invalid-feedback">Please enter a description.</div>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date:</label>
                        <input type="date" name="date" class="form-control" id="date_annonce" >
                        <div class="invalid-feedback">Please select a date.</div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" name="image" class="form-control-file" id="image">
                        <div class="invalid-feedback">Please select an image.</div>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="épingler" id="épingler" class="form-check-input">
                        <label for="épingler" class="form-check-label">Pin this annonce</label>
                    </div>

                    <div class="d-grid gap-2">
                    <button type="button" id="submitFormBtn"  class="btn btn-primary btn-lg btn-block fw-bold animate__animated animate__fadeInUp">Submit</button>
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
                url: '/update-checkboxAnonce',
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
        .create( document.querySelector( '#description_annonce' ) )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( error => {
            console.error( error );
        });
});

function handleSaveButtonClick(e) {
    e.preventDefault();   

    // Validate name
    document.getElementById('submitFormBtn').addEventListener('click', function() {
        var name = document.getElementById('name_annonce').value;
        var descriptionEditor = window.editor;
        var description = descriptionEditor.getData();
        var image = document.getElementById('image').files[0];
        var date = document.getElementById('date_annonce').value;

        var errors = [];

        // Perform form submission logic here
        if (!name.trim()) {
            errors.push("Name is required.");
        }

        // Validate description
        if (!description.trim()) {
            errors.push("Description is required.");
        }

        // Validate image
        if (!image) {
            errors.push("Image is required.");
        } else {
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif|\.svg)$/i;
            if (!allowedExtensions.exec(image.name)) {
                errors.push("Invalid image format. Allowed formats: jpg, jpeg, png, gif, svg.");
            }
            if (image.size > 2048 * 1024) {
                errors.push("Image size exceeds 2MB limit.");
            }
        }
        
        // Validate date
        if (!date) {
            errors.push("Date is required.");
        }

        if (errors.length > 0) {
            var errorString = errors.join("<br>");
            var formErrors = document.getElementById('formErrors');
            formErrors.innerHTML = errorString;
            formErrors.style.display = "block"; // Set display to block  
        } else {
            console.log(errors);
            document.getElementById('myForm').submit(); 
        }
    });
}

document.getElementById('submitFormBtn').addEventListener('click', handleSaveButtonClick);

</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
