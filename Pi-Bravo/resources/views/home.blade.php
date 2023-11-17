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

    <link rel="stylesheet" href="./Css/style.css">
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
                    <form action="{{ route('pesquisar') }}" method="GET"class="container-fluid">
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
    <main class="container mt-4">
        <h1>Bem-vindo à Loja Online</h1>

    <div id="carrosselDestaques" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://visitesaopaulo.com/wp-content/uploads/2023/03/Ativo.Com-Divulgacao.png" class="d-block w-100" alt="Destaque 1">
            </div>
            <div class="carousel-item">
                <img src="https://images.sympla.com.br/6544fedb924c1-xs.png" class="d-block w-100" alt="Destaque 2">
            </div>
            <div class="carousel-item">
                <img src="https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F409819719%2F897434501903%2F1%2Foriginal.20221214-013410?w=512&auto=format%2Ccompress&q=75&sharp=10&rect=0%2C33%2C1920%2C960&s=90a057ce281f7f7bdea7d46d6a6b4d0d" class="d-block w-100" alt="Destaque 3">
            </div>
            <!-- Adicione mais itens de carrossel conforme necessário -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carrosselDestaques" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrosselDestaques" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Próximo</span>
        </button>
    </div>





<div class="container container__card container-fluid">
    <h2 class="produtos">Principais eventos da semana</h2>
    <div class="owl-carousel">
        @foreach ($produtos as $produto)
            <div class="card" style="width: 13rem; margin-right: 10px;">
                @if($produto->ProdutoImagens->count() == 0)
                    <img src="{{ asset('imagens/semFoto.jpg') }}" class="card-img-top img-card img-fluid" alt="" style="max-width: 100%; max-height: 100%;">
                @else
                    <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="card-img-top img-card img-fluid" alt="" style="max-width: 100%; max-height: 100%;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                </div>
                <div class="botao-card">
                    <a href="{{ route('produto.show', $produto->PRODUTO_ID) }}" class="btn btn-primary">Ver Detalhes</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="owl-nav">
        <button class="owl-prev"><i class="fa-solid fa-circle-chevron-left" ></i></button>
        <button class="owl-next"><i class="fa-solid fa-circle-chevron-right"></i></button>
    </div>
</div>
</main>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 5
                }
            }
        });
    });

    $(".owl-prev").click(function() {
        $('.owl-carousel').trigger('prev.owl.carousel');
    });
    $(".owl-next").click(function() {
        $('.owl-carousel').trigger('next.owl.carousel');
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

