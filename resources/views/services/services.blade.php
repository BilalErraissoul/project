<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCD FS</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* Carousel Styles */
    .carousel-item img {
        max-height: 300px;
        object-fit: cover;
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

    .swiper {
        width:100%;
        height: 400px;
    }

    /* Style pour le titre et la description de l'annonce */
    .annonce-info {
    background-color: rgba(248, 249, 250, 0.7); /* Couleur de fond avec transparence */
    backdrop-filter: blur(10px); /* Effet de flou */
    color: #212529; /* Couleur du texte */
    padding: 10px; /* Réduire l'espacement intérieur */
    border-radius: 10px; /* Coins arrondis */
    margin-top: 20px; /* Marge supérieure */
    text-align: center; /* Centrage du texte */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Légère ombre */
    transition: all 0.3s ease; /* Animation de transition */
    width: 60%; /* Largeur de 60% */
    margin: 20px auto; /* Centrage horizontal */
}

.annonce-info h5 {
    margin-bottom: 6px; /* Espacement sous le titre */
    font-size: 18px; /* Taille du titre réduite */
}

.annonce-info p {
    font-size: 12px; /* Taille du texte réduite */
}


</style>
@include('header')
<div class="container col-10">
    <div class="container col-11">
        <div class="row justify-content-center align-items-center mb-5">
            <div class="col-lg-3 bg-light p-4 rounded">
                <img src="{{ asset('images/fslogo.png') }}" alt="University Logo" style="width: 100%; height: auto;">
                <div class="mt-3 text-center">
                    <h1 class="fw-bold">FS-UCD</h1>
                    <h6 class="fw-bold">FACULTÉ DES SCIENCES</h6>
                    <p>EL JADIDA</p>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Slides de votre carousel -->
                        @foreach ($services as $service)
                        <div class="swiper-slide">
                            <img src="/images/{{ $service->image }}" class="d-block w-100" alt="{{ $service->name }}">
                            <div class="carousel-caption text-dark">
                                <div class="annonce-info">
                                    <h5>{{ $service->name}}</h5>
                                    <p>{!! Str::words($service->description, 15, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Boutons de navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <hr style="border-top: 2px solid #003366; margin-top: 20px; margin-bottom: 20px;">

    <div class="row justify-content-between">
    <div class="col-lg-9">  
        <h1 class="mb-4" style="color: #003366; font-size: 36px; font-weight: bold;">LISTE DES SERVICES</h1>
        @foreach ($servicesEpingler as $services)
    <div class="article mb-4 p-3" style="background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="progress mb-2" style="height: 2px;">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="position-relative overflow-hidden">
                    <div class="position-absolute top-0 start-0 p-2 bg-danger rounded-circle" style="font-size: 20px;">
                        <i class="fas fa-bell text-white"></i>
                    </div>
                    <img src="/images/{{ $services->image }}" class="img-fluid rounded" alt="{{ $services->name }}" style="object-fit: cover; object-position: center; width: 100%;">
                </div>
            </div>
            <div class="col-md-8">
                <h5 class="fw-bold text-dark" style="font-size: 20px;">{{ $services->name }}</h5>
                <div class="article-description" style="height: 72px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; font-size: 16px;">
                    <p class="text-muted">{!! $services->description !!}</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('services.show',['service'=>$services->id]) }}}}" class="text-primary" style="font-size: 18px;">Lire la suite</a>
                    <p class="text-muted m-0" style="font-size: 18px;">{{ \Carbon\Carbon::parse($services->created_at)->format('D M d Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
        @foreach ($servicesNonEpingler as $service) 
        <div class="article mb-4 p-3" style="background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <div class="progress mb-2" style="height: 2px;">
                <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-12"> 
                        <img src="/images/{{ $service->image }}" class="img-fluid rounded" alt="{{ $service->name}}" style="object-fit: cover; object-position: center; width: 100%;">
                    
                </div>
                <div class="col-md-8">
                    <h5 class="fw-bold text-dark" style="font-size: 20px;">{{ $service->name }}</h5>
                    <div class="article-description" style="height: 72px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; font-size: 16px;">
                        <p class="text-muted">{!! $service->description !!}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('services.show',['service'=>$service->id]) }}" class="text-primary" style="font-size: 18px;">Lire la suite</a>
                        <p class="text-muted m-0" style="font-size: 18px;">{{ \Carbon\Carbon::parse($service->created_at)->format('D M d Y H:i') }}</p>
                    </div>
                </div>
            </div>
        </div> 
        @endforeach
    </div>




        
        <div class="col-lg-3">
            <div class="quick-access">
                <h2>Accès Rapide</h2>
                <ul>
                <li><a href="{{ route('sliders') }}">Événements</a></li>
                    <li><a href="{{ route('articles') }}">Articles</a></li>
                    <li><a href="{{ route('departements') }}">Départements</a></li>
                    <li><a href="{{ route('annonces') }}">Annonces</a></li>
                    <li><a href="{{ route('services') }}">Services</a></li>
                    
                </ul>
            </div>
            <div class="row"> 
                <div class="col-12">
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
         <div class="row">
            <div class="col-12">
                <!-- Your existing content goes here -->
            </div>
            <div class="col-12">
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
    </div> 
</div> 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script>
    const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  loop: true, 
  autoplay: {
            delay: 3000, // Time in milliseconds before the next slide is shown
            disableOnInteraction: false, // Enable/disable autoplay on slide interaction
        },
  // If we need pagination
  pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
</script>
</body>
@include('footer')
</html>
