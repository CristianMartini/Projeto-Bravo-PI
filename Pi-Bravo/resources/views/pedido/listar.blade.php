{{-- resources/views/profile/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://kit.fontawesome.com/00256cd3c2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
 <!-- Fonts -->
 <link rel="preconnect" href="https://fonts.bunny.net">
 <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('Css/pedido.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Css/carrinho.css') }}" />
<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <title>Seu perfil</title>
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


    <div class="profile-container">
        <div class="profile-header">

        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detalhes do Perfil</h5>
                <p class="card-text">Nome: {{ $usuario->USUARIO_NOME }}</p>
                <p class="card-text">Email: {{ $usuario->USUARIO_EMAIL }}</p>
                <p class="card-text">CPF: {{ $usuario->USUARIO_CPF }}</p>

                <h6>Endereços cadastrados:</h6>
                @foreach ($enderecos as $endereco)
                    <p>{{ $endereco->ENDERECO_LOGRADOURO }}, {{ $endereco->ENDERECO_NUMERO }} - {{ $endereco->ENDERECO_CIDADE }}</p>
                @endforeach
            </div>
        </div>


        <aside>


        <div class="box">
            <header>Resumo dos pedidos</header>

            @php
                $pedidosAgrupados = $pedidos->groupBy('PEDIDO_ID');
            @endphp

            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Desconto</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidosAgrupados as $pedidoId => $itensPedido)
                        @php
                            $primeiroItem = $itensPedido->first();
                            $totalPedido = $itensPedido->reduce(function ($carry, $item) {
                                return $carry + ($item->ITEM_QTD > 0 ? $item->ITEM_PRECO : 0);
                            }, 0);
                        @endphp

                        @if ($totalPedido > 0)
                            <tr class="pedido-header">
                                <td colspan="5">
                                    <h3>Pedido ID: {{ $pedidoId }}</h3>
                                    <p>Data do Pedido: {{ $primeiroItem->PEDIDO_DATA }}</p>
                                    <p>Status do Pedido: {{ $primeiroItem->STATUS_PEDIDO }}</p>
                                    <p>Endereço de Entrega: {{ $primeiroItem->ENDERECO_LOGRADOURO }}, {{ $primeiroItem->ENDERECO_NUMERO }}, {{ $primeiroItem->ENDERECO_CIDADE }}, {{ $primeiroItem->ENDERECO_ESTADO }}</p>
                                    <p>CEP: {{ $primeiroItem->ENDERECO_CEP }}</p>
                                </td>
                            </tr>

                            @foreach ($itensPedido as $item)
                                @if ($item->ITEM_QTD > 0)
                                    <tr>
                                        <td>
                                            <div class="product">
                                                @if (empty($item->IMAGEM_URL))
                                                    <img src="{{ asset('imagens/semFoto.jpg') }}" alt="Imagem não disponível" style="width:100px; height:auto;">
                                                @else
                                                    <img src="{{ $item->IMAGEM_URL }}" alt="{{ $item->PRODUTO_NOME }}" style="width:100px; height:auto;">
                                                @endif
                                                <div class="name">{{ $item->PRODUTO_NOME }}</div>
                                            </div>
                                        </td>
                                        <td>R$ {{ number_format($item->PRODUTO_PRECO, 2, ',', '.') }}</td>
                                        <td>{{ $item->ITEM_QTD }}</td>
                                        <td>R$ {{ number_format($item->PRODUTO_DESCONTO, 2, ',', '.') }}</td>
                                        <td>R$ {{ number_format($item->ITEM_PRECO, 2, ',', '.') }}</td>
                                    </tr>
                                @endif
                            @endforeach


                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
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
        </body>
        </html>
