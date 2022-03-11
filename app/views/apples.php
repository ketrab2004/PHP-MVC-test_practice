<h1>APPLE PAGE</h1>

<?php
foreach ($data['apples'] as $apple):
    $apple = (object)$apple; // to object because ['this'] sucks
    $apple->weight /= 100;

    echo "{$apple->id}. a \"{$apple->type}\" apple weighing {$apple->weight}kg! <br />";
endforeach;