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
      
      echo "</tr>";

   
    endforeach;   
   }
   public function update($modalidade, $mensalidade, $id)
   {

   }
    
   public function delete($id)
   {


   }
}