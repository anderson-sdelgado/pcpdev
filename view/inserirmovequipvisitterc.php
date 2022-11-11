<?php

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/MovVeicVisitTercCTR.class.php');

if (isset($info)):

    $movVeicVisitTercCTR = new MovVeicVisitTercCTR();
    echo $movVeicVisitTercCTR->salvarMovVeicVisitTerc($info);

endif;
