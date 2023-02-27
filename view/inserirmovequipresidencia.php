<?php

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/MovVeicResidenciaCTR.class.php');

if (isset($info)):

    $movVeicResidenciaCTR = new MovVeicResidenciaCTR();
    echo $movVeicResidenciaCTR->salvarMovVeicResidencia($info);

endif;
