<?php

class ServiceProduct
{
    private $db;
    private $product;

    public function __construct(IConn $db, IProduct $product)
    {
        $this->db = $db->connect();
        $this->product = $product;
    }

    public function list()
    {
        $query = "SELECT * FROM `produtos`";

        $stmt = $this->db->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $query = "INSERT INTO `produtos` (`nome`, `descricao`) VALUE (:nome, :descricao);";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->product->getNome());
        $stmt->bindValue(':descricao', $this->product->getDescricao());
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function update()
    {
        $query = "UPDATE `produtos` SET `nome` = :nome, `descricao` = :descricao where `id` = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':nome', $this->product->getNome());
        $stmt->bindValue(':descricao', $this->product->getDescricao());
        $stmt->bindValue(':id', $this->product->getId());

        $ret = $stmt->execute();

        return $ret;
    }

    public function delete()
    {
        $query = "DELETE FROM `produtos` WHERE `id` = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id',$this->product->getId());
        $ret = $stmt->execute();

        return $ret;
    }

    public function findById($id)
    {
        $query = "SELECT * FROM `produtos` WHERE `id` = :id;";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}