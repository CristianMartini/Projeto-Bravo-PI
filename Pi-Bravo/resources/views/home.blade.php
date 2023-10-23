<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

<body>

</body>

</html>

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
                    <form action="" class="container-fluid">
                        <div class="input-group">
                            <input type="text" class="form-control"name="search" id="search"
                                placeholder="Pesquisar eventos, shows, teatros, cinemas...">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Conecte-se</font>
                    </font>
                </button>
                <button type="button" class="btn btn-primary">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Inscrever-se</font>
                    </font>
                </button>
            </div>
        </nav>
    </div>
<!--
    <div class="container">
        <h3>Divirta-se, encontre algo para fazer</h3>
    </div>
    <div class="container marketing" id="categoria">
        @foreach ($categorias as $categoria)

            <div class="row">
                <div class="col-lg-4">
                    <img src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="" srcset="" width="120px"
                        height="120px">

                    <p>{{ $categoria->CATEGORIA_NOME }}</p>

                </div>
        @endforeach
    </div>
  -->
  <div class="container carousel">
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">

              </a>
            </header>

            <div class="p-5 mb-4 bg-body-tertiary rounded-5">
              <div class="container-fluid py-5">

                <button class="btn btn-primary btn-lg" type="button">Example button</button>
              </div>
            </div>


      </div>


      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">asdasd</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">التالي</span>
    </button>
  </div>


  <!--card -->
    <div class=" container container__card container-fluid">
        @foreach ($produtos as $produto)
            <div class="row card-info">
                <div class="col ">
                    <div class="card h-100 " style="width: 13rem;">
                        <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="card-img-top img-card img-fluid"
                            alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                        </div class="botao-card">
                        <div> <a href="#" class="btn btn-primary">Ingressos</a></div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
                            <img src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="bravo.logo">
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
                <!--
       <div class="column is-nav">
                    <div class="column-title">Blog</div>
                    <ul class="column-ul"l>
                        <li class="column-li"><a href="#">What is jQuery</a></li>
                        <li class="column-li"><a href="#">What is JavaScript</a></li>
                        <li class="column-li"><a href="#">How to make money with a blog</a></li>
                    </ul>
                </div>
            </div>-->
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
