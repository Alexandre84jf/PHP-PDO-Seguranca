<form action= "../database/alunos/create.php" method="POST" class= "row">
    <div class= "input-field col s12">
        <input type="text" name="nome" id="nome" required>  
        <label for="nome">Nome do aluno</label>  
     </div>
     
     <div class= "input-field col s12">
        <input type="text" name="tel" id="tel" required>  
        <label for="tel">Telefone do aluno</label>  
     </div>
     
     <div class= "input-field col s12">
        <input type="email" name="email" id="email" required>  
        <label for="email">Email do aluno</label>  
     </div>

     <div class= "input-field col s12">
        <input type="hidden" name="modalidade" id="modalidade" value="<?=$modalidade?>" required>  
     </div>

     <div class= "input-field col s12">
        <input type="submit" value="Salvar" class="btn">
        <input type="reset" value="Limpar" class="btn red">  

     </div>
     
     

</form>