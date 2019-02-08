
<!--formulario para adicionar modalidades -->
<form action = "../database/modalidades/create.php" method="POST" class="row">
    <div class="input-field col s12">
        <input type="text" name="modalidade" id="modalidade" maxlength="20" required autofocus>
        <label for="modalidades">Digite a modalidade</label>
     </div>

     <div class="input-field col s12">
        <input type="number" name="mensalidade" id="mensalidade" maxlength="10" required step="0.50" min="0.50">
        <label for="mensalidade">Digite a mensalidade</label>
     </div>
    
     <div class="input-field col s12">
        <input type="submit" value ="Cadastrar" class="btn">
        <input type="reset" value ="Limpar" class="btn red">  
     </div>
</form>