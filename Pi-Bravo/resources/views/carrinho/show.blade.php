<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://kit.fontawesome.com/00256cd3c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('Css/carrinho.css') }}" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- Logo aqui -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <!-- Substitua por seu próprio logotipo -->
                <img src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="bravo tickets logo" width="100">
            </a>
            <!-- Botão de menu hambúrguer para telas menores -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Itens da navbar -->
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                    Categorias
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <div class="categorias">
                        @foreach ($categorias as $categoria)
                            <ul>
                                <li><a href="{{ route('produtos.categoria', $categoria->CATEGORIA_ID) }}">
                                        {{ $categoria->CATEGORIA_NOME }}</a>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <form action="{{ route('pesquisar') }}" method="GET"class="container-fluid">
                        <div class="input-group">

                            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar"
                                aria-label="Search" name="query">
                            <button class="btn btn my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="#ffffff" class="bi bi-search"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>


                <div class="col-md-3 text-end">
                    <!-- Verifica se o usuário está logado -->
                    @auth
                        <span class="navbar-text me-3">
                            Olá, {{ Auth::user()->USUARIO_NOME }}
                        </span>
                        <a href="{{ route('pedido.listar') }}"><img src="https://id7.com.br/wp-content/webpc-passthru.php?src=https://id7.com.br/wp-content/uploads/2014/03/icone-05-01.png&nocache=1" alt="Perfil" class="imagem-perfil"></a>
                        <a href="{{ route('carrinho') }}"><svg xmlns="http://www.w3.org/2000/svg" width="38"
                                height="25" fill="#ffffff" class="bi bi-cart3" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg></a>
                        <a class="btn btn-outline-primary me-2" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endauth

                    <!-- Verifica se o usuário é um visitante -->
                    @guest
                        <a class="btn btn-outline-primary me-2" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-outline-primary me-2" href="{{ route('register') }}">Inscrever-se</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <header>
        <span>Carrinho de compras de {{ Auth::user()->USUARIO_NOME }}</span>
    </header>
    <main>
        <div class="page-title"></div>
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
                    <!-- ... [resto do código HTML anterior] ... -->

                    <tbody>
                        @foreach ($itensCarrinho as $item)
                            <tr>
                                <td>
                                    <div class="product">
                                        @if ($item->produto->ProdutoImagens->count() == 0)
                                            <img src="{{ asset('imagens/semFoto.jpg') }}">
                                        @else
                                            <img src="{{ $item->produto->ProdutoImagens[0]->IMAGEM_URL }}"
                                                alt="{{ $item->produto->PRODUTO_NOME }}">
                                        @endif
                                        <div class="info">
                                            <div class="name">{{ $item->produto->PRODUTO_NOME }}</div>

                                        </div>
                                </td>

                                <td>R$ {{ number_format($item->produto->PRODUTO_PRECO, 2, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('carrinho.atualizar', $item->produto->PRODUTO_ID) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input class="adicionar"type="number" name="quantidade"
                                            value="{{ $item->ITEM_QTD }}" min="1">
                                        <button type="submit" class="btn  btn-info btn-sm">Atualizar</button>
                                    </form>
                                </td>
                                <td> R$
                                    {{ number_format($item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD, 2, ',', '.') }}
                                </td>
                                <td>R$
                                    {{ number_format($item->produto->PRODUTO_PRECO * $item->ITEM_QTD - $item->produto->PRODUTO_DESCONTO * $item->ITEM_QTD, 2, ',', '.') }}
                                </td>
                                <td>
                                    <form action="{{ route('carrinho.remover', $item->produto->PRODUTO_ID) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-close "></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        </div>

        </section>
        <aside>
            <div class="box">
                <div class="box">
                    <header>Resumo da compra</header>
                    <div class="info">
                        <div>
                            <span>Total sem desconto</span>
                            <span>R$ {{ number_format($precoTotalSemDesconto, 2, ',', '.') }}</span>
                        </div>
                        <div>
                            <span>Frete</span>
                            <span>Gratuito</span>
                        </div>
                        <div>
                            <span>Descontos</span>
                            <span>R$ {{ number_format($totalDesconto, 2, ',', '.') }}</span>
                        </div>

                    </div>
                    <div>
                        @if ($temEnderecos)
                            <span><!-- Botão para acionar o modal -->
                                <button type="button" class="btn btn-primary btn-modal" data-bs-toggle="modal"
                                    data-bs-target="#modalEndereco">
                                    Escolher Endereço de Entrega
                                </button>
                            @else
                                <div class="alert alert-info">
                                    Você ainda não cadastrou nenhum endereço.
                                    <a href="{{ route('endereco.create') }}" class="btn btn-primary">Cadastrar
                                        Endereço</a>
                                </div>
                        @endif


                        <!-- Modal -->
                        <div class="modal fade" id="modalEndereco" tabindex="-1"
                            aria-labelledby="modalEnderecoLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalEnderecoLabel">Selecione um Endereço </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formEndereco">
                                            <select class="form-select" id="enderecoSelecionado">
                                                @foreach ($enderecos as $endereco)
                                                    <option value="{{ $endereco->ENDERECO_ID }}"
                                                        {{ session('enderecoEscolhido') == $endereco->ENDERECO_ID ? 'selected' : '' }}>
                                                        {{ $endereco->ENDERECO_NOME }} -
                                                        {{ $endereco->ENDERECO_LOGRADOURO }},
                                                        {{ $endereco->ENDERECO_NUMERO }}
                                                    </option>
                                                @endforeach

                                            </select>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> <a
                                                href="{{ route('endereco.create') }}">Cadastrar Novo
                                                Endereço</a></button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fechar</button>
                                        <button type="button" class="btn btn-success" id="salvarEndereco">Salvar
                                            escolha</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        </span>

                    </div>
                    <div id="enderecoEscolhido" class="alert alert-info" style="display: none;">
                        Endereço para entrega: <span id="enderecoTexto">

                        </span>
                    </div>
                </div>
                <div class="footer">
                    <span>Total</span>
                    <span>R$ {{ number_format($precoTotal, 2, ',', '.') }}</span>
                </div>
            </div>

            <form action="{{ route('pedido.criar') }}" method="POST">
                @csrf
                <button type="submit" class="btn button-checkout">Finalizar Pedido</button>
            </form>

        </aside>
        </div>


    </main>
    <div class="b-example-divider"></div>

    <div class=" container-footer ">
        <footer class="py-1 my-5">
            <ul class="nav justify-content-center border-bottom ">
                <li><a class="logo-footer" href="{{ route('home') }}"><img
                            src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="bravo tickets logo"width="110">
                    </a>
                </li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>

                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre nós</a></li>
            </ul>
            <p class="text-center text-body-secondary">&copy; 2023 Company, Inc</p>
        </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        $('#salvarEndereco').click(function() {
            var enderecoId = $('#enderecoSelecionado').val();
            var enderecoTexto = $("#enderecoSelecionado option:selected").text();

            // Atualiza o campo de endereço selecionado na interface do usuário
            $('#enderecoTexto').text(enderecoTexto);
            $('#enderecoEscolhido').show(); // Mostra o div com o endereço escolhido

            // Fecha o modal de escolha de endereço
            $('#modalEndereco').modal('hide');

            // Enviar a escolha do endereço para o servidor
            $.ajax({
                url: '/carrinho/salvar-escolha-endereco',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    endereco_id: enderecoId
                },
                success: function(response) {
                    // Aqui você pode adicionar código para lidar com a resposta do servidor, se necessário
                    // Por exemplo, atualizar a página ou redirecionar o usuário
                },
                error: function(error) {
                    // Tratamento de erro
                    console.error(error);
                    alert('Ocorreu um erro ao salvar o endereço.');
                }
            });
        });
    });
</script>

</body>

</html>
