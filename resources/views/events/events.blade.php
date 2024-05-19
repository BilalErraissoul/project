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
    @include('style')
        <div class="col-lg-9 d-flex align-items-start justify-content-center"> <!-- Adjusted alignment to align items at the top -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                @foreach ($Events as $event)
                        <div class="swiper-slide">
                            <img src="/images/{{ $event->image }}" class="d-block w-100" alt="{{ $event->name  }}">
                            <div                                     class="carousel-caption text-dark position-absolute bottom-0 start-0 end-0 mx-0 mb-4 mt-200 ">
>
                                <div class="annonce-info">
                                    <h5>{{ $event->name }}</h5>
                                    <p>{!! Str::words($event->description , 15, '...') !!}</p>
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
    <div class="bg-light">
                                <h2 class="mb-4"><i class="fas fa-compass me-2"></i> Accès Rapide</h2>
                            </div>       
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
   
<div class="col-lg-9 pt-0 ">
                        <div class="mb-0">
                            <div class="mb-0">
            <!-- Liste des événements Section -->
            <div class="event-title d-flex justify-content-between align-items-center">
    <h1 class="mb-4"><i class="fas fa-calendar-alt"></i>ÉVÉNEMENTS</h1>
</div>
            <!-- Events Section -->
            @foreach ($eventsEpingler as $event)
            <div class="article-item mb-4 p-3 mt-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                    
                    <div class="row align-items-center">
                        <div class="col-md-5 position-relative overflow-hidden">
                            <img src="/images/{{ $event->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $event->name }}">
                            <div class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle">
                                <i class="fas fa-bell text-white"></i>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <h5>{{ $event->name  }}</h5>
                            <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                                <p class="description-text" style="margin: 0;">{!! $event->description  !!}</p>
                                <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                                <a href="{{ route('events.show',['event'=>$event->id]) }}" class="text-primary">En savoir plus</a>
                                <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($eventsNonEpingler as $event)
            <div class="article-item mb-4 p-3 mt-4" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                    
                    <div class="row align-items-center">
                        <div class="col-md-5">
                            <img src="/images/{{ $event->image }}" class="img-fluid rounded" style="width: 100%; height: 150px; object-fit: cover;" alt="{{ $event->name }}">
                        </div>
                        <div class="col-md-7">
                            <h5>{{ $event->name }}</h5>
                            <div class="description-container" style="max-height: 5em; overflow: hidden; position: relative;">
                                <p class="description-text" style="margin: 0;">{!! $event->description  !!}</p>
                                <span class="more-indicator" style="position: absolute; bottom: 0; right: 0;"></span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                                <a href="{{ route('events.show',['event'=>$event->id]) }}" class="text-primary">En savoir plus</a>
                                <p style="margin-bottom: 0;">{{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}</p>
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