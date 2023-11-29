{{-- resources/views/profile/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('Css/profile.css') }}" rel="stylesheet">
    <title>Seu perfil</title>
</head>

<body>


    <div class="profile-container">
        <div class="profile-header">
            <h1>Perfil do Usuário</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detalhes do Perfil</h5>
                <p class="card-text">Nome: {{ $usuario->USUARIO_NOME }}</p>
                <p class="card-text">Email: {{ $usuario->USUARIO_EMAIL }}</p>
                <p class="card-text">CPF: {{ $usuario->USUARIO_CPF }}</p>
            </div>
        </div>
        <div class="change-password-container">
            <div class="card-body">
                <h5 class="card-title">Alterar Senha</h5>
                <form action="{{ route('profile.change-password') }}" method="POST" class="change-password-form">
                    @csrf
                    <div class="mb-3">
                        <label for="current_password" class="form-label">Senha Atual</label>
                        <input type="password" class="form-control" id="current_password" name="current_password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nova Senha</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                    </div>
                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirme a Nova Senha</label>
                        <input type="password" class="form-control" id="new_password_confirmation"
                            name="new_password_confirmation" required>
                    </div>
                    <button type="submit">Alterar Senha</button>
                </form>
            </div>
        </div>

        <div class="pedidos-container">

            <h1>Meus Pedidos</h1>
            @php
                $pedidosAgrupados = $pedidos->groupBy('PEDIDO_ID');
            @endphp

            @foreach ($pedidosAgrupados as $pedidoId => $itensPedido)
                @php
                    $primeiroItem = $itensPedido->first();
                    $totalPedido = $itensPedido->reduce(function ($carry, $item) {
                        return $carry + ($item->ITEM_QTD > 0 ? $item->ITEM_PRECO : 0);
                    }, 0);
                @endphp

                @if ($totalPedido > 0)
                    <div class="pedido">
                        <h3>Pedido ID: {{ $pedidoId }}</h3>
                        <p>Data do Pedido: {{ $primeiroItem->PEDIDO_DATA }}</p>
                        <p>Status do Pedido: {{ $primeiroItem->STATUS_PEDIDO }}</p>
                        <p>Endereço de Entrega: {{ $primeiroItem->ENDERECO_NOME }},
                            {{ $primeiroItem->ENDERECO_LOGRADOURO }}, {{ $primeiroItem->ENDERECO_NUMERO }},
                            {{ $primeiroItem->ENDERECO_CIDADE }}, {{ $primeiroItem->ENDERECO_ESTADO }}</p>
                        <p>CEP: {{ $primeiroItem->ENDERECO_CEP }}</p>
                        <p>Complemento: {{ $primeiroItem->ENDERECO_COMPLEMENTO ?? 'N/A' }}</p>

                        <h4>Itens do Pedido:</h4>
                        @foreach ($itensPedido as $item)
                            @if ($item->ITEM_QTD > 0)
                                <div class="item">
                                    @if (empty($item->IMAGEM_URL))
                                        <img src="{{ asset('imagens/semFoto.jpg') }}" alt="Imagem não disponível"
                                            style="width:100px; height:auto;">
                                    @else
                                        <img src="{{ $item->IMAGEM_URL }}" alt="{{ $item->PRODUTO_NOME }}"
                                            style="width:100px; height:auto;">
                                    @endif
                                    <p>Nome do Produto: {{ $item->PRODUTO_NOME }}</p>
                                    <p>Quantidade: {{ $item->ITEM_QTD }}</p>
                                    <p>Preço Unitário: R$ {{ number_format($item->PRODUTO_PRECO, 2, ',', '.') }}</p>
                                    <p>Desconto: R$ {{ number_format($item->PRODUTO_DESCONTO, 2, ',', '.') }}</p>
                                    <p>Preço Total: R$ {{ number_format($item->ITEM_PRECO, 2, ',', '.') }}</p>
                                </div>
                            @endif
                        @endforeach

                        <h4>Total do Pedido: R$ {{ number_format($totalPedido, 2, ',', '.') }}</h4>
                    </div>
                @endif
            

        @endforeach




        </div>

    </div>

</body>

</html>
