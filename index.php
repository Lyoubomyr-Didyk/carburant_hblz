<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBLZ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/modern-normalize/1.1.0/modern-normalize.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="" href="chart.js">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sofia+Sans+Condensed:wght@1;400;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

</head>


 <?php
  require "connection.php";
  ?>

<body>

<!----------------------------------------------------------- header -------------------------------------------------->
<div class="wrapper">
    <header class="container">
        <nav class="nav_bar">
            <img class="logo" src="/img/vector.png" alt="logo">
            <ul class="nav_item list">
                <li class="navigation_text"><a class="nav_link link" id="bt" href="#part1">Carte</a></li>
                <li class="navigation_text"><a class="nav_link link" href="#part2">Graphique</a></li>
                <li class="navigation_text"><a class="nav_link link" href="#part3">Évolution du prix</a></li>
            </ul>
        </nav>
    </header>
</div>
<!-------------------------------------------------------- / header --------------------------------------------------->

<!--------------------------------------------------------- map ------------------------------------------------------->
<main>
    <div class="hero">
        <div class="container" >
            <p class="text-acuil"> Bienvenue sur notre site dédié à l'information sur le coût du carburant. Nous sommes ici pour vous tenir informé des dernières évolutions et tendances en matière de prix afin de vous aider à prendre des décisions pour votre budget et vos déplacements. </p>
        </div>
    </div>

    <div class="map back-gr">
        <section class="container" id="part1">
            <p class="text_map">Veuillez choisir les informations désirées parmi les options disponibles dans les listes déroulantes.</p>

            <form>
                    <svg width="36" height="33" class="" type="button" >
                        <use href="./img/sprite.svg#icon-btn"></use>
                    </svg>

                <select class="select">
                    <option value="service">Carburant</option>
                    <option value="Gazole">Gazole</option>
                    <option value="SP95">SP95</option>
                    <option value="SP98">SP98</option>
                    <option value="E10">E10</option>
                    <option value="E85">E85</option>
                </select >
                <select class=select>
                    <option value="service">Service</option>
                    <option value="Station de gonflage">Station de gonflage</option>
                    <option value="Vente de gaz domestique">Vente de gaz</option>
                    <option value="Boutique alimentaire">Boutique alimentaire</option>
                    <option value="Lavage manuel">Lavage manuel</option>
                </select>
            </form>
            <?php
            require "hicham.php";
            ?>
        </section>
    </div>


    <!-------------------------------------------------- courbe  ------------------------------------------------------>
    <div class="back-gr" id="part2">
        <section class="container">
            <p class="title">Evolution du prix des carburants de 2007 à 2023</p>

            <?php
            require "zack.php";
            ?>

            <p class="text_p">L'évolution du prix des carburants de 2007 à 2023 a été caractérisée par des fluctuations significatives. Au cours de cette période, les prix des carburants ont connu des augmentations et des baisses, principalement influencées par les variations des prix du pétrole brut et les facteurs économiques mondiaux.</p>
            <p class ="text_p text_bottom"> Cependant, cette période de baisse n'a pas duré longtemps. À partir de 2016, les prix des carburants ont recommencé à augmenter, principalement en raison de la reprise de la demande mondiale de carburants. Les taxes gouvernementales et les politiques de réglementation ont également eu une influence sur les variations des prix des carburants dans certains pays.</p>
        </section>
    </div>


    <!--------------------------------------------------- batons  ----------------------------------------------------->

    <div class="back-gr">
        <section class="container" id="part3">
            <p class="title">Graphique en bâton représentant le prix moyen des différents types de carburant </p>
            <?php
            require "graphmoyprix.php";
            ?>
        </section>
    </div>
</main>

<!-------------------------------------------------------- footer ----------------------------------------------------->
<footer class="footer back">
    <div class="container footer-space">
        <svg width="73" height="106" class="logo-footer">
            <use href="./img/sprite.svg#icon-logo"></use>
        </svg>
        <a class="link space" href="https://twitter.com/" target="_blank">
            <svg width="46" height="46" class="">
                <use href="./img/sprite.svg#icon-twitter"></use>
            </svg>
            <p class="text" >@HBLZdata</p>
        </a>
        <a class="link space" href="mailto:info@devstudio.com" target="_blank">
            <svg width="45" height="45" class="icon-mail">
                <use href="./img/sprite.svg#icon-email"></use>
            </svg>
            <p class="text">HBLZgroup@gmail.com</p>
        </a>
        <p class="text data " style="color: #FFFFFF">@ HBLZ Data</p>
    </div>
</footer>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>