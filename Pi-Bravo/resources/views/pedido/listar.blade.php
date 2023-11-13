<h1>Meus Pedidos</h1>

    @foreach($pedidos as $pedido)
        <div class="pedido">
            <h2>Pedido #{{ $pedido->PEDIDO_ID }}</h2>
            <p>Data: {{ $pedido->created_at->format('d/m/Y') }}</p>
            <ul>
                @foreach($pedido->itens as $item)
                    <li>{{ $item->produto->PRODUTO_NOME }} - Quantidade: {{ $item->ITEM_QTD }}</li>
                @endforeach
            </ul>
            <!-- Adicione mais informações sobre o pedido conforme necessário -->
        </div>
    @endforeach

