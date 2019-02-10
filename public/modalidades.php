<?php 
require_once'../config/header.inc.html'; 
session_start();
?>

<div class="row-container">
    <h5 class="light">Cadastro de modalidades</h5>
        <?php 
        require_once'../forms/form-add-modalidade.php';
         if(isset($_SESSION['sucesso'])):   
            echo "<p class='center green lighten-2  white-text' padding:10px>";
            echo $_SESSION['sucesso'];
            unset($_SESSION['sucesso']);
            echo "</p>";
         
         else:
            echo "<p class='center red lighten-2  whit-text' padding:10px>";
            echo  $_SESSION['erro'];
            unset($_SESSION['erro']);
            echo "</p>";
         endif;
        ?>
</div>
         <div class="row container">
         <div class="col s12">
            <h5 class="light">Modalidades Cadastradas</h5><hr>
            <table class="striped">
                <thread>
                 <tr><th>ID</th><th>Modalidade</th><th>Mensalidade</th><th>Ações</th><th></th><th></th>   
                </thread>
                 <tbody> 
                 <?php
                    require_once'../database/modalidades/read.php';
                 ?>
                </tbody>
            
            </table>
         </div>
         </div>


<?php require_once'../config/footer.inc.html' ?>