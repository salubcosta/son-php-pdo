<?php
require_once "IConn.php";
require_once "Conn.php";
require_once "IProduct.php";
require_once "Product.php";
require_once "ServiceProduct.php";

$db = new Conn('localhost', 'son_php_pdo', 'root', '123');

$product = new Product;

// $product->setId(1)->setNome('PHP Orientado a Objetos e Design Pattern')->setDescricao('Curso de PHP');

// Produto para exclusão
$product->setId(4);

$service = new ServiceProduct($db, $product);

// echo "<pre>";
// print_r($service->list());
// echo "</pre>";


// $service->save();
// $service->update();
// $service->delete();

// echo "<hr><pre>";
// print_r($service->list());
// echo "</pre>";

echo "<hr><pre>";
print_r($service->findById(2));
echo "</pre>";