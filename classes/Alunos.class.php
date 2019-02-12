<?php
session_start();
require_once 'CrudAlunos.php';

Class Alunos extends Connection implements CrudAlunos
{
private $id;
private $nome;
private $tel;
private $email;
private $modalidade;

protected function getId()
{
    return $this->id;
}

protected function setId($id)
{
    $this->id = $id;

}

protected function getNome()
{
    return $this->nome;

}

protected function setNome($nome)
{
    $this->nome = $nome;

}

protected function getTel()
{
    return $this->tel;

}

protected function setTel($tel)
{
    $this->tel = $tel;

}

protected function getEmail()
{
    return $this->email;

}

protected function setEmail($email)
{
    $this->email = $email;

}
protected function getModalidade()
{
    return $this->modalidade;

}

protected function setModalidade($modalidade)
{
    $this->modalidade = $modalidade;

}

public function dadosFormulario($nome,$tel, $email, $modalidade)
{

    $this->setNome($nome);
    $this->setTel($tel);
    $this->setEmail($email);
    $this->setModalidade($modalidade);

}

public function dadosDaTabela($id)
{
    $conn = $this->connect();
    $this->setId($id);
    $_id = $this->getId();

    $sql = "SELECT * FROM tb_alunos WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_id);
    $stmt->execute();

    $result = $stmt->fetchAll();
    foreach($result as $values):
    
        require_once '../forms/form-edit-alunos.php';

    endforeach;


}

//metodos da Interface
    public function create()
    { 
        
        $nome       = $this->getNome();
        $tel        = $this->getTel();
        $email      = $this->getEmail();
        $modalidade = $this->getModalidade();

        $conn  = $this->connect();
        $sql = "INSERT INTO tb_alunos values (default, :nome, :tel, :email, :modalidade)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':tel', $tel);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':modalidade', $modalidade);

        if($stmt->execute()):
            $_SESSION['sucesso'] = "ALUNO INSERIDO COM SUCESSO";
            $destino = header("LOCATION:../../public/modalidades.php");
        
        else:
            $_SESSION['erro'] = "FALHA AO INSERIR O ALUNO, VERIFIQUE COM O SUPORTE!";
            $destino = header("LOCATION:../../public/modalidades.php");
        endif;
    }    

    public function read($search)
    {
        $conn = $this->connect();
        $search = $search . "%";
        $sql = "SELECT tb_alunos.nome,tb_alunos.id, tb_alunos.tel, tb_alunos.email, tb_modalidades.modalidade,
        tb_modalidades.mensalidade from tb_alunos join tb_modalidades 
        on tb_modalidades.id = tb_alunos.modalidade
        WHERE tb_modalidades.modalidade LIKE :search";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":search", $search);
        $stmt->execute();

        $result = $stmt->fetchAll();

        foreach($result as $values):

            $this->setId($values['id']);
            $id = $this->getId();

            echo '<tr>';
            echo '<td>' .$values['nome'].       '</td>';     
            echo '<td>' .$values['tel'].        '</td>';  
            echo '<td>' .$values['email'].      '</td>';      
            echo '<td>' .$values['modalidade']. '</td>';  
            echo '<td>' .$values['mensalidade'].'</td>';  

            echo "<td><a href='edit-alunos.php?id=$id' class='btn btn-small'>Editar <td>";
            echo "<td><a href='../database/alunos/delete.php?id={$this->getId()}' class='btn btn-small'>Deletar <td>";
            echo '</tr>';
        endforeach;
    }
    public function update($nome, $email,$tel, $modalidade, $id)
    {
        $conn = $this->connect();

        $this->setNome(strtoupper($nome));
        $this->setTel(strtoupper($tel));
        $this->setEmail(strtoupper($email));
        $this->setModalidade(strtoupper($modalidade));
        $this->setId($id);

        $_nome       = $this->getNome();
        $_tel        = $this->getTel();
        $_email      = $this->getEmail();
        $_modalidade = $this->getModalidade();
        $_id         = $this->getId();

        $sql = "UPDATE tb_alunos set nome =:nome, tel = :tel, email = :email, modalidade = :modalidade
                where id = :id";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $_nome);   
        $stmt->bindParam(':tel', $_tel);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':modalidade', $_modalidade);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();

        $destino = header('LOCATION:../../public/home.php');

    }
    public function delete($id)
    {
        $conn = $this->connect();
        $this->setId($id);
        $_id  = $this->getId();

        $sql  = "DELETE FROM tb_alunos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $_id);
        $stmt->execute();

        $destino = header('LOCATION:../../public/home.php');
    }





}