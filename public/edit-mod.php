<?php 
require_once"../config/header.inc.html";
?>

<div class="row container">
    <div class="col s12">
        <h5>Editar</h5>
        <?php 
         require_once "../classes/autoload.php";
         $id = filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
         $edit = new Modalidades();
         $edit->dadosTabela($id);     
           
        ?>
    </div>
</div>

<?php require_once"../config/footer.inc.html" ?>