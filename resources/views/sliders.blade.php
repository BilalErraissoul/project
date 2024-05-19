<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCD FS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('style')


                <div class="col-lg-9 d-flex align-items-start justify-content-center position-relative mt-0">
                    <!-- Adjusted alignment to align items at the top and added position-relative -->
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($carouselhome as $carousel)
                            <div class="swiper-slide text-center position-relative">
                                <!-- Centering the content and added position-relative -->
                                <img src="/images/{{ $carousel['image'] }}" class="img-fluid"
                                    alt="{{ $carousel['name'] }}"> <!-- Adding inline styles to prevent stretching -->
                                <div
                                    class="carousel-caption text-dark position-absolute bottom-0 start-0 end-0 mx-0 mb-0 ">
                                    <!-- Positioned the caption at the bottom and centered -->
                                    <div class="annonce-info mb-0 ">
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







            <div class=" bg-gradient ">
                <div class="row justify-content-between ">


                    <div class="col-lg-3   ">
                        <div class="quick-access">
                            <div class="bg-light ">
                                <h2 class="mb-4"><i class="fas fa-compass me-2"></i> Accès Rapide</h2>
                            </div>

                            <ul class="list-group">
                                <li class="list-group-item border-0 mt-2">
                                    <a href="{{ route('events') }}"
                                        class="text-decoration-none text-dark">Événements</a>
                                </li>
                                <li class="list-group-item border-0">
                                    <a href="{{ route('articles') }}"
                                        class="text-decoration-none text-dark">Articles</a>
                                </li>
                                <li class="list-group-item border-0">
                                    <a href="{{ route('departements') }}"
                                        class="text-decoration-none text-dark">Départements</a>
                                </li>
                                <li class="list-group-item border-0">
                                    <a href="{{ route('annonces') }}"
                                        class="text-decoration-none text-dark">Annonces</a>
                                </li>
                                <li class="list-group-item border-0">
                                    <a href="{{ route('services') }}"
                                        class="text-decoration-none text-dark">Services</a>
                                </li>
                            </ul>
                        </div>





                        <div class="row mt-4">
                            <!-- Liste des événements Section -->
                            <div class="event-title d-flex justify-content-between align-items-center">
                                <h1 class="mb-4 mt-3"><i class="fas fa-calendar-alt"></i>ÉVÉNEMENTS</h1>
                                <a href="{{ route('events') }}" class="text-decoration-none text-secondary">Afficher
                                    tous</a>
                            </div>

                            <!-- Events Section -->

                            @foreach ($eventsHome as $event)
                            @if ($event->special == 1)
                            <div class="article-item mb-4 p-3 mt-4"
                                style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                                <div class="progress mb-2" style="height: 2px;">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <img src="/images/{{ $event->image }}" class="img-fluid rounded"
                                            alt="{{ $event->name}}">
                                        <div
                                            class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle bell-icon">
                                            <i class="fas fa-bell text-white"></i>
                                        </div>

                                    </div>
                                    <div class="col-md-10 mt-2">
                                        <h5>{{ $event->name }}</h5>
                                        <div class="description-container"
                                            style="max-height: 5em; overflow: hidden; position: relative;">
                                            <p class="description-text" style="margin: 0;">{!! $event->description !!}
                                            </p>
                                            <span class="more-indicator"
                                                style="position: absolute; bottom: 0; right: 0;"></span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center"
                                            style="margin-top: 10px;">
                                            <a href="{{ route('events.show',['event'=>$event->id]) }}"
                                                class="text-primary" style="text-decoration: underline;">Lire la suite
                                                ...</a>
                                            <p style="margin-bottom: 0;">
                                                {{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="article-item mb-4 p-3 mt-4"
                                style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                                <div class="progress mb-2" style="height: 2px;">
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <img src="/images/{{ $event->image }}" class="img-fluid rounded"
                                            alt="{{ $event->name }}">
                                    </div>
                                    <div class="col-md-10 mt-2">
                                        <h5>{{ $event->name }}</h5>
                                        <div class="description-container"
                                            style="max-height: 5em; overflow: hidden; position: relative;">
                                            <p class="description-text" style="margin: 0; font-size: 14px !important;">
                                                {!! $event->description !!}</p>
                                            <span class="more-indicator"
                                                style="position: absolute; bottom: 0; right: 0;"></span>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center"
                                            style="margin-top: 10px;">
                                            <a href="{{ route('events.show',['event'=>$event->id]) }}"
                                                class="text-primary" style="text-decoration: underline;">Lire la suite
                                                ...</a>
                                            <p style="margin-bottom: 0;">
                                                {{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>






                    </div>

                    <div class="col-lg-9 pt-0 ">
                        
                    <div class="mb-0 ">
                        <div class="event-title d-flex justify-content-between align-items-center">
                        <h1 class="mb-4 mt-3"><i class="fas fa-user-tie"></i> MOT DE DOYEN</h1>
                        </div>
                        <div class="article-item mb-4 p-3 mt-3" style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                            <div class="row align-items-center">
                            <div class="col-md-4 position-relative overflow-hidden">
                                    <img src="{{ asset('images/MOT.jpeg') }}"class="img-fluid rounded"
                                                    style="width: 100%; height: 150px; object-fit: cover;" alt="Doyen">
                                </div>

                                <div class="col-md-7">                                <h5>MOT DE DOYEN</h5>

                                    <h6>La Faculté des Sciences d’El Jadida relevant de l’Université Chouaïb Doukkali est un établissement à accès ouvert. Elle accueille les titulaires de .....</h6>
                                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 10px;">
                                    <a href="{{ route('motdedoyen') }}" class="text-primary" style="text-decoration: underline;">Lire la
                                                        suite ...</a>
                                        <p style="margin-bottom: 0;">Thu Mar 14 2024 15:26</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="event-title d-flex justify-content-between align-items-center  ">
                                    <h1 class="mb-4 mt-3"><i class="fas fa-bullhorn"></i> ANNONCES</h1>
                                    <a href="{{ route('annonces') }}"
                                        class="text-decoration-none text-secondary">Afficher tous</a>
                                </div>
                            </div>

                            <div class=" p-3 mb-4">


                                <!-- Annonces Section -->
                                <div class="row">
                                    @foreach ($annoncesHome as $annonce)
                                    @if ($annonce->special == 1)
                                    <div class="article-item mb-4 p-3"
                                        style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">

                                        <div class="row align-items-center">
                                            <div class="col-md-4 position-relative overflow-hidden">
                                                <img src="/images/{{ $annonce->image }}" class="img-fluid rounded"
                                                    style="width: 100%; height: 150px; object-fit: cover;"
                                                    alt="{{ $annonce->name }}">
                                                <div
                                                    class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle bell-icon">
                                                    <i class="fas fa-bell text-white"></i>
                                                </div>

                                            </div>
                                            <div class="col-md-7">
                                                <h5>{{ $annonce->name }}</h5>
                                                <div class="description-container"
                                                    style="max-height: 5em; overflow: hidden; position: relative;">
                                                    <p class="description-text" style="margin: 0;">{!!
                                                        $annonce->description !!}</p>
                                                    <span class="more-indicator"
                                                        style="position: absolute; bottom: 0; right: 0;"></span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center"
                                                    style="margin-top: 10px;">
                                                    <a href="{{ route('annonces.show',['annonce'=>$annonce->id]) }}"
                                                        class="text-primary" style="text-decoration: underline;">Lire la
                                                        suite ...</a>
                                                    <p style="margin-bottom: 0;">
                                                        {{ \Carbon\Carbon::parse($annonce->created_at)->format('D M d Y H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    @if ($loop->index < 4) <div class="article-item mb-4 p-3"
                                        style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">
                                        <div class="row align-items-center">
                                            <div class="col-md-4 position-relative overflow-hidden">
                                                <img src="/images/{{ $annonce->image }}" class="img-fluid rounded"
                                                    style="width: 100%; height: 150px; object-fit: cover;"
                                                    alt="{{ $annonce->name }}">
                                            </div>
                                            <div class="col-md-7">
                                                <h5>{{ $annonce->name }}</h5>
                                                <div class="description-container"
                                                    style="max-height: 5em; overflow: hidden; position: relative;">
                                                    <p class="description-text" style="margin: 0;">{!!
                                                        $annonce->description !!}</p>
                                                    <span class="more-indicator"
                                                        style="position: absolute; bottom: 0; right: 0;"></span>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-center"
                                                    style="margin-top: 10px;">
                                                    <a href="{{ route('annonces.show',['annonce'=>$annonce->id]) }}"
                                                        class="text-primary" style="text-decoration: underline;">Lire la
                                                        suite ...</a>
                                                    <p style="margin-bottom: 0;">
                                                        {{ \Carbon\Carbon::parse($annonce->created_at)->format('D M d Y H:i') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                @endif
                                @endif
                                @endforeach
                            </div>
                        </div>
          




                    <!-- Announcements Section -->




                    <div class="mb-4">
                        <div class="mb-4">
                            <div class="event-title d-flex justify-content-between align-items-center">
                                <h1 class="mb-4 mt-3"><i class="fas fa-newspaper"></i> ARTICLES</h1>
                                <a href="{{ route('articles') }}" class="text-decoration-none text-secondary">Afficher
                                    tous</a>
                            </div>

                        </div>


                        <div class=" p-3 mb-4">


                            <!-- Articles Section -->
                            <div class="row">
                                @foreach ($articlesHome as $article)
                                @if ($article->special == 1)
                                <div class="article-item mb-4 p-3"
                                    style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">

                                    <div class="row align-items-center">
                                        <div class="col-md-4 position-relative overflow-hidden">
                                            <img src="/images/{{ $article->image }}" class="img-fluid rounded"
                                                style="width: 100%; height: 150px; object-fit: cover;"
                                                alt="{{ $article->name }}">
                                            <div
                                                class="position-absolute top-0 start-3 p-2 bg-danger rounded-circle bell-icon">
                                                <i class="fas fa-bell text-white"></i>
                                            </div>

                                        </div>
                                        <div class="col-md-7">
                                            <h5>{{ $article->name }}</h5>
                                            <div class="description-container"
                                                style="max-height: 5em; overflow: hidden; position: relative;">
                                                <p class="description-text" style="margin: 0;">{!! $article->description
                                                    !!}</p>
                                                <span class="more-indicator"
                                                    style="position: absolute; bottom: 0; right: 0;"></span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center"
                                                style="margin-top: 10px;">
                                                <a href="{{ route('articles.show',['article'=>$article->id]) }}"
                                                    class="text-primary bold" style="text-decoration: underline;">Lire
                                                    la suite ...</a>
                                                <p style="margin-bottom: 0;">
                                                    {{ \Carbon\Carbon::parse($article->created_at)->format('D M d Y H:i') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                @if ($loop->index < 2) <div class="article-item mb-4 p-3"
                                    style="background-color: #ffffff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border: 1px solid #ccc;">

                                    <div class="row align-items-center">
                                        <div class="col-md-4 position-relative overflow-hidden">
                                            <img src="/images/{{ $article->image }}" class="img-fluid rounded"
                                                style="width: 100%; height: 150px; object-fit: cover;"
                                                alt="{{ $article->name }}">
                                        </div>
                                        <div class="col-md-7">
                                            <h5>{{ $article->name }}</h5>
                                            <div class="description-container"
                                                style="max-height: 5em; overflow: hidden; position: relative;">
                                                <p class="description-text" style="margin: 0;">{!! $article->description
                                                    !!}</p>
                                                <span class="more-indicator"
                                                    style="position: absolute; bottom: 0; right: 0;"></span>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-center"
                                                style="margin-top: 10px;">
                                                <a href="{{ route('articles.show',['article'=>$article->id]) }}"
                                                    class="text-primary bold" style="text-decoration: underline;">Lire
                                                    la suite ...</a>
                                                <p style="margin-bottom: 0;">
                                                    {{ \Carbon\Carbon::parse($article->created_at)->format('D M d Y H:i') }}
                                                </p>
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