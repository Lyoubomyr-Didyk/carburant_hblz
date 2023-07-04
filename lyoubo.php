<?php

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

<form method="get">
    <button class="b-10" type="button">
        Ok
    </button>
    <select class="s-10" name="get_year">
        <option value="service">Année: </option>
        <option value="2007">2007</option>
        <option value="2014">2014</option>
        <option value="2023">2023</option>
    </select>
</form>
<script>
    document.querySelector('.b-10').addEventListener('click', () => {
        let data = document.querySelector('.s-10').value;
        document.location.href = '?get_year=' + data; // redirect with selected year as a query parameter
        document.querySelector('.out-10').innerHTML = data;
    });
</script>


<div class="baton">
    <canvas id="myChart"></canvas>
</div>


<!-- ------------------------------------------------------------------------------------------------------------- -->

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