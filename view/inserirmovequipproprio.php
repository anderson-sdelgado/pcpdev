<?php

$info = filter_input_array(INPUT_POST, FILTER_DEFAULT);

require_once('../control/MovVeicProprioCTR.class.php');

if (isset($info)):

    $movVeicProprioCTR = new MovVeicProprioCTR();
    echo $movVeicProprioCTR->salvarMovVeicProprio($info);

endif;
