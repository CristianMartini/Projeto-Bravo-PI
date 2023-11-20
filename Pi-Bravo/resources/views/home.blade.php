@extends('layouts.main')

@section('title', 'Bravo Tickets')
@section('content')
    <main class="container mt-4">
        <h1>Bem-vindo à Tickets Bravo</h1>


        <!--carousel-->
        <div id="carrosselDestaques" class="carousel slide mt-4" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://visitesaopaulo.com/wp-content/uploads/2023/03/Ativo.Com-Divulgacao.png"
                        class="d-block w-100" alt="Destaque 1">
                </div>
                <div class="carousel-item">
                    <img src="https://images.sympla.com.br/6544fedb924c1-xs.png" class="d-block w-100" alt="Destaque 2">
                </div>
                <div class="carousel-item">
                    <img src="https://img.evbuc.com/https%3A%2F%2Fcdn.evbuc.com%2Fimages%2F409819719%2F897434501903%2F1%2Foriginal.20221214-013410?w=512&auto=format%2Ccompress&q=75&sharp=10&rect=0%2C33%2C1920%2C960&s=90a057ce281f7f7bdea7d46d6a6b4d0d"
                        class="d-block w-100" alt="Destaque 3">
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



        <!--cards-->
  <h2 class="produtos">Principais eventos da semana</h2>
        <div class="container container__card container-fluid">

            <div class="owl-carousel">
                @foreach ($produtos as $produto)
                    <div class="card custom-card" style="width: 13rem; margin-right: 10px;">
                        @if ($produto->ProdutoImagens->count() == 0)
                            <img src="{{ asset('imagens/semFoto.jpg') }}" class="card-img-top img-card img-fluid"
                                alt="" style="max-width: 100%; max-height: 100%;">
                        @else
                            <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="card-img-top img-card img-fluid"
                                alt="" style="max-width: 100%; max-height: 100%;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $produto->PRODUTO_NOME }}</h5>
                        </div>
                        <div class="botao-card">
                            <a href="{{ route('produto.show', $produto->PRODUTO_ID) }}" class="btn btn-primary">Ver
                                Detalhes</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="owl-nav">
                <button class="owl-prev"><i class="fa-solid fa-circle-chevron-left"></i></button>
                <button class="owl-next"><i class="fa-solid fa-circle-chevron-right"></i></button>
            </div>
        </div>


        <!--Produto detalhes-->
         <h2 class="produtos">Produtos em destaque</h2>
        <section class="container mt-4 product-details">

            @foreach ($doisProdutos as $produto)
                <div class="product-container mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Imagem Principal do Produto -->
                            <img id="mainImage"
                                src="{{ $produto->ProdutoImagens->count() > 0 ? $produto->ProdutoImagens->sortBy('IMAGEM_ORDEM')->first()->IMAGEM_URL : asset('imagens/semFoto.jpg') }}"
                                class="  img-fluid" alt="{{ $produto->PRODUTO_NOME }}"
                                style="max-width: 100%; max-height: 100%;">

                            <!-- Miniaturas de Imagens -->
                            <div class="product-thumbnails">
                                @for ($i = 0; $i < 3; $i++)
                                    <img onclick="changeImage(this)"
                                        src="{{ $produto->ProdutoImagens->sortBy('IMAGEM_ORDEM')->slice($i, 1)->first()->IMAGEM_URL ?? asset('imagens/semFoto.jpg') }}"
                                        class="img-thumbnail" alt="Thumbnail {{ $i + 1 }}" />
                                @endfor
                            </div>
                        </div>
                        <!-- Detalhes do Produto -->
                        <div class="col-md-6">
                            <h2>{{ $produto->PRODUTO_NOME }}</h2>
                            <p class="text-muted price">R$ {{ number_format($produto->PRODUTO_PRECO, 2, ',', '.') }}</p>
                            <p class="description">{{ $produto->PRODUTO_DESC }}</p>
                            <a href="{{ route('produto.show', $produto->PRODUTO_ID) }}" class="btn btn-primary">Ver
                                Detalhes</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>

        <script>
            function changeImage(element) {
                var mainImage = document.getElementById('mainImage');
                mainImage.src = element.src;
            }
        </script>



    </main>



    <script>
        $(document).ready(function() {
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
@endsection
