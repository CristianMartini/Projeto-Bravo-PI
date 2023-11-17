
@extends('layouts.main')

@section('title', 'Bravo Tickets')
@section('content')



   <!--cards-->

   <div class="container container__card container-fluid">
    <h2 class="produtos">Principais eventos da semana</h2>
    <div class="owl-carousel">
        @foreach ($categorias->$produtos as $produto)
            <div class="card custom-card" style="width: 13rem; margin-right: 10px;">
                @if ($produto->ProdutoImagens->count() == 0)
                    <img src="{{ asset('imagens/semFoto.jpg') }}" class="card-img-top img-card img-fluid"
                        alt="" style="max-width: 100%; max-height: 100%;">
                @else
                    <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}"
                        class="card-img-top img-card img-fluid" alt=""
                        style="max-width: 100%; max-height: 100%;">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

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


@endsection
