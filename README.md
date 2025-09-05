## Como rodar o projeto?

1. Certifique-se de que o XAMPP está instalado e rodando no seu computador. Você deve possuir o módulo "Apache" online (o fundo aparecerá verde claro).

2. Coloque a pasta do projeto dentro de C:\xampp\htdocs\carrinho.

3. Abra o navegador e acesse:

- http://localhost/carrinho/index.php


Você verá a simulação do carrinho de compras funcionando no navegador.

## Funcionalidades Implementadas

O sistema simula um carrinho de compras básico em PHP puro, utilizando arrays associativos e classes simples. Os métodos do sistema são:

- Adicionar produto ao carrinho

    - Verifica se o produto existe.

    - Verifica se há estoque suficiente.

    - Atualiza o carrinho e reduz o estoque do produto.

- Remover produto do carrinho
    - Verifica se o item existe no carrinho.

    - Atualiza o carrinho e devolve o estoque do produto.

- Listar itens do carrinho
    - Mostra nome do produto, quantidade, subtotal e total.

- Aplicar cupom de desconto
    - Cupom DESCONTO10 aplica 10% de desconto no total do carrinho.

    - Caso tente inserir outro cupom, retorna erro de "Cupom inválido"

## Limitações

- Não há nenhuma conexão com banco de dados, ao atualizar a página, o carrinho voltará ao estado inicial.

- Não há login de usuário.

- Todos os dados são fixos dentro da aplicação, não é possível inserir dados via input

- Apenas PHP puro é utilizado; não há frameworks externos.

## Exemplos de Uso / Casos de Teste

1. Adicionar produto id=1, quantidade=2

        - Produto é adicionado ao carrinho.

        - Estoque atualizado automaticamente.

2. Adicionar produto id=3, quantidade=10 (além do estoque)

        - Mensagem: "Estoque insuficiente para Tênis."

        - Carrinho não é atualizado.

3. Adicionar produto id=2, quantidade=1 e depois remover

        - Produto é adicionado ao carrinho.

        - Ao remover, o estoque do produto é restaurado.

4. Aplicar cupom DESCONTO10

        - Total do carrinho é reduzido em 10%.

        - Mensagem: "Cupom DESCONTO10 aplicado!"

<div align=center>Projeto criado por:</div>
<div align=center>Vinicius Gualtieri Moraes - RA 2002601</div>