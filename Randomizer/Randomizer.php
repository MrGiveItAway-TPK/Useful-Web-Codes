<?php

$data = ["Munes", "Muhammad", "Sara", "Abood", "As7ar", "Nardeen", "Mousa", "Wajdey", "Batoteh"];
$usedIndices = [];

class Randomizer {
    public $node;
    
    function __construct($node) {
        $this->node = $node;
    }
}

echo '<center><h1>Randomizer</h1></center>';

for ($i = 1; $i <= count($data); $i++) {
    $randomIndex = rand(0, count($data) - 1);
    
    while (in_array($randomIndex, $usedIndices)) {
        $randomIndex = rand(0, count($data) - 1);
    }
    
    $usedIndices[] = $randomIndex;
    $randomnode = $data[$randomIndex];
    
    $randomizer = new Randomizer($randomnode);
    
    echo "<center>{$i}. {$randomizer->node}</center><br><hr>";
    flush();
    ob_flush();
    sleep(1); // Remove this if you don't want to delay the output
}

?>