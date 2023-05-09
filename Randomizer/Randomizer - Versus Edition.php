<?php

$usedData = [];
$data = ["Munes", "Sara", "Batoteh", "Muhammad", "Ashar", "Wajdey"];

class Randomizer {
    public $node;

    function __construct($data) {
        $this->node = $data[array_rand($data)];
    }
}

echo '<center><h1>Randomizer - Versus Edition</h1></center>';
flush();
ob_flush();

$previousNode = null;
$i=1;
while (count($usedData) < count($data)) {
    $availableData = array_diff($data, $usedData);
    $randomizer = new Randomizer($availableData);

    if ($previousNode && $randomizer->node !== $previousNode) {
        echo "<center>{$i}. {$previousNode} <b style='color:red;'> VS </b> {$randomizer->node}</center><br><hr>";
		$i++;
        flush();
        ob_flush();
        sleep(1);
        $previousNode = null;
        array_push($usedData, $randomizer->node);
    } elseif (!$previousNode) {
        $previousNode = $randomizer->node;
        array_push($usedData, $previousNode);
    }
}

?>