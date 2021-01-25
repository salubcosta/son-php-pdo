<?php


try{
    /**
     * Segue abaixo um exemplo de conexão com o banco de dados
     */
    $conn = new \PDO("mysql:host=localhost;dbname=son_php_pdo","root","123");

    // Query
    $query = "SELECT * FROM produtos";

    $stmt = $conn->query($query);

    /**
     * Posso trabalhar apenas com arrays associativos: PDO::FETCH_ASSOC
     */
    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    // Lendo dados do banco de dados - Exemplo
    // foreach($conn->query($query) as $value):
    //     echo $value['nome']."<br />";
    // endforeach;
    // print_r($return);
    
}catch(\PDOException $e){
    echo "Error: {$e->getMessage()}";
}
