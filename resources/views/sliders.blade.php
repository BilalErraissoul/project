<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Header Styles */
        header {
            background-color: #003366;
            padding: 20px 0;
            color: #fff;
            margin-bottom: 20px;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo {
            margin: 0;
            font-size: 26px;
            left
        }
        .header-nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: right;
        }
        .header-nav ul li {
            display: inline-block;
            margin-right: 20px;
        }
        .header-nav ul li a {
            text-decoration: none;
            color: #fff;
            transition: background-color 0.3s;
            border-radius: 5px;
            padding: 8px 15px;
        }
        .header-nav ul li a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .logo {
            margin: 0;
            font-size: 20px; /* Increase font size */
            width: auto; /* Adjust width */
        }

        /* Carousel Styles */
        .carousel-item img {
            max-height: 300px;
            object-fit: cover;
        }
        
        .carousel-caption {
            background-color: #003366;
            color: white;
            padding: 20px;
            border-radius: 5px;
        }
        
        .quick-access {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .quick-access h2 {
            margin-bottom: 20px;
            font-size: 20px;
            color: #003366;
        }
        .quick-access ul {
            list-style-type: none;
            padding: 0;
        }
        .quick-access ul li {
            margin-bottom: 10px;
        }
        .quick-access ul li a {
            text-decoration: none;
            color: #0069d9;
            font-weight: bold;
            transition: color 0.3s;
        }
        .quick-access ul li a:hover {
            color: #0056b3;
        }

        /* Panel Styles */
        .panel-heading {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px 5px 0 0;
        }
        .panel-title {
            margin: 0;
            font-size: 20px;
        }
        .panel-body {
            padding: 20px;
        }
        .panel-body a {
            color: #007bff;
            font-weight: bold;
        }
        .panel-body a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    
<header>
    <div class="container header-container">
        <h1 class="logo">UCD</h1>
        <nav class="header-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Departements</a></li>
                <li><a href="#">Formations</a></li>
                <li><a href="#">Recherche</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
    

<div class="container">

    <div class="row justify-content-end">
        <div class="col-lg-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="University Logo" style="width: 100%; height: auto; float: left;">
        </div>
        <div class="col-lg-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($sliders as $key => $slider)
                    <div class="carousel-item {{$key == 0 ? 'active' : ''}}">
                        <img src="{{ $slider->url }}" class="d-block w-100" alt="{{ $slider->title }}">
                        <div class="carousel-caption">
                            <h5>{{ $slider->title }}</h5>
                            <p>Some description about the slide.</p>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <hr style="border-top: 2px solid #003366; margin-top: 20px; margin-bottom: 20px;">
    

    <div class="row justify-content-between">
        <div class="col-lg-9">
        @extends('events.layout')
     
     @section('content')
         <div class="row">
             <div class="col-lg-12 margin-tb">
                 <div class="pull-left">
                     <h2>LISTES DES EVENEMENTS</h2>
                 </div>
                 <div class="pull-right">
                     <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
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
                 <td>{{ $event->id }}</td>
                 <td><img src="/images/{{ $event->image }}" width="100px"></td>
                 <td>{{ $event->name_event }}</td>
                 <td>{{ $event->description_event }}</td>
                 <td>{{ $event->date_event }}</td>
                 <td>
                     <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                         <a class="btn btn-info" href="{{ route('events.show',$event->id) }}">Show</a>
                         <a class="btn btn-primary" href="{{ route('events.edit',$event->id) }}">Edit</a>
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
     
        </div>
        <div class="col-lg-3">
            <div class="quick-access">
                <h2>Accès Rapide</h2>
                <ul>
                    <li><a href="{{ route('events.index') }}">Événements</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Départements</a></li>
                    <li><a href="#">Annonces</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title" style="font-weight: bold"><i class="fa fa-pie-chart" id="titre-panel"></i>&nbsp;STATISTIQUES</h1>
                </div>
                <div class="panel-body" id="biblio">
                    <div class="list-group" style="font-weight: bold; color: #006699">
                        <p href="#" class="list-group-item">
                            ETUDIANTS: 11920
                        </p>
                        <p href="#" class="list-group-item">
                            FORMATIONS: 26
                        </p>
                        <p href="#" class="list-group-item">
                            DEPARTEMENTS: 13
                        </p>
                        <p href="#" class="list-group-item">
                            LABORATOIRES: 9
                        </p>
                        <p href="#" class="list-group-item">
                            FORMATIONS DOCTORALES: 6
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h1 class="panel-title" id="titre-panel"><i class="fa fa-book" id="titre-panel"></i>&nbsp;ESPACE ETUDIANT</h1>
                </div>
                <div class="panel-body" id="biblio">
                    <a href="" target="blank">RESULTATS</a><BR>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <!-- Your existing content goes here -->
        </div>
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title" id="titre-panel"><i class="fa fa-edit" id="titre-panel"></i>&nbsp;Bibliothèque</h1>
                </div>
                <div class="panel-body" id="biblio">
                    <strong>en construction</strong>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h1 class="panel-title" id="titre-panel"><i class="fa fa-edit" id="titre-panel"></i>&nbsp;Réclamations<br/>الشكايات</h1>
                </div>
                <div class="panel-body" id="biblio">
                    <a href="#" target="_blank">الشكايات المتعلقة بالنتائج</a><br>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
