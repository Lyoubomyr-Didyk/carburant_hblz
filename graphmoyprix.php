
<?php

$query = $pdo->query("SELECT AVG(valeur), carburant.nom, extract(YEAR from date) FROM prix
    JOIN carburant ON prix.carburant_id = carburant.id
    AND extract(YEAR from date)=2007
GROUP BY carburant.nom, extract(year FROM DATE)");

$query2 = $pdo->query("SELECT AVG(valeur), carburant.nom, extract(YEAR from date) FROM prix
    JOIN carburant ON prix.carburant_id = carburant.id
    AND extract(YEAR from date)=2014
GROUP BY carburant.nom, extract(year FROM DATE)");

$query3 = $pdo->query("SELECT AVG(valeur), carburant.nom, extract(YEAR from date) FROM prix
    JOIN carburant ON prix.carburant_id = carburant.id
    AND extract(YEAR from date)=2023
GROUP BY carburant.nom, extract(year FROM DATE)");

foreach ($query as $data)
{
    $avg[]=$data['avg'];
    $extract[]=$data['extract'];

}
foreach ($query2 as $data2)
{
    $avg2[]=$data2['avg'];
    $extract2[]=$data2['extract'];
}
foreach ($query3 as $data3)
{
    $avg3[]=$data3['avg'];
    $extract3[]=$data3['extract'];
    $nom[]=$data3['nom'];
}
?>

<div class="container" style="width: 800px;">
<canvas id="barCanvasE10" aria-label="chart" role="img"></canvas>
</div>

<script>
    const barCanvasE10 = document.getElementById("barCanvasE10");
    const barChartE10 = new Chart(barCanvasE10,{
        type:"bar",
        data:{
            labels: <?php echo json_encode($nom)?>,
            datasets:[
                {
                    label: "2007",
                    data: <?php echo json_encode($avg)?>,
                },
                {
                    label: "2014",
                    data:<?php echo json_encode($avg2)?>
                },
                {
                    label: "2023",
                    data:<?php echo json_encode($avg3)?>
                }
            ]
        }
    })
</script>


