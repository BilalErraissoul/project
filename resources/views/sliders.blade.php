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


        .quick-access {
    background-color: #eceff8; /* Bleu ciel doux */
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Légère ombre */
}

    .quick-access h2 {
    margin-bottom: 15px; /* Reduced margin bottom */
    font-size: 24px; /* Increased font size */
    color: #333; /* Darkened text color for better readability */
}

.quick-access ul {
    list-style-type: none;
    padding: 0;
}

.quick-access ul li {
    margin-bottom: 8px; /* Reduced margin bottom */
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
        font-weight: normal;
    }

    .panel-body a:hover {
        color: #0056b3;
    }

    .swiper {
        width:100%;
        height: 330px;
    }
    .swiper-slide img {
    width: 100%; /* Rempli horizontalement le conteneur */
    height: 100%; /* Rempli verticalement le conteneur */
    object-fit: cover; /* Ajuste la taille de l'image tout en conservant ses proportions */
}

    /* Style pour le titre et la description de l'annonce */
    .annonce-info {
    background-color: rgba(248, 249, 250, 0.7); /* Background color with transparency */
    backdrop-filter: blur(10px); /* Blur effect */
    color: #212529; /* Text color */
    padding: 10px; /* Reduce padding */
    border-radius: 10px; /* Rounded corners */
    margin-top: auto; /* Move to the bottom */
    text-align: center; /* Center text */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
    transition: all 0.3s ease; /* Transition animation */
    width: auto; /* Set width to auto */
    max-width: 120%; /* Limit maximum width */
    margin-left: auto; /* Center horizontally */
    margin-right: auto; /* Center horizontally */
}
body, p, h2, h3, h4, h6, a {
    font-weight: normal !important;
}

.annonce-info h5 {
    margin-bottom: 6px; /* Spacing below the title */
    font-size: 18px; /* Reduced title size */
}

.annonce-info p {
    font-size: 12px; /* Reduced text size */
}

footer {
        margin-right: 0;
        margin-left: 0;
    }
    
    /* CSS for bell icon animation */
.bell-icon {
    animation: bell-pulse 1s infinite alternate; /* Apply the bell-pulse animation */
    transition: transform 0.3s ease; /* Smooth transition for hover effect */
}

/* Keyframes for bell pulse animation */
@keyframes bell-pulse {
    0% {
        transform: scale(1); /* Initial scale */
    }
    100% {
        transform: scale(1.05); /* Scale up slightly */
    }
}

/* CSS for bell icon hover effect */
.bell-icon:hover {
    transform: scale(1.1); /* Scale up on hover */
}

    .list-group-item {
        transition: background-color 0.3s ease; /* Smooth transition effect */
    }

    .list-group-item:hover {
        background-color: #f8f9fa; /* Light gray background on hover */
    }
    .swiper-slide {
    position: relative; /* Ensure position-relative */
}

.carousel-caption {
    margin-left: 0; /* Zero margin on the left */
    margin-right: 0; /* Zero margin on the right */
    overflow: hidden; /* Hide overflowing content */
    border-radius: 10px; /* Rounded corners */
}

