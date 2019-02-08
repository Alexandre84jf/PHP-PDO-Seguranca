<?php

interface CrudModalidades
{   
    public function create();
    public function read();
    public function update($modalidade, $mensalidade, $id);
    public function delete($id);
}


