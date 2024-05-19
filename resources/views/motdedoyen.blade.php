<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVENEMENTS</title>
</head>
@include('header')

<body>

    @extends('recherches.layout')

    @section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="row align-items-center">
                <div class="col-lg-3 bg-light p-4 rounded mt-3">
                    <div class="text-center">
                        <img src="{{ asset('images/fslogo.png') }}" alt="University Logo"
                            style="max-width: 150px; height: auto;">
                        <h2 class="fw-bold mt-3 mb-0">FS-UCD</h2>
                        <h6 class="fw-bold mb-3">FACULTÉ DES SCIENCES</h6>
                        <p class="mb-0">EL JADIDA</p>
                    </div>
                </div>
                <div class="col-lg-9">
                    <img src="{{ asset('images/MOT.jpeg') }}" alt="University Logo" class="img-fluid img-thumbnail"
                        style="width: 100%; height: 280px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-3 bg-light p-4 rounded">
            <div class="quick-access col-lg-9 ">
                <h2 class="mb-4 mt-4" style="font-size: 20px; color: #003366;">ACCÈS RAPIDES</h2>
                <div class="list-group">
                    <a href="{{ route('events') }}"
                        class="list-group-item list-group-item-action text-dark rounded-pill mb-2 ">Événements</a>
                    <a href="{{ route('articles') }}"
                        class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Articles</a>
                    <a href="{{ route('annonces') }}"
                        class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Annonces</a>
                    <a href="{{ route('departements') }}"
                        class="list-group-item list-group-item-action text-dark rounded-pill mb-2">Départements</a>
                </div>
            </div>

        </div>


        <div class="col-lg-9">
            <div class="card border-0 shadow-lg">
                <div class="card-header  text-white py-3" style="background-color:#001229">
                    <h2 class="card-title mb-0">MOT DE DOYEN</h2>
                    <p class="card-subtitle text-muted ">Thu Mar 14 2024 15:26</p>
                </div>
                <div class="card-body">
                    <div class="container mt-5">
                        <h1>Mot de Doyen</h1>
                        <p>La Faculté des Sciences d’El Jadida relevant de l’Université Chouaïb Doukkali est un
                            établissement à accès ouvert. Elle accueille les titulaires de baccalauréat scientifique et
                            technique ou d’un diplôme équivalent des régions de Berrchid, Settat, Sidi Bennour et El
                            Jadida. Sa mission est de contribuer à la création et à la transmission du savoir et des
                            connaissances et leurs diffusions.</p>
                        <p>Pour réussir cette mission, la faculté a la responsabilité de :</p>
                        <ul>
                            <li>Promouvoir un enseignement de haute qualité et d’offrir des formations adéquates et
                                adaptées aux besoins actuels et futurs du milieu socio-économique ;</li>
                            <li>Soutenir une recherche scientifique innovante axée sur les priorités nationales dans les
                                domaines des sciences et techniques ;</li>
                            <li>S’aligner aux normes internationales, en matière de formation académique et de recherche
                                scientifique.</li>
                        </ul>
                        <p>De ce fait, il appartient à tous les acteurs impliqués (Administratifs, Enseignants
                            Chercheurs et Etudiants) de consolider leurs efforts pour la réussite de cette tâche. Le but
                            est de développer des compétences futures et de favoriser l’émergence de jeunes talents
                            hautement qualifiés pouvant faire face aux difficultés et aux défis du monde actuel en
                            matière de développement scientifique et d’ouverture sur leur milieu.</p>
                        <p>La Faculté des Sciences d’El Jadida est déterminée à mettre l’accent sur les domaines des
                            sciences et techniques, de l’environnement, du digital et du numérique. Cet objectif ne peut
                            être atteint que par l’amélioration des conditions de travail et d’encadrement, la mise à
                            disposition des moyens adéquats et le développement des liens avec le secteur
                            socio-économique de la région.</p>
                        <p>Les étudiants occupent une place centrale dans les préoccupations de l’établissement qui
                            œuvre pour l’amélioration de leur taux de réussite en mettant à leur disposition les moyens
                            nécessaires de communication et d’information, en renforçant la pertinence de leur
                            orientation et en facilitant leur intégration dans le milieu universitaire. La Faculté des
                            Sciences d’El Jadida est le symbole d’une institution ouverte sur toutes les cultures et
                            nationalités (le nombre d’étudiants étrangers inscrits à l’établissement en témoigne).</p>
                        <p>Depuis sa création, la Faculté des Sciences d’El Jadida mène une politique d’ouverture et de
                            partenariat en matière de formation et de recherche. Elle œuvre en permanence vers le
                            développement et la consolidation des liens avec des universités nationales et
                            internationales afin de contribuer à l'avancée des connaissances et à l’identification des
                            problèmes scientifiques et technologiques de demain.</p>
                        <p>Notre établissement prône l’ouverture, l’excellence, la modernité, et l’innovation comme
                            principaux leviers pour la réussite de la mise en application du plan national
                            d’accélération de la transformation de l’écosystème d’enseignement supérieur, de la
                            recherche scientifique et de l’innovation «Pacte ESRI à l’horizon 2030» lancé par le
                            Ministère de tutelle en 2023/2024.</p>
                        <p>Ce portail web est un espace d’information et un outil de communication. Il vise à offrir aux
                            visiteurs toute l’information dont ils ont besoin et permet à notre Faculté d’être visible
                            et à l’écoute de tout son public.</p>
                    </div>
                    <img src="{{ asset('images/MOT.jpeg') }}" class="img-fluid mb-3 rounded">
                </div>
                <div class="card-footer bg-light border-0 py-3">
                    <a href="{{ route('sliders') }}" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    @include('footer')
    @endsection

</body>

</html>