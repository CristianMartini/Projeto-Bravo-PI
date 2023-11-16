<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" href="{{ asset('Css/carrinho.css') }}" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <header>
        <span>Carrinho de compras de {{ Auth::user()->USUARIO_NOME }}</span>
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
                        @foreach ($itensCarrinho as $item)
                            <tr>
                                <td>
                                    <div class="product">
                                        @if($item->product->ProdutoImagens->count() == 0)
                                            <img src="{{ asset('imagens/semFoto.jpg') }}" >
                                        @else
                                            <img src="{{ $item->product->ProdutoImagens[0]->IMAGEM_URL }}"  alt="{{ $item->product->PRODUTO_NOME }}">
                                        @endif
                                        <div class="info">
                                            <div class="name">{{ $item->product->PRODUTO_NOME }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>R$ {{ number_format($item->product->PRODUTO_PRECO, 2, ',', '.') }}</td>
                                <td>
                                    <div class="qty">
                                        <button class="update-quantity" data-action="decrease" data-id="{{ $item->id }}"><i class="bx bx-minus"></i></button>           <span class="item-quantity" data-id="{{ $item->id }}">{{ $item->ITEM_QTD }}</span>
                                        <button class="update-quantity" data-action="increase" data-id="{{ $item->id }}"><i class="bx bx-plus"></i></button>
                                    </div>
                                </td>
                                <td>R$ {{ number_format($item->product->PRODUTO_DESCONTO * $item->ITEM_QTD, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format(($item->product->PRODUTO_PRECO - $item->product->PRODUTO_DESCONTO) * $item->ITEM_QTD, 2, ',', '.') }}</td>
                                <td>
                                    <button class="remove-item" data-id="{{ $item->id }}"><i class="bx bx-x"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            <aside>
                <div class="box">
                    <header>Resumo da compra</header>
                    <div class="info">
                        <div><span>Sub-total</span><span>R$ {{ number_format($precoTotal, 2, ',', '.') }}</span></div>
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
                        <span>R$ {{ number_format($precoTotal, 2, ',', '.') }}</span>
                    </footer>
                </div>
                <button> <a href="{{ route('checkout') }}">Proceder para o Checkout</a></button>
            </aside>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.update-quantity').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                var quantity = parseInt($('.item-quantity[data-id="' + id + '"]').text());
                quantity = action === 'increase' ? quantity + 1 : (quantity > 1 ? quantity - 1 : 1);

                $.ajax({
                    url: '/carrinho/atualizar/' + id,
                    type: 'POST',
                    data: {
                        quantidade: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('.item-quantity[data-id="' + id + '"]').text(quantity);
                    }
                });
            });

            $('.remove-item').click(function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '/carrinho/remover/' + id,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        $('button.remove-item[data-id="' + id + '"]').closest('tr').remove();
                    }
                });
            });
        });
        </script>

</body>
</html>
