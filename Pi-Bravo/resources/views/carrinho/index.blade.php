<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="{{ asset('Css/carrinho.css') }}" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
   

    <header>
      <span>Carrinho de compras de  {{ Auth::user()->USUARIO_NOME }}</span>
    </header>
    <main>
      <div class="page-title">Seu Carrinho</div>
      <div class="content">
        <section>
          <table>
            <thead>
              <tr>
                <th>Produto</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Desconto</th>
                <th>Total</th>
                <th>-</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="product">
                    <img src="https://picsum.photos/100/120" alt="" />
                    <div class="info">
                      <div class="name">{{ $produto->PRODUTO_NOME }}</div>
                      <div class="category">{{ $categoria->CATEGORIA_NOME }}</div>
                    </div>
                  </div>
                </td>
                <td>R$ {{ $produto->PRODUTO_PRECO }}</td>
                <td>
                  <div class="qty">
                    <button><i class="bx bx-minus"></i></button>
                    <span>{{$produto->PRODUTO_QTD }}</span>
                    <button><i class="bx bx-plus"></i></button>
                  </div>
                </td>
                <td>R$ {{ $produto->PRODUTO_DESCONTO }}</td>
                <td>R$ {{ ($produto->PRODUTO_PRECO *  $produto->PRODUTO_QTD) -($produto->PRODUTO_DESCONTO* $produto->PRODUTO_QTD)}}</td>
                <td>
                  <button class="remove"><i class="bx bx-x"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </section>
        <aside>
          <div class="box">
            <header>Resumo da compra</header>
            <div class="info">
              <div><span>Sub-total</span><span>R$ 418</span></div>
              <div><span>Frete</span><span>Gratuito</span></div>
              <div>
                <button>
                  Adicionar cupom de desconto
                  <i class="bx bx-right-arrow-alt"></i>
                </button>
              </div>
            </div>
            <footer>
              <span>Total</span>
              <span>R$ 418</span>
            </footer>
          </div>
          <button>Finalizar Compra</button>
        </aside>
      </div>
    </main>
  </body>
</html>
