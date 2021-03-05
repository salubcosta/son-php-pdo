<?php

interface IProduct
{
    public function getId();
    public function setId($id);
    public function getNome();
    public function setNome($name);
    public function getDescricao();
    public function setDescricao($description);
}