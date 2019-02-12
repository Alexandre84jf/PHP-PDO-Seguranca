<?php

$id = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST,'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$tel = filter_input(INPUT_POST,'tel', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
$modalidade = filter_input(INPUT_POST,'modalidade', FILTER_SANITIZE_SPECIAL_CHARS);

require_once '../../classes/autoload.php';

$updateAlunos = new Alunos();
$updateAlunos->update($nome, $email, $tel, $modalidade, $id);

