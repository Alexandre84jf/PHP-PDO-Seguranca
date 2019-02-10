<form action = "../database/modalidades/update.php" method="POST">
    
   <div class="input-field col s12">
        <input type="hidden" name="id" value="<?=$values['id'] ?>" id="id">
      
     </div>
    
     <div class="input-field col s12">
        <input type="text" name="modalidade" value="<?=$values['modalidade'] ?>" id="mensalidade" maxlength="50" required>
        <label for="modalidade">Digite a modalidade</label>
     </div>
    
     <div class="input-field col s12">
        <input type="number" name="mensalidade" value="<?=$values['mensalidade'] ?>" id="mensalidade" maxlength="10" required step="0.50" min="0.50">
        <label for="mensalidade">Digite a mensalidade</label>
     </div>
    
     <div class="input-field col s12">
        <input type="submit" value ="Alterar" class="btn">
        <a href="modalidades.php"><input type="button" value ="Limpar" class="btn red"></a>  
     </div>
</form>