<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Footer container */
     /* Footer container */
.footer {
    background-color: #001229; /* Dark gray background */
    color: #cbd5e0; /* Light gray text color */
    padding: 40px 0; /* Padding around content */
    display: flex; /* Utilize flexbox for layout */
    justify-content: space-between; /* Space out items horizontally */
    align-items: center; /* Center items vertically */
}

/* Footer grid layout */
.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Grid columns responsive */
    gap: 40px; /* Gap between grid items */
    align-items: start; /* Align items at the top of the grid */
}

/* Footer section */
.footer-section {
    text-align: left; /* Left align content */
}

/* Footer section title */
.footer-section h2 {
    font-size: 18px; /* Title font size */
    font-weight: 600; /* Title font weight */
    color: #fff; /* White title color */
    background-color: black; /* Dark gray title background */
    padding: 12px 20px; /* Padding around title */
    margin-bottom: 20px; /* Bottom margin */
}

/* Footer links */
.footer-links {
    list-style: none; /* Remove default list style */
    padding: 0; /* Remove default padding */
}

.footer-links li {
    margin-bottom: 10px; /* Bottom margin for each link */
}

.footer-links a {
    color: #a0aec0; /* Link color */
    text-decoration: none; /* Remove underline */
    transition: color 0.3s ease; /* Smooth color transition */
}

.footer-links a:hover {
    color: #cbd5e0; /* Hover color */
}

/* Footer contact icons */
.footer-contact-icon {
    margin-bottom: 8px; /* Bottom margin for each icon */
    display: flex; /* Use flexbox for icon and text alignment */
    align-items: center; /* Align items vertically */
}

.footer-contact-icon i {
    margin-right: 10px; /* Right margin for icon */
}

/* Footer copyright */
.footer-copyright {
    text-align: center; /* Center align content */
    margin-top: 40px; /* Top margin */
    font-size: 14px; /* Font size */
    color: #a0aec0; /* Text color */
}

/* Responsive adjustments */
@media screen and (max-width: 768px) {
    
    .container{
        display:flex;
        flex-direction:column;
    }
    .img{
        display: none;
    }
    .footer-section{
        text-align:center;
    }
    .footer-links{
        text-align:center !important; 
    }
    .footer-section:nth-child(2) {
        text-align: center;
    }
    /* Ajoutez ceci pour centrer les liens de la section "Contactez nous" */
    .footer-section:nth-child(2) .footer-links {
        margin: 0 auto;
        text-align: center;
}

    </style>
</head>
<body>
    <!-- Your content here -->

<footer class="footer">
    <div class="container mx-auto">
        <img src="{{ asset('images/fslogo.png') }}" alt="University Logo" class="img" style="max-width: 200px; height: auto; float: left; margin-right: 20px;"> <!-- Adjusted logo size -->

        <div class="footer-grid grid grid-cols-1 lg:grid-cols-3 gap-8 px-4 py-6 lg:py-8">
            <div class="footer-section">

                <h2>Guide de l'étudiant</h2>
                <ul class="footer-links">
                    <li><a href="http://www.ucd.ac.ma/">جامعة شعيب الدكالي الجديدة</a></li>
                    <li><a href="http://www.enssup.gov.ma/">وزارة التعليم العالي</a></li>
                    <li><a href="https://www.men.gov.ma/">وزارة التربيــة الوطنيــــة</a></li>
                    <li><a href="http://www.service-public.ma/">الخدمات العمومية بالمغـرب</a></li>
                    <li><a href="http://www.maroc.ma/">بوابـة المغــرب الوطنـيـــة</a></li>
                    <li><a href="http://www.fm6education.ma/portal/">مؤسـسـة محمـد السـادس</a></li>
                    <li><a href="http://alwadifa-maroc.com/">موقع المباريات</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Contactez nous</h2>
                <ul class="footer-links">
                    <li>
                        <div class="footer-contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>Faculté des sciences.<br>Route Ben Maachou, 24000, El Jadida, Maroc</div>
                        </div>
                    </li>
                    <li>
                        <div class="footer-contact-icon">
                            <i class="fas fa-phone"></i>
                            <div>0523584754</div>
                        </div>
                    </li>
                    <li>
                        <div class="footer-contact-icon">
                            <i class="fas fa-envelope"></i>
                            <div><a href="mailto:boutkhoum.o@ucd.ac.ma">boutkhoum.o@ucd.ac.ma</a></div>
                        </div>
                    </li>
                    <li>
                        <div class="footer-contact-icon">
                            <i class="fas fa-clock"></i>
                            <div>Lundi au vendredi : 9.00 à 18.00</div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="footer-section">
                <h2>Legal</h2>
                <ul class="footer-links">
                    <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                    <li><a href="#" class="hover:underline">Licensing</a></li>
                    <li><a href="#" class="hover:underline">Terms & Conditions</a></li>
                </ul>
            </div>
        </div>
        <!-- Copyright -->
        <div class="footer-copyright">
            © 2024 <a href="/" class="hover:underline">FS El jadida™</a>. All Rights Reserved.
        </div>
    </div>
</footer>

</body>
</html>
