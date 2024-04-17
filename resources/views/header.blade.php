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
            background-color: #005baa; /* Dark blue background color */
            padding: 10px 0;
        }

        .logo {
            font-size: 28px;
            font-family: 'Arial Black', sans-serif;
            color: #fff;
            margin-right: 20px;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700 !important;
        }

        .dropdown-menu {
            background-color: #333;
        }

        .dropdown-item {
            color: #fff !important;
            transition: background-color 0.3s ease;
        }

        .dropdown-item:hover {
            background-color: #444;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .logo {
                font-size: 24px;
                margin-right: 10px;
            }

            .navbar-nav .nav-link {
                font-size: 14px;
                margin-right: 10px;
            }
        }
    </style>
</head>
<body>

<header>
    <div class="container-fluid header-container">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-2 col-6">
                    <h1 class="logo">UCD</h1>
                </div>
                <div class="col-md-10 col-6">
                    <nav class="navbar navbar-expand-lg navbar-dark p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('sliders') }}">Home</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        La Faculté
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#">Mot du Doyen</a>
                                        <a class="dropdown-item" href="#">Présentation de la Faculté</a>
                                        <a class="dropdown-item" href="#">Organigramme</a>
                                        <a class="dropdown-item" href="#">Conseil de la Faculté</a>
                                        <a class="dropdown-item" href="#">Liens Utiles</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Départements & Filières</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Formations</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Recherche & Coopération</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Espace Étudiant</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
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

<script>
    // JavaScript to show dropdown on hover
    document.querySelectorAll('.nav-item.dropdown').forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            this.querySelector('.dropdown-menu').classList.add('show');
        });
        item.addEventListener('mouseleave', function() {
            this.querySelector('.dropdown-menu').classList.remove('show');
        });
    });
</script>

</body>
</html>