.blur-background {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    filter: blur(5px); /* Apply light blur effect */
    pointer-events: none; /* Allow interaction with elements beneath */
    border-radius: 10px; /* Rounded corners */
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

<script>
    // Add blur effect matching the image blur
document.addEventListener('DOMContentLoaded', function() {
    const swiperSlides = document.querySelectorAll('.swiper-slide');
    swiperSlides.forEach(function(slide) {
        const img = slide.querySelector('img');
        const blurBackground = slide.querySelector('.blur-background');
        const computedStyle = window.getComputedStyle(img);
        const blurValue = computedStyle.filter;
        blurBackground.style.backdropFilter = blurValue;
    });
});

</script>
<div class="container col-11">
<div class="container col-12 mt-4">
    <div class="row justify-content-center align-items-start mb-5">
        <!-- Department Information -->
        <div class="col-lg-3  p-1 rounded d-flex flex-column align-items-center"style="background-color: #f6f9ff"
> <!-- Added utility classes for centering -->
            <img src="{{ asset('images/fslogo.png') }}" alt="University Logo" style="max-width: 200px; height: auto;"> <!-- Adjusted logo size -->
            <div class="mt-3 text-center">
                <h1 class="fw-bold">FS-UCD</h1> <!-- Adjusted heading size -->
                <h6 class="fw-bold">FACULTÉ DES SCIENCES</h6> <!-- Adjusted heading size -->
                <p>EL JADIDA</p>
            </div>
        </div>

        <div class="col-lg-9 d-flex align-items-start justify-content-center position-relative"> <!-- Adjusted alignment to align items at the top and added position-relative -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($carouselhome as $carousel)
            <div class="swiper-slide text-center position-relative"> <!-- Centering the content and added position-relative -->
                <img src="/images/{{ $carousel['image'] }}" class="img-fluid" alt="{{ $carousel['name'] }}"> <!-- Adding inline styles to prevent stretching -->
                <div class="carousel-caption text-dark position-absolute bottom-0 start-0 end-0 mx-auto mb-4"> <!-- Positioned the caption at the bottom and centered -->
                    <div class="annonce-info">
                        <h5>{{ $carousel['name'] }}</h5>
                        <p>{!! Str::words($carousel['description'], 15, '...') !!}</p>
                    </div>
                    <div class="blur-background"></div> <!-- Add a div for the blurred background -->
                </div>
            </div>
            @endforeach
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination" style="bottom: 10px;"></div>
        <!-- Navigation Buttons -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
    <div class="event-title bg-light "> <h2 class="mb-4"><i class="fas fa-compass me-2"></i> Accès Rapide</h2></div>
       
        <ul class="list-group">
            <li class="list-group-item border-0 mt-4">
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





<div class="row mt-4">
            <!-- Liste des événements Section -->
            <div class="event-title d-flex justify-content-between align-items-center">
    <h1 class="mb-4"><i class="fas fa-calendar-alt"></i>ÉVÉNEMENTS</h1>
    <a href="{{ route('events') }}" class="text-decoration-none text-secondary">Afficher tous</a>
</div>

            <!-- Events Section -->
           
            @foreach ($eventsHome as $event)
            @if ($event->special == 1) 
            <div class="article-item mb-4 p-3 mt-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                    <div class="progress mb-2" style="height: 2px;">
                    </div>
                    <div class="row align-items-center">
                    <div class="col-md-12">
                            <img src="/images/{{ $event->image }}" class="img-fluid rounded" alt="{{ $event->name}}">
                            <div class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle bell-icon">
                            <i class="fas fa-bell text-white"></i>
                            </div>

                        </div>
                        <div class="col-md-10 mt-2">
                            <h5>{{ $event->name }}</h5>
                            <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                                <p class="description-text" style="margin: 0;">{!! $event->description  !!}</p>
                                <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                                <a href="{{ route('events.show',['event'=>$event->id]) }}"class="text-primary" style="text-decoration: underline;">Lire la suite ...</a>
                                <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="article-item mb-4 p-3 mt-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                    <div class="progress mb-2" style="height: 2px;">
                    </div>
                    <div class="row align-items-center">
                    <div class="col-md-12">
                            <img src="/images/{{ $event->image }}" class="img-fluid rounded" alt="{{ $event->name }}">
                        </div>
                        <div class="col-md-10 mt-2">
                            <h5>{{ $event->name }}</h5>
                            <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                            <p class="description-text" style="margin: 0; font-size: 14px !important;">{!! $event->description !!}</p>
                            <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                                <a href="{{ route('events.show',['event'=>$event->id]) }}" class="text-primary" style="text-decoration: underline;">Lire la suite ...</a>
                                <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach  
        </div> 
        
                   
       

      
        
    </div> 
    
    <div class="col-lg-9">
    <div class="mb-4">
    <div class="mb-4">
    <div class="event-title d-flex justify-content-between align-items-center">
    <h1 class="mb-4"><i class="fas fa-bullhorn"></i> ANNONCES</h1>
    <a href="{{ route('annonces') }}" class="text-decoration-none text-secondary">Afficher tous</a>
</div>

</div>

        <div class=" p-3 mb-4">
            

            <!-- Annonces Section -->
            <div class="row">
                @foreach ($annoncesHome as $annonce)
                    @if ($annonce->special == 1)
                    <div class="article-item mb-4 p-3" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
       
        <div class="row align-items-center">
            <div class="col-md-4 position-relative overflow-hidden">
            <img src="/images/{{ $annonce->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $annonce->name }}">
            <div class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle bell-icon">
                  <i class="fas fa-bell text-white"></i>
            </div>

            </div>
            <div class="col-md-7">
                <h5>{{ $annonce->name }}</h5>
                <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                    <p class="description-text" style="margin: 0;">{!! $annonce->description !!}</p>
                    <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                    <a href="{{ route('annonces.show',['annonce'=>$annonce->id]) }}" class="text-primary" style="text-decoration: underline;">Lire la suite ...</a>
                    <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($annonce->created_at)->format('D M d Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
                    @else
                        @if ($loop->index < 4)
                        <div class="article-item mb-4 p-3" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
    <div class="row align-items-center">
        <div class="col-md-4 position-relative overflow-hidden">
            <img src="/images/{{ $annonce->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $annonce->name }}">
        </div>
        <div class="col-md-7">
            <h5>{{ $annonce->name }}</h5>
            <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                <p class="description-text" style="margin: 0;">{!! $annonce->description !!}</p>
                <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
            </div>
            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                <a href="{{ route('annonces.show',['annonce'=>$annonce->id]) }}" class="text-primary" style="text-decoration: underline;">Lire la suite ...</a>
                <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($annonce->created_at)->format('D M d Y H:i') }}</p>
            </div>
        </div>
    </div>
