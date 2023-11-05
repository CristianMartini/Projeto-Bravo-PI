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
                <a class="navbar-brand" href="#"><img src="{{ asset('imagens/Logotipo_bravo.png') }}"
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
                        @foreach ($categorias as $categoria)
                            <li>
                                <a class="dropdown-item" href="#">{{ $categoria->CATEGORIA_NOME }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form class="container-fluid">
                        <div class="input-group">
                            <input type="text" class="form-control"
                                placeholder="Pesquisar eventos, shows, teatros, cinemas...">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2"><a href="{{ route('login') }}">
                        <font style="vertical-align: inherit;">Login</font>
                    </font></a>
                </button>
                <button type="button" class="btn btn-outline-primary me-2"><a href="{{ route('register') }}">@if (Auth::user())
                    <font style="vertical-align: inherit;">{{ Auth::user()->USUARIO_NOME }}</font>
                </font></a>
                @else
                       <font style="vertical-align: inherit;">Inscrever-se</font>
                    </font></a>
                @endif

                </button>
            </div>
        </nav>
    </div>

    <!--
    <div class="container">
        <h3>Divirta-se, encontre algo para fazer</h3>
    </div>
    <div class="container container-categoria">
        @foreach ($categorias as $categoria)
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <img src=""class="card-img-top" alt="...">
                    <h5 class="card-title">{{ $categoria->CATEGORIA_NOME }}</h5>
                </div>
            </div>
        @endforeach
    </div>
-->


<div class="container container__card container-fluid">
    <div class="owl-carousel">
        @foreach ($produtos as $produto)
            <div class="card" style="width: 13rem; margin-right: 10px;">
                <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="card-img-top img-card img-fluid" alt="" style="max-width: 100%; max-height: 100%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                </div>
                <div class="botao-card">
                    <div><a href="#" class="btn btn-primary">Ingressos</a></div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="owl-nav">
        <button class="owl-prev"><i class="fa-solid fa-circle-chevron-left" ></i></button>
        <button class="owl-next"><i class="fa-solid fa-circle-chevron-right"></i></button>
    </div>
</div>

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


   <!--Footer-->
   <div class="footer-container">
    <footer class="footer ">
        <div class="start-learning">
            <div class="footer-start">
                <div class="texts">
                    <h2 class="section-title">Venha se divertir conosco !</h2>

                </div>
                <a href="#" class="button">
                    <span class="label">Ingressos</span>
                </a>

            </div>
        </div>

        <div class="inner">
            <div class="column is-logo">
                <a href="#" class="main-logo">
                    <div class="logo">
                        <img src="{{ asset('imagens/Logotipo_bravo.svg') }}" alt="bravo.logo">
                    </div>
                    <div class="logo-info">
                        <div class="text">Bravo Tickets</div>
                        <span class="copyright">© 2023. All rights reserved.</span>
                    </div>
                </a>
            </div>
            <div class="column is-nav">
                <div class="column-title">Navegação</div>
                <ul class="column-ul">
                    <li class="column-li"><a class="column-a" href="#">Home</a></li>
                    <li class="column-li"><a class="column-a" href="#">Login</a></li>
                    <li class="column-li"><a class="column-a" href="#">Cadastre-se</a></li>
                    <li class="column-li"><a class="column-a" href="#">Ingressos</a></li>
                </ul>
            </div>

            <div class="column is-nav">
                <div class="column-title">Contatos </div>
                <ul class="column-ul">
                    <li class="column-li"><a href="#"><i class="fa fa-envelope-open"></i>
                            bravo@Bravotickets.com</a></li>
                    <li class="column-li"><a href="#"><i class="fa fa-twitter"></i>@BravoTickets</a></li>
                    <li class="column-li"><a href="#"><i class="fa fa-linkedin"></i> Linkedin</a></li>
                </ul>
            </div>

    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>

