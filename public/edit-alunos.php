<?php
require_once '../config/header.inc.html';?>

<div class= "row container">
    <h5>Editar alunos</h5>
    <?php
        require_once '../classes/autoload.php';
        
        $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
        $editAluno = new Alunos();
        $editAluno->dadosDaTabela($id);
    ?>

<div>



<?php require_once '../config/footer.inc.html'; ?>