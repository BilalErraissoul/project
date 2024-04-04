<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Website</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"  />
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
            height: 300px;
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

    <div class="row justify-content-between">
        <div class="col-lg-3">
        <img src="{{ asset('images/logo.jpg') }}" alt="University Logo" style="width: 100%; height: auto; float: left;">
        </div>
        <div class="col-lg-9"> 
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <!-- Slides -->
                  @foreach ($events as $event)
                    <div class=" swiper-slide ">
                        <img src="/images/{{ $event->image }}" class="d-block w-100" alt="{{  $event->name_event}}">
                        <div  >
                            <h5>{{  $event->name_event}}</h5>
                            <p>Some description about the slide.</p>
                        </div>
                    </div>
                    @endforeach  


                    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
              
                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
              
                <!-- If we need scrollbar -->
                <div class="swiper-scrollbar"></div>
              </div>
                    
        </div>
    </div>
    <hr style="border-top: 2px solid #003366; margin-top: 20px; margin-bottom: 20px;">
    

    <div class="row justify-content-between">
        {{-- hna fin dir content --}}
        <div class="col-lg-9">  
            <h4>list events</h4>
            @foreach ($eventsEpingler as $event)
            <div class="d-flex flex-column"> 
                <div class="progress mb-2" style="height: 2px">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div></div>
                <div class="d-flex row">
                    <div class="col-5   position-relative">  
                       <div class="position-absolute" style="overflow: hidden;">
                        <img src="/images/{{ $event->image }}" style="width: 90%; height: auto; object-fit: cover; object-position: center; " alt="">
                       </div>
                       <span class="position-absolute top-0 start-3 p-2 w-10 rounded-circle" style = "background: red;">
                        <i class="fas  fa-2x  fa-bell" style = "color:rgb(255, 255, 255);"></i>
                    </span>
                        
                    </div>
                    <div class="col-7">
                        <h5>{{ $event->name_event }}</h5>
                        <p>{{ $event->description_event }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque porro minus, unde recusandae iure neque tempore soluta harum earum hic, libero dicta expedita tenetu </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('events.show',['event'=>$event->id]) }}">read more</a>
                            <p>{{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}</p>
                        </div>
                    </div>
                </div> 

            </div> 
            @endforeach
            @foreach ($events as $event)
            <div class="d-flex flex-column"> 
                <div class="progress mb-2" style="height: 2px">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>                  </div>
                <div class="d-flex row">
                    <div class="col-5"><img src="/images/{{ $event->image }}"  class="w-100"></div>
                    <div class="col-7">
                        <h5>{{ $event->name_event }}</h5>
                        <p>{{ $event->description_event }} Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque porro minus, unde recusandae iure neque tempore soluta harum earum hic, libero dicta expedita tenetu </p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('events.show',['event'=>$event->id]) }}">read more</a>
                            <p>{{ \Carbon\Carbon::parse($event->created_at)->format('D M d Y H:i') }}</p>
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
                    <li><a href="{{ route('events.index') }}">Événements</a></li>
                    <li><a href="#">Articles</a></li>
                    <li><a href="#">Départements</a></li>
                    <li><a href="#">Annonces</a></li>
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
</html>
