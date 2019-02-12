<form action = "../database/alunos/update.php" method = "POST" class="row"> 

    <div class= "input field col s12">
      <input type="hidden" name="id" value="<?=$id ?>">
    </div>

    <div class= "input field col s12">
    <label>Nome</label> 
    <input type="text" name="nome" value="<?=$values['nome'] ?>" required>
    </div>

    <div class= "input field col s12">
    <label>Telefone</label> 
    <input type="tel" name="tel" value="<?=$values['tel'] ?>" required>
    </div>

    <div class= "input field col s12">
    <label>Email</label> 
    <input type="text" name="email" value="<?=$values['email'] ?>" required>
    </div>

    <div class= "input field col s12">
    <label>Modalidade</label> 
    <input type="text" name="modalidade" value="<?=$values['modalidade'] ?>" required>
    </div>
    <div class= "input field col s12">
    <input type="submit"  value="Editar" class="btn-small">
    <a href="home.php"> <input type="button"  value="Voltar" class="btn-small"></a>
    </div>

</form>