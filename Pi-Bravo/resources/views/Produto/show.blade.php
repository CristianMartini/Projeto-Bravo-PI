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
    <nav class="navbar bg-body-tertiary">

      </nav>
    <div class="container-md border border-black">
        <div class="row g-0 bg-body-secondary position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="w-100" alt="{{ $produto->PRODUTO_NOME }}"width="350" height="530">
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <h5 class="mt-0">{{ $produto->PRODUTO_NOME }}</h5>
                <p>{{ $produto->PRODUTO_DESC }}</p>
                <a href="#" class="stretched-link">Go somewhere</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>
