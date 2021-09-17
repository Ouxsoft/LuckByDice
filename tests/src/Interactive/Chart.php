<?php
namespace Ouxsoft\LuckByDiceTests\Feature\Statistics;

require __DIR__ . '/../../../vendor/autoload.php';

use Ouxsoft\LuckByDice\Factory\TurnFactory;

$turn = TurnFactory::getInstance();

$iterations = 10000;

$turn->setNotation('10d10');

$datasets = [];

// Luck
$datasets['luck']['label'] = 'Luck';
$datasets['luck']['backgroundColor'] = 'rgb(253, 199, 67)';
$datasets['luck']['borderColor'] = 'rgb(253, 199, 67)';
$datasets['luck']['data'] = [];

// Bonus
$datasets['bonus']['label'] = 'Bonus';
$datasets['bonus']['backgroundColor'] = 'rgb(231, 208, 176)';
$datasets['bonus']['borderColor'] = 'rgb(231, 208, 176)';
$datasets['bonus']['data'] = [];


// Total
$datasets['total']['label'] = 'Total';
$datasets['total']['backgroundColor'] = 'rgb(102, 162, 41)';
$datasets['total']['borderColor'] = 'rgb(102, 162, 41)';
$datasets['total']['data'] = [];

// Min
$datasets['min']['label'] = 'Min';
$datasets['min']['backgroundColor'] = 'rgb(21, 110, 182)';
$datasets['min']['borderColor'] = 'rgb(21, 110, 182)';
$datasets['min']['data'] = [];

// Max
$datasets['max']['label'] = 'Max';
$datasets['max']['backgroundColor'] = 'rgb(224, 74, 6)';
$datasets['max']['borderColor'] = 'rgb(224, 74, 6)';
$datasets['max']['data'] = [];


$rolls = [];

// add rows
for($i = 1; $i <= $iterations; $i++){
    $turn->roll();
    $rolls[] = $i;
    $datasets['min']['data'][] = $turn->getMinPotential();
    $datasets['max']['data'][] = $turn->getMaxPotential();
    $datasets['total']['data'][] = $turn->getTotal();
    $datasets['luck']['data'][] = $turn->getLuck();
    $datasets['bonus']['data'][] = $turn->getExtraBonus();
}

$labels = implode(',', $rolls);

$html = <<<HTML
<!doctype html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <form action="/api/turn" method="get">
        <input type="text" name="notation"/>
        <input type="number" name="iterations" value="10000"/>
        <input type="number" name="luck" value="0"/>
    </form>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</body>
<script>
    const labels = [
        {$labels}
    ];
    const data = {
        labels: labels,
        datasets: [
            {{datasets}}
        ]
    };
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'LuckByDice {$turn->getNotation()} x{$iterations}'
                }
            }
        },
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>
</html>
HTML;

$json = '';
foreach($datasets as $dataset){
    $json .= json_encode($dataset) . ',';
}

$html = str_replace("{{datasets}}", $json, $html);

echo $html;

