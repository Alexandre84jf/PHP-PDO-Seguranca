<?php
require_once "../config/header.inc.html";
?>
<div class= "row container">
    <div class="col s12">
           <h5>Cadastro de alunos</h5> <hr>
            <?php
            $modalidade = filter_input(INPUT_GET,'id', FILTER_SANITIZE_SPECIAL_CHARS);
            require_once "../forms/form-add-aluno.php";
            ?>
    </div>
</div>

<?php
require_once "../config/footer.inc.html";
?>


