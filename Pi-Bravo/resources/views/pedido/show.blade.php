<div class="container">
    <h1>Detalhes do Pedido</h1>

    {{-- Informações do Usuário --}}
    <div class="user-info">
        <h2>Informações do Usuário</h2>
        <p>Nome: {{ $pedido->usuario->USUARIO_NOME }}</p>
        <p>Email: {{ $pedido->usuario->USUARIO_EMAIL }}</p>
        {{-- Outras informações do usuário --}}
    </div>

    {{-- Endereço de Entrega --}}
    <div class="endereco-info">
        <h2>Endereço de Entrega</h2>
        <p>{{ $pedido->endereco->ENDERECO_NOME }}</p>
        <p>{{ $pedido->endereco->ENDERECO_LOGRADOURO }}, {{ $pedido->endereco->ENDERECO_NUMERO }}</p>
        <p>{{ $pedido->endereco->ENDERECO_CIDADE }} - {{ $pedido->endereco->ENDERECO_ESTADO }}</p>
        {{-- Outras informações do endereço --}}
    </div>

    {{-- Itens do Pedido --}}
    <div class="pedido-itens">
        <h2>Itens do Pedido</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedido->pedidoItens as $item)
                    <tr>
                        <td>{{ $item->produto->PRODUTO_NOME }}</td>
                        <td>{{ $item->ITEM_QTD }}</td>
                        <td>R$ {{ number_format($item->ITEM_PRECO, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($item->ITEM_QTD * $item->ITEM_PRECO, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Total do Pedido --}}
    <div class="pedido-total">
        <h3>Total do Pedido: R$ {{ number_format($pedido->pedidoItens->sum(function ($item) {
            return $item->ITEM_QTD * $item->ITEM_PRECO;
        }), 2, ',', '.') }}</h3>
    </div>

    {{-- Outras informações ou ações relacionadas ao pedido --}}
</div>
