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

    <div class="map">
        <section class="container" id="part1">
            <p class="text_map">Veuillez choisir les informations désirées parmi les options disponibles dans les listes déroulantes.</p>
            <form>
                <button type="button">ok</button>
                <select>
                    <option value="service">Carburant</option>
                    <option value="Gazole">Gazole</option>
                    <option value="SP95">SP95</option>
                    <option value="SP98">SP98</option>
                    <option value="E10">E10</option>
                    <option value="E85">E85</option>
                </select>
                <select>
                    <option value="service">Service</option>
                    <option value="Station de gonflage">Station de gonflage</option>
                    <option value="Vente de gaz domestique">Vente de gaz</option>
                    <option value="Boutique alimentaire">Boutique alimentaire</option>
                    <option value="Lavage manuel">Lavage manuel</option>
                </select>
            </form>
        </section>
    </div>


    <!-------------------------------------------------- courbe  ------------------------------------------------------>
    <div class="courbe" id="part2">
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

    <div class="courbe">
        <section class="container" id="part3">
            <p class="title">Graphique en bâton représentant le prix moyen des différents types de carburant </p>
            <?php
            require "graphmoyprix.php";
            ?>
        </section>
    </div>
</main>

<!-------------------------------------------------------- footer ----------------------------------------------------->
<footer>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>