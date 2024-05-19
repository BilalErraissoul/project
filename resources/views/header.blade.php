<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Header</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom Styles */
        .header-container {
            background-color: #001229; /* Darker blue background color */
            padding: 5px 0;
        }

        .logo {
            font-size: 20px;
            font-family: 'Arial Black', sans-serif;
            color: #fff;
            background-color: #87ceeb; /* Ciel blue background color */
            padding: 5px 0px; /* Adjust padding as needed */
            border-radius: 5px; /* Optional: Add border-radius for rounded corners */
            margin-right: auto;
        
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            margin-left: 15px; /* Changed margin-left */
            transition: transform 0.3s ease; /* Transition for transform property */
        }

        .navbar-nav .nav-link:hover {
            transform: scale(1.1); /* Scale effect on hover */
        }

        .dropdown-menu {
            background-color: #333;
        }

        .dropdown-item {
            color: #fff !important;
            transition: background-color 0.3s ease; /* Transition for background color change */
        }

        .dropdown-item:hover {
            background-color: #444;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .logo {
                font-size: 24px;
            }

            .navbar-nav .nav-link {
                margin-left: 10px;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container-fluid header-container ">
        <div class="container">
            <div class="row align-items-left">
                <div class="col-md-auto col-2">
                    <h1 class="logo">UCD FS</h1>

                </div>
                <div class="col-md col-5">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sliders') }}">Accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('formations') }}">Formations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('departements') }}">Departement</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Administration
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                        <a class="dropdown-item" href="{{route('services')}}">Services</a>
                                        <a class="dropdown-item" href="#">Conseil d'établissement</a>
                                        <a class="dropdown-item" href="#">Commissions</a>
                                        <a class="dropdown-item" href="#">Commission scientifiques</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('recherches')}}">Recherche</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Espace Etudiant</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Bootstrap JS and jQuery (optional) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
