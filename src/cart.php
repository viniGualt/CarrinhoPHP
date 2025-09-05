<?php

declare(strict_types=1);

require 'Product.php';

class Cart
{
    private array $items = [];
    private array $productList;

    public function __construct()
    {
        $this->productList = [
            new Product(id: 1, name: 'Camiseta', price: 59.90, stock: 10),
            new Product(id: 2, name: 'Calça Jeans', price: 129.90, stock: 5),
            new Product(id: 3, name: 'Tênis', price: 199.90, stock: 3),
        ];
    }

    public function addProduct(int $productId, int $quantity): void
    {
        $product = $this->findProduct(productId: $productId);

        if ($product === null) {
            echo "Produto não encontrado.<br>";
            return;
        }

        if ($quantity > $product->stock) {
            echo "Estoque insuficiente para $product->name. (Estoque atual: $product->stock)<br>";
            return;
        }

        foreach ($this->items as $id => $item) {
            if ($item['product']->id === $productId) {
                $this->items[$id]['quantity'] += $quantity;
                $this->items[$id]['subtotal'] = $this->items[$id]['quantity'] * $product->price;
                $product->stock -= $quantity;
                echo "Produto {$product->name} atualizado no carrinho.<br>";
                return;
            }
        }

        $this->items[] = [
            'product' => $product,
            'quantity' => $quantity,
            'subtotal' => $quantity * $product->price
        ];

        $product->stock -= $quantity;
        echo "Produto {$product->name} adicionado ao carrinho.<br>";
    }

    public function removeProduct(int $productId): void
    {
        foreach ($this->items as $index => $item) {
            if ($item['product']->id === $productId) {
                $item['product']->stock += $item['quantity'];
                unset($this->items[$index]);
                echo "Produto removido do carrinho.<br>";
                return;
            }
        }
        echo "Produto não encontrado no carrinho.<br>";
    }

    public function listItems(?string $coupon = null): float
    {
        if (empty($this->items)) {
            echo "Carrinho vazio.<br>";
            return 0;
        }

        echo "<h4>Itens no carrinho:</h4>";
        $total = 0;
        foreach ($this->items as $item) {
            echo "- {$item['product']->name} | Qtd: {$item['quantity']} | Subtotal: R$ {$item['subtotal']}<br><br>";
            $total += $item['subtotal'];
        }

        if (isset($coupon)) {
            $total = $this->applyCoupon($total, $coupon);
        }

        echo "- Total: R$ {$total} <br>";

        return $total;
    }

    private function applyCoupon(float $total, ?string $coupon): float
    {
        if ($coupon === "DESCONTO10") {
            echo "Cupom DESCONTO10 aplicado!<br><br>";
            echo "- <s>Total: R$ $total</s>";
            return round($total * 0.9, 2);
        }
        echo "O cupom que está tentando utilizar é inválido.<br><br>";
        return $total;
    }

    private function findProduct(int $productId): ?Product
    {
        foreach ($this->productList as $product) {
            if ($product->id === $productId) {
                return $product;
            }
        }
        return null;
    }

    public function getStock(int $productId): ?int
    {
        $product = $this->findProduct($productId);
        if ($product !== null) {
            return $product->stock;
        }
        return null;
    }
}
