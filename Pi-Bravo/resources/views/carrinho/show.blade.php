
    <h2>Carrinho de Compras</h2>
    @foreach ($itensCarrinho as $item)
        <div>
            <h4>{{ $item->product->PRODUTO_NOME }}</h4>
            <p>Quantidade: {{ $item->ITEM_QTD }}</p>
            <p>Preço: R$ {{ $item->product->PRODUTO_PRECO }}</p>
            <!-- Adicionar botões para alterar quantidade ou remover -->
        </div>
    @endforeach
    <p>Preço Total: R$ {{ $precoTotal }}</p>
    <a href="{{ route('checkout') }}">Proceder para o Checkout</a>

