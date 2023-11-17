<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://kit.fontawesome.com/00256cd3c2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('Css/detalhes.css') }}">
    <link rel="stylesheet" href="{{ asset('Css/style.css') }}">
    <title> Bravo Tickets</title>
</head>

<body>
    <div class="container container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('imagens/Logotipo_bravo.png') }}"
                        alt="bravo tickets logo"width="100">
                </a>

                <!--Aqui abre um modal-->
                <div class="dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        De qualquer lugar
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <div class="categorias">
                            @foreach ($categorias as $categoria)
                            <ul>
                                 <li><a href="{{ route('categoria', $categoria->CATEGORIA_ID) }}">{{ $categoria->CATEGORIA_NOME }}</a></li>
                            </ul>

                            @endforeach
                        </div>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form action="{{ route('pesquisar') }}" method="GET" class="container-fluid">
                        <div class="input-group">

                                <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Search" name="query">
                                <button class="btn btn my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                  </svg></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 text-end">
                <!-- Verifica se o usuário está logado -->
                @auth
                    <span class="navbar-text me-3">
                        Olá, {{ Auth::user()->USUARIO_NOME }}
                    </span>
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
        </nav>
    </div>
    <main class="container mt-4 product-details">
        <div class="product-container mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <!-- Imagem Principal do Produto -->
                    <img id="mainImage" src="{{ $produto->ProdutoImagens->sortBy('IMAGEM_ORDEM')->first()->IMAGEM_URL ?? 'url_default.jpg' }}" class="img-fluid" alt="{{ $produto->PRODUTO_NOME }}" />

                    <!-- Miniaturas de Imagens -->
                    <div class="product-thumbnails">
                        @foreach ($produto->ProdutoImagens->sortBy('IMAGEM_ORDEM') as $imagem)
                            <img onclick="changeImage('{{ $imagem->IMAGEM_URL }}')" src="{{ $imagem->IMAGEM_URL }}" class="img-thumbnail" alt="Thumbnail" />
                        @endforeach
                    </div>
                </div>
                <!-- Detalhes do Produto -->
                <div class="col-md-6">
                    <h2>{{ $produto->PRODUTO_NOME }}</h2>
                    <p class="text-muted price">R$ {{ number_format($produto->PRODUTO_PRECO, 2, ',', '.') }}</p>
                    <p class="description">{{ $produto->PRODUTO_DESC }}</p>
                    <form action="{{ route('carrinho.adicionar', $produto->PRODUTO_ID) }}" method="POST">
                        @csrf
                        <div class="quantity mb-3">
                            <label for="quantity" class="form-label">Quantidade:</label>
                            <input type="number" id="quantity" name="quantidade" min="1" max="100" value="1" class="form-control" />
                        </div>
                        <button class="btn btn-primary">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer (idêntico à página inicial) -->


    <!-- Scripts do Bootstrap (idênticos à página inicial) -->
    <!-- Script JavaScript para troca de imagens -->
    <script>
        function changeImage(src) {
            document.getElementById("mainImage").src = src;
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
