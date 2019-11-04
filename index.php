<?php

require_once 'CaixaEletronico.php';

$caixaEletronico = new CaixaEletronico();
echo $caixaEletronico->efetuarSaque('a');

?>