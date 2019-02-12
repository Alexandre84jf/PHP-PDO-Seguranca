<?php
session_start();
require_once 'CrudModalidades.php';

Class Modalidades extends Connection implements CrudModalidades{

   private $id;
   private $modalidade;
   private $mensalidade;
   
   protected function setId($id)
   {
      $this->id = $id;
   }

   protected function getId()
   {
      return $this->id;
   }

   protected function setModalidade($modalidade)
   {
      $this->modalidade = $modalidade;
   }

   protected function getModalidade()
   {
      return $this->modalidade;
   }

   protected function setMensalidade($mensalidade)
   {
      $this->mensalidade = $mensalidade;
   }

   protected function getMensalidade()
   {
      return $this->mensalidade;
   }

   //recebe dados do formulario
   public function dadosFormulario($modalidade, $mensalidade)
   {
        $this->setModalidade(strtoupper($modalidade));
        $this->setMensalidade(strtoupper($mensalidade));
   }

   public function dadosTabela($id)
   {
     $conn = $this->connect(); 
    
     $this->setId($id);
     $_id =  $this->getId();
   
     $sql  = "SELECT * FROM tb_modalidades where id = :id";
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(":id", $_id);
     $stmt->execute();
     
     $result = $stmt->fetchAll();

     foreach($result as $values):
     
      require_once "../forms/form-edit-mod.php";

   endforeach;

   }

   //metodos da interface CrudModalidades
   public function create()
   {    
       $modalidade  = $this->getModalidade();
       $mensalidade = $this->getMensalidade();

       $conn =  $this->connect();
       $sql  = "INSERT INTO tb_modalidades values(default,:modalidade, :mensalidade)";
       
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':modalidade', $modalidade);
       $stmt->bindParam(':mensalidade', $mensalidade);

       if($stmt->execute()):
       $_SESSION['sucesso'] = "CADASTRADO COM SUCESSO";
       $destino             = header("Location:../../public/modalidades.php");

       else:
       $_SESSION['erro'] = "MODALIDADE JÁ ESTA CADASTRADA!";
       $destino          = header("Location:../../public/modalidades.php");
      endif;

   }
   public function read()
   {
      $conn = $this->connect();
      $sql= "SELECT * FROM tb_modalidades ORDER BY id DESC";
      $stmt = $conn->prepare($sql);
      $stmt->execute();

      $result = $stmt->fetchAll();
      
      foreach($result as $values):
      $this->setId($values['id']);
      $this->setModalidade($values['modalidade']);
      $this->setMensalidade($values['mensalidade']);  
         
      $_id          = $this->getId();
      $_modalidade  = $this->getModalidade();
      $_mensalidade = $this->getMensalidade();

      echo "<tr>";
      
      echo "<td>$_id</td>";
      echo "<td>$_modalidade</td>"; 
      echo "<td>$_mensalidade</td>"; 
      echo "<td><a href='edit-mod.php?id=$_id'>Editar</a></td>";
      echo "<td><a href='/../database/modalidades/delete.php?id=$_id'>Deletar</a></td>";
      echo "<td><a href='new-aluno.php?id=$_id'>Novo aluno</a></td>";
      
      echo "</tr>";

   
    endforeach;   
   }
   public function update($modalidade, $mensalidade, $id)
   {
      $conn = $this->connect();
      $this->setModalidade(strtoupper($modalidade));
      $this->setMensalidade($mensalidade);
      $this->setId($id);

      $mod  = $this->getModalidade();
      $mens = $this->getMensalidade();
      $_id  = $this->getId();

      $sql  = "UPDATE tb_modalidades set modalidade = :mod, mensalidade = :mens WHERE id = :id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':mod', $mod);
      $stmt->bindParam(":mens", $mens);
      $stmt->bindParam(":id", $_id);
      $stmt->execute();

      $destino = header("LOCATION:../../public/modalidades.php");
   }
    
   public function delete($id)
   {
      $conn = $this->connect();
      
      $this->setId($id);
      $_id = $this->getId();

      $sql  = "DELETE FROM tb_modalidades WHERE id= :id";
      $stmt = $conn->prepare($sql);
      $stmt ->bindParam(":id", $_id);
      $stmt ->execute();

      $destino = header("LOCATION:../../public/modalidades.php");

   }
}