</div>

                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>


       

                <!-- Announcements Section -->
               
   

                
                <div class="mb-4">
                <div class="mb-4">
                <div class="event-title d-flex justify-content-between align-items-center">
    <h1 class="mb-4"><i class="fas fa-newspaper"></i> ARTICLES</h1>
    <a href="{{ route('articles') }}" class="text-decoration-none text-secondary">Afficher tous</a>
</div>

</div>

            
        <div class=" p-3 mb-4">


                <!-- Articles Section -->
                <div class="row">
                    @foreach ($articlesHome as $article)
                    @if ($article->special == 1) 
                    <div class="article-item mb-4 p-3" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
       
        <div class="row align-items-center">
        <div class="col-md-4 position-relative overflow-hidden">
            <img src="/images/{{ $article->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $article->name }}">
            <div class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle bell-icon">
    <i class="fas fa-bell text-white"></i>
</div>

            </div>
            <div class="col-md-7">
                <h5>{{ $article->name }}</h5>
                <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                    <p class="description-text" style="margin: 0;">{!! $article->description !!}</p>
                    <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                <a href="{{ route('articles.show',['article'=>$article->id]) }}" class="text-primary bold" style="text-decoration: underline;">Lire la suite ...</a>
                    <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($article->created_at)->format('D M d Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
                    @else
                        @if ($loop->index < 2)
                        <div class="article-item mb-4 p-3" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
      
        <div class="row align-items-center">
        <div class="col-md-4 position-relative overflow-hidden">
            <img src="/images/{{ $article->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $article->name }}">
            </div>
            <div class="col-md-7">
                <h5>{{ $article->name }}</h5>
                <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                    <p class="description-text" style="margin: 0;">{!! $article->description !!}</p>
                    <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                </div>
                <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                <a href="{{ route('articles.show',['article'=>$article->id]) }}" class="text-primary bold" style="text-decoration: underline;">Lire la suite ...</a>
                    <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($article->created_at)->format('D M d Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
                        @endif
                        @endif
                    @endforeach
                </div>
            </div>
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
