<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCD FS</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       
/* Style du conteneur du titre d'événement */
.event-title {
    background-color: #f6f9ff; /* Couleur de fond */
    padding: 20px; /* Espacement intérieur */
    border-radius: 5px; /* Coins arrondis */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Légère ombre */
}

/* Style du titre */
.event-title h1 {
    color: #003366; /* Couleur du texte */
    font-size: 20px; /* Taille de la police */
    font-weight: bold; /* Gras */
    display: inline-block; /* Affichage en ligne pour le centrage vertical */
}

/* Style de l'icône awesome */
.event-title h1 i {
    margin-right: 10px; /* Espacement entre l'icône et le texte */
    color: #007bff; /* Couleur de l'icône */
} 
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
        height: 330px;
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
/* CSS for bell icon hover effect */
.bell-icon:hover {
    transform: scale(1.1); /* Scale up on hover */
}
<style>
    .list-group-item {
        transition: background-color 0.3s ease; /* Smooth transition effect */
    }

    .list-group-item:hover {
        background-color: #f8f9fa; /* Light gray background on hover */
    }
    </style>
</head>
<body>
    @include('header')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var dropdownToggle = document.querySelector('.dropdown-toggle');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        dropdownToggle.addEventListener('click', function() {
            if (!dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.add('show');
            } else {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>


<div class="container col-11">
<div class="container col-12 mt-4">
    <div class="row justify-content-center align-items-start mb-5">
        <!-- Department Information -->
        <div class="col-lg-3 bg-light p-1 rounded d-flex flex-column align-items-center"> <!-- Added utility classes for centering -->
            <img src="{{ asset('images/fslogo.png') }}" alt="University Logo" style="max-width: 200px; height: auto;"> <!-- Adjusted logo size -->
            <div class="mt-3 text-center">
                <h1 class="fw-bold">FS-UCD</h1> <!-- Adjusted heading size -->
                <h6 class="fw-bold">FACULTÉ DES SCIENCES</h6> <!-- Adjusted heading size -->
                <p>EL JADIDA</p>
            </div>
        </div>

        <div class="col-lg-9 d-flex align-items-start justify-content-center"> <!-- Adjusted alignment to align items at the top -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
               <!-- Slides de votre carousel -->
               @foreach ($articles as $article)
                        <div class="swiper-slide">
                            <img src="/images/{{ $article->image }}" class="d-block w-100" alt="{{ $article->name }}">
                            <div class="carousel-caption text-dark">
                                <div class="annonce-info">
                                    <h5>{{ $article->name }}</h5>
                                    <p>{!! Str::words($article->description_article, 15, '...') !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation Buttons -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            
        </div>
        
    </div>
</div>

@push('scripts')
    <script>
        var swiper = new Swiper('.mySwiper', {
            slidesPerView: 'auto', // Set the number of slides per view to 'auto' to fit as many slides as possible without stretching
            spaceBetween: 30, // Optional: Set the space between slides
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush






    
<div class="container-fluid bg-gradient">
    <div class="row justify-content-between">
   
    
    <div class="col-lg-3">
    <div class="quick-access">
    <div class="event-title "> <h2 class="mb-4"><i class="fas fa-compass me-2"></i> Accès Rapide</h2></div>
       
        <ul class="list-group">
        <li class="list-group-item border-0 mt-3">
                <a href="{{ route('events') }}" class="text-decoration-none text-dark">Événements</a>
            </li>
            <li class="list-group-item border-0">
                <a href="{{ route('articles') }}" class="text-decoration-none text-dark">Articles</a>
            </li>
            <li class="list-group-item border-0">
                <a href="{{ route('departements') }}" class="text-decoration-none text-dark">Départements</a>
            </li>
            <li class="list-group-item border-0">
                <a href="{{ route('annonces') }}" class="text-decoration-none text-dark">Annonces</a>
            </li>
            <li class="list-group-item border-0">
                <a href="{{ route('services') }}" class="text-decoration-none text-dark">Services</a>
            </li>
        </ul>
    </div>
</div>
   
<div class="col-lg-9">
    <div class="mb-4">
    <div class="mb-4">
   

</div>

        <div class=" p-3 mb-4">
            <!-- Liste des événements Section -->
            <div class="event-title d-flex justify-content-between align-items-center">
            <h1 class="mb-4"><i class="fas fa-newspaper"></i> ARTICLES</h1>
</div>
            <!-- Display pinned articles -->
    @foreach ($articlesEpingler as $article)
    <div class="article-item mb-4 p-3 mt-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
        
        <div class="row align-items-center">
            <div class="col-md-5 position-relative overflow-hidden">
                <img src="/images/{{ $article->image }}" class="img-fluid rounded"style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $article->name }}">
                <div class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle">
                    <i class="fas fa-bell text-white"></i>
                </div>
            </div>
            <div class="col-md-7">
                <h5>{{ $article->name }}</h5>
                <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                    <p class="description-text" style="margin: 0;">{!! $article->description !!}</p>
                    <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;">...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                    <a href="{{ route('articles.show',['article'=>$article->id]) }}" class="text-primary">En savoir plus</a>
                    <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($article->created_at)->format('D M d Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach

@foreach ($articlesNonEpingler as $article)
<div class="article-item mb-4 p-3 mt-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
        
        <div class="row align-items-center">
            <div class="col-md-5">
                <img src="/images/{{ $article->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $article->name }}">
            </div>
            <div class="col-md-7">
                <h5>{{ $article->name }}</h5>
                <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                    <p class="description-text" style="margin: 0;">{!! $article->description !!}</p>
                    <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;">...</span>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                    <a href="{{ route('articles.show',['article'=>$article->id]) }}" class="text-primary">En savoir plus</a>
                    <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($article->created_at)->format('D M d Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
          
        </div>
        
       </div>
            </div>
        </div>
        </div>
</div>
<!-- Include the Font Awesome stylesheet -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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