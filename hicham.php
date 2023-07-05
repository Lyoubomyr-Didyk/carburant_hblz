
<div class="container" id="map"></div>

<?php
$queryMap = $pdo->query(
    "SELECT latitude, longitude FROM point_de_vente
    WHERE ville = 'ANNECY'");

foreach ($queryMap as $data) {
    $latitude[] = $data['latitude'];
    $longitude[] = $data['longitude'];
};

$point = [];
for ($i=0;$i<12;$i++){
    $point[$i] = [$latitude[$i], $longitude[$i]];
};

$queryAdresse = $pdo->query(
    "SELECT adresse FROM point_de_vente
    WHERE ville = 'ANNECY'");

foreach ($queryAdresse as $data) {
    $adresse[] = $data['adresse'];
};

$arayAdresse = [];
for ($a=0;$a<12;$a++){
    $arayAdresse [$a] = [$adresse[$a]];
};

?>


<script>
    let coords = [];
    coords.push(<?php echo json_encode($point)?>);
    coords = coords[0];
    console.log(coords);

    let adresseMap = [];
    adresseMap.push(<?php echo json_encode($arayAdresse)?>);
    adresseMap = adresseMap[0];
    console.log(adresseMap);

    var map = L.map('map').setView([45.89860986946062, 6.12917203841142], 12);

    var CartoDB_VoyagerLabelsUnder = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_labels_under/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 20
    }).addTo(map);

    //coords = [[45.89856023085219, 6.117736246509577], [45.90706560732963, 6.113352659053238], [45.91763558459165, 6.128630520636682]];
    //areas
    noms = ["Prix carburant", "Prix carburant", "Prix carburant"]
    // rooms
    //
    //prix = ["1.25", "2.89", "5"]
    //outside

    //let l = coords.length;

    for (let i = 0; i < 12; i++) {
        //popus
        var pop = L.popup({
            closeOnClick: true
        }).setContent /* affiche ce mot ('Station essence');*/('<h2>adresse : ' + adresseMap[i] );
        //marqueur

        var marker = L.marker(coords[i]).addTo(map).bindPopup(pop);

        // //labels
        // var toollip = L.tooltip({
        //     permanent: true
        // }).setContent(rent[i]);
        //
        // marker.bindTooltip(toollip);
    }
</script>

