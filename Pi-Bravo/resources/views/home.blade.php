<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./Css/style.css">
    <title> Bravo Tickets</title>
</head>

<body>
    <div class="container">
    <nav class="navbar navbar-expand-sm navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('imagens/Logotipo_bravo.png') }}"
                    alt="bravo tickets logo"width="100">
            </a>

            <!--Aqui abre um modal-->

            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                    height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                    <path
                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                </svg>
                De qualquer lugar
            </a>
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

    <!---->
    <div class="container  card__circle">
        <h3>Divirta-se, encontre algo para fazer</h3>
        <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
            <div class="col">
                <div class="p-3 border bg-light">
                    <img src="" alt="" srcset="">
                </div>
                <p>Festa e Shows</p>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <img src="" alt="" srcset="">
                </div>
                <p>Palestras</p>
            </div>
            <div class="col">
                <div class="p-3 border bg-light">
                    <img src="" alt="" srcset="">
                </div>
                <p>Teatros</p>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"> <img src="" alt="" srcset="">
                </div>
                <p>Cinemas</p>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"> <img src="" alt="" srcset="">
                </div>
                <p>Espetaculos</p>
            </div>
            <div class="col">
                <div class="p-3 border bg-light"> <img src="" alt="" srcset="">
                </div>
                <p>Exposições</p>
            </div>
        </div>
    </div>



    <div class=" container container__card ">
        @foreach ($produtos as $produto)
            <div class="row card-info">
                <div class="col">
                    <div class="card h-100 " style="width: 13rem;">
                        <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="card-img-top img-card"
                            alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                            <a href="#" class="btn btn-primary">Ingressos</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
