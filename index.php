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
</head>


<?php
if (isset($_GET['get_year'])) {
    $selectedYear = $_GET['get_year'];
    // Utilisez la valeur sélectionnée pour construire votre requête SQL
    $query = "SELECT nom, CAST(avg(valeur) AS numeric(10,3)) FROM prix
              JOIN carburant c ON c.id = prix.carburant_id
              WHERE EXTRACT(year FROM date) = $selectedYear GROUP BY nom";
    $results = request($conn, $query);

    $price = array();
    $fuel = array();

    foreach ($results as $data) {
        $price[] = $data['avg'];
        $fuel[] = $data['nom'];
    }
}
?>



<?php
 require "connection.php";

if (isset($_GET['get_year'])) {
    $selectedYear = $_GET['get_year'];

$query = "SELECT nom, CAST(avg(valeur) AS numeric(10,3)) FROM  prix
JOIN carburant c on c.id = prix.carburant_id
WHERE  EXTRACT(year FROM date) = $selectedYear GROUP BY nom";
$results = request($conn, $query);

foreach ($results as $data)
{
    $price[] = $data ['avg'];
    $fuel[] = $data ['nom'];
}
}
?>


<body>

     <!-------------------- header ---------------------->
      <div class="wrapper">
        <header class="container">
         <nav class="nav_bar">
            <img class="logo" src="/img/vector.png" alt="logo">
            <ul class="nav_item list">
                <li class="navigation_text"><a class="nav_link link" id="bt" href="">Carte</a></li>
                <li class="navigation_text"><a class="nav_link link" href="">Graphique</a></li>
                <li class="navigation_text"><a class="nav_link link" href="">Évolution du prix</a></li>
            </ul>
         </nav>
        </header>
      </div>
     <!-------------------- / header ---------------------->

     <!-------------------- map ---------------------->
     <main>
    <div class="hero">
        <div class="container">
            <p class="text-acuil"> Bienvenue sur notre site dédié à l'information sur le coût du carburant. Nous sommes ici pour vous tenir informé des dernières évolutions et tendances en matière de prix afin de vous aider à prendre des décisions pour votre budget et vos déplacements. </p>
        </div>
    </div>

    <div class="map">
     <section class="container">
        <p class="text_map">Veuillez choisir les informations désirées parmi les options disponibles dans les listes déroulantes.</p>
            <form>
                <button type="button">ok</button>
             <select>
              <option value="service">Adresse</option>
              <option value="html">HTML</option>
              <option value="css">CSS</option>
              <option value="php">PHP</option>
              <option value="js">JavaScript</option>
             </select>
             <select>
                <option value="service">Carburant</option>
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="php">PHP</option>
                <option value="js">JavaScript</option>
               </select>
               <select>
                <option value="service">Service</option>
                <option value="html">HTML</option>
                <option value="css">CSS</option>
                <option value="php">PHP</option>
                <option value="js">JavaScript</option>
               </select>
            </form>
     </section>
    </div>


    <!-------------------- courbe  ---------------------->
    <div class="courbe">
    <section class="container">
        <p class="title">Evolution du prix des carburants de 2007 à 2023</p>
        <p class="text_p">L'évolution du prix des carburants de 2007 à 2023 a été caractérisée par des fluctuations significatives. Au cours de cette période, les prix des carburants ont connu des augmentations et des baisses, principalement influencées par les variations des prix du pétrole brut et les facteurs économiques mondiaux.</p>
        <p class ="text_p text_bottom"> Cependant, cette période de baisse n'a pas duré longtemps. À partir de 2016, les prix des carburants ont recommencé à augmenter, principalement en raison de la reprise de la demande mondiale de carburants. Les taxes gouvernementales et les politiques de réglementation ont également eu une influence sur les variations des prix des carburants dans certains pays.</p>
    </section>
    </div>


    <!-------------------- batons  ---------------------->

    <div class="courbe">
        <section class="container">
            <p class="title">Graphique en bâton représentant le prix moyen des 6 types de carburant </p>

            <form method=post action=add_event.php id=testForm>
                <button class="b-10" type="button">
                    Ok
                </button>
                <select class="s-10">
                    <option value="service">Année: </option>
                    <option value="2007">2007</option>
                    <option value="2014">2014</option>
                    <option value="2023">2023</option>
                </select>
                <div class="out-block out-10"></div>
            </form>
            <script>
                document.querySelector('.b-10').addEventListener('click', () => {
                    let data = document.querySelector('.s-10').value;
                    document.querySelector('.out-10').innerHTML = data;
                });
            </script>


            <div class="baton">
                <canvas id="myChart"></canvas>
            </div>
        </section>
    </div>
    </main>

    <!-------------------- footer ---------------------->
    <footer>

    </footer>

     <script>
         // === include 'setup' then 'config' above ===
         const labels = <?php echo json_encode($fuel) ?>;
         const data = {
             labels: labels,
             datasets: [{
                 label: '',
                 data: <?php echo json_encode($price) ?>,
                 backgroundColor: [
                     'rgba(255, 99, 132, 0.3)',
                     'rgba(255, 159, 64, 0.3)',
                     'rgba(98,236,20,0.3)',
                     'rgba(75, 192, 192, 0.3)',
                     'rgba(54, 162, 235, 0.3)',
                     'rgba(153, 102, 255, 0.3)',
                     'rgba(201, 203, 207, 0.3)'
                 ],
                 borderColor: [
                     'rgb(255, 99, 132)',
                     'rgb(255, 159, 64)',
                     'rgb(98,236,20)',
                     'rgb(75, 192, 192)',
                     'rgb(54, 162, 235)',
                     'rgb(153, 102, 255)',
                     'rgb(201, 203, 207)'
                 ],
                 borderWidth: 1
             }]
         };

         const config = {
             type: 'bar',
             data: data,
             options: {
                 scales: {
                     y: {
                         beginAtZero: true
                     }
                 }
             },
         };

         var myChart = new Chart(
             document.getElementById('myChart'),
             config
         );
     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>