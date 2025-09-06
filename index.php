<?php

declare(strict_types=1);

require './src/cart.php';

$cart = new Cart();

echo "<h2>Simulação do Carrinho de Compras</h2>";

echo "<h4>Caso 1 — Adicionando produto id=1, quantidade=2</h4>";
echo "Estoque atual do produto Camiseta: {$cart->getStock(1)}<br><br>";
$cart->listItems();
echo "<br>";
$cart->addProduct(productId: 1, quantity: 2);
$cart->listItems();
echo "<br>Estoque atual do produto Camiseta: {$cart->getStock(1)}<br>";
echo "<hr>";

echo "<h4>Caso 2 — Tentando adicionar produto id=3, quantidade=10 (além do estoque)</h4>";
$cart->listItems();
echo "<br>";
$cart->addProduct(productId: 3, quantity: 10);
$cart->listItems();
echo "<hr>";

echo "<h4>Caso 3 — Adicionando produto id=2, quantidade=1 e depois removendo</h4>";
echo "Estoque atual do produto 'Calça Jeans': {$cart->getStock(2)}<br>";
$cart->listItems();
echo "<br>";
$cart->addProduct(productId: 2, quantity: 1);
echo "<br>Estoque atual do produto 'Calça Jeans': {$cart->getStock(2)}<br>";
$cart->listItems();
echo "<br>";
$cart->removeProduct(2);
echo "<br>Estoque atual do produto 'Calça Jeans': {$cart->getStock(2)}<br>";
$cart->listItems();
echo "<hr>";

echo "<h4>Caso 4 — Aplicando cupom DESCONTO10</h4>";
$cart->listItems(coupon: "DESCONTO10");
echo "<hr>";

echo "<h4>Caso 5 — Aplicando cupom CUPOMINVALIDO</h4>";
$cart->listItems(coupon: "CUPOMINVALIDO");
echo "<hr>";
