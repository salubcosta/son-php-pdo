<?php


try
{
    $conn = new \PDO("mysql:host=localhost;dbname=son_php_pdo","root","123");

    // Query
    $query = "SELECT * FROM produtos where id=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();

    $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($arr);
    echo "</pre>";

}catch(\PDOException $e){
    echo "Error: {$e->getMessage()}";
}
