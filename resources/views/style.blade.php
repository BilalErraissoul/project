<style>
       
       /* Style du conteneur du titre d'événement */
       .event-title {
               background-color: #f6f9ff;
               /* Couleur de fond */
               padding: 25px;
               /* Espacement intérieur */
               border-radius: 5px;
               /* Coins arrondis */
               box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
               /* Légère ombre */
               height: 50px;
               margin-top: 20px;
           }
       
           /* Style du titre */
           .event-title h1 {
               color: #003366;
               /* Couleur du texte */
               font-size: 20px;
               /* Taille de la police */
               font-weight: bold;
               /* Gras */
               display: inline-block;
               /* Affichage en ligne pour le centrage vertical */
           }
       
           /* Style de l'icône awesome */
           .event-title h1 i {
               margin-right: 10px;
               /* Espacement entre l'icône et le texte */
               color: #007bff;
               /* Couleur de l'icône */
           }
       
           /* Carousel Styles */
       
       
           .quick-access {
           background-color: #eceff8;
           /* Bleu ciel doux */
           padding: 20px;
           width: 100%;
           
           border-radius: 10px;
           margin-top: 20px;
           margin-left: 0;
           margin-right: 0;
       
           box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
           /* Légère ombre */
       }
       
       
           .quick-access h2 {
               margin-bottom: 15px;
               /* Reduced margin bottom */
               font-size: 24px;
               /* Increased font size */
               color: #333;
               /* Darkened text color for better readability */
           }
       
           .quick-access ul {
               list-style-type: none;
               padding: 0;
           }
       
           .quick-access ul li {
               margin-bottom: 8px;
               /* Reduced margin bottom */
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
               color: lightblue;
           }
       
           .swiper {
               width: 100%;
               height: 385px;
           }
       
           .swiper-slide img {
               width: 100%;
               /* Rempli horizontalement le conteneur */
               height: 100%;
               /* Rempli verticalement le conteneur */
               object-fit: cover;
               /* Ajuste la taille de l'image tout en conservant ses proportions */
           }
       
          /* Style for the announcement title and description */
.annonce-info {
    background-color: rgba(255, 255, 255, 0.8); /* Light background color with slight transparency */
    backdrop-filter: blur(3px); /* Blur effect */
    color: midnightblue; /* Text color */
    padding: 10px; /* Reduced padding */
    border-radius: 10px; /* Rounded corners */
    text-align: center; /* Center text */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Light shadow */
    transition: all 0.3s ease; /* Transition animation */
    width: 100% /* Adjust width to fit within padding */
    margin-left: auto; /* Center horizontally */
    margin-right: auto; /* Center horizontally */
    margin-bottom: 0; /* Ensure no space below the description */
}

/* Reset font weight for various elements */
body,
p,
h2,
h3,
h4,
h6,
a {
    font-weight: normal !important;
}

/* Style for the announcement title */
.annonce-info h5 {
    margin-bottom: 6px; /* Spacing below the title */
    font-size: 25px; /* Adjusted title size */
    font-weight: bold; /* Bold text */
    color: midnightblue; /* Ensure the title color matches the text color */
}

/* Style for the announcement description */
.annonce-info p {
    font-size: 14px; /* Adjusted text size for better readability */
    color: #333; /* Improved text color for better contrast */
    margin-bottom: 0; /* Ensure no margin below the description */
}

       
           footer {
               margin-right: 0;
               margin-left: 0;
           }
       
           /* CSS for bell icon animation */
           .bell-icon {
               animation: bell-pulse 1s infinite alternate;
               /* Apply the bell-pulse animation */
               transition: transform 0.3s ease;
               /* Smooth transition for hover effect */
           }
       
           /* Keyframes for bell pulse animation */
           @keyframes bell-pulse {
               0% {
                   transform: scale(1);
                   /* Initial scale */
               }
       
               100% {
                   transform: scale(1.05);
                   /* Scale up slightly */
               }
           }
       
           /* CSS for bell icon hover effect */
           .bell-icon:hover {
               transform: scale(1.1);
               /* Scale up on hover */
           }
       
           .list-group-item {
               transition: background-color 0.3s ease;
               /* Smooth transition effect */
           }
       
           .list-group-item:hover {
               background-color: #f8f9fa;
               /* Light gray background on hover */
           }
       
           .swiper-slide {
               position: relative;
               /* Ensure position-relative */
           }
       
           .carousel-caption {
               margin-left: 0;
               /* Zero margin on the left */
               margin-right: 0;
               /* Zero margin on the right */
               overflow: hidden;
               /* Hide overflowing content */
               border-radius: 10px;
               /* Rounded corners */
           }
       
           .blur-background {
               position: absolute;
               top: 0;
               left: 0;
               width: 100%;
               height: 100%;
               filter: blur(5px);
               /* Apply light blur effect */
               pointer-events: none;
               /* Allow interaction with elements beneath */
               border-radius: 10px;
               /* Rounded corners */
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
       
       
       <div class="container col-11 ">
               <div class="container col-12 mt-2 pt-0">
                   <div class="row justify-content-center align-items-start mb-0">
                       <!-- Department Information -->
                       <div class="col-lg-3  p-2 rounded d-flex flex-column align-items-center"
                           style="background-color: #f6f9ff">
                           <!-- Added utility classes for centering -->
                           <img src="{{ asset('images/fslogo.png') }}" alt="University Logo"
                               style="max-width: 230px; height: auto;"> <!-- Adjusted logo size -->
                           <div class="mt-3 text-center">
                               <h1 class="fw-bold">FS-UCD</h1> <!-- Adjusted heading size -->
                               <h6 class="fw-bold">FACULTÉ DES SCIENCES</h6> <!-- Adjusted heading size -->
                               <p>EL JADIDA</p>
                           </div>
                       </div>