<?php
require_once '../../classes/autoload.php';

//Aplica um filtro nos dados vindos do formulario
$modalidade  = filter_input(INPUT_POST,'modalidade', FILTER_SANITIZE_SPECIAL_CHARS);
$mensalidade = filter_input(INPUT_POST,'mensalidade',FILTER_SANITIZE_SPECIAL_CHARS);

$newModalidade = new Modalidades();
$newModalidade->dadosFormulario($modalidade, $mensalidade);
$newModalidade->create();