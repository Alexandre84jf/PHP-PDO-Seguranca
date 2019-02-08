<?php

Abstract Class Connection {

    private $servDB   = "mysql:host=localhost;dbname=db_pdo";
    private $user     = "alexandre";
    private $password = "private";

    protected function connect()
    {
       try{
        $conn = new PDO($this->servDB, 
                        $this->user,
                        $this->password);
        
        $conn->exec("set names utf8");
       
        return $conn;

       } 
       catch(PDOException $erro)
       {
        echo $erro->getMessage();
       }

    }
}