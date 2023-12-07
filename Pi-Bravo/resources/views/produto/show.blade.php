@extends('layouts.main')

@section('title', 'Produtos')
@section('content')

<main class="container mt-5 mb-5 product-details">
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
                    <form action="{{ route('carrinho.adicionar', $produto->PRODUTO_ID) }}" method="POST">
                        @csrf
                        <div class="quantity mb-3">
                            <label for="quantity" class="form-label">Quantidade:</label>
                            <input type="number" id="quantity" name="quantidade" min="1" max="100" value="{{ $quantidadeAtual }}" class="form-control" />
                        </div>
                        <button class="btn btn-success">Adicionar ao Carrinho</button>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <script>
        function changeImage(element) {
            var mainImage = document.getElementById('mainImage');
            mainImage.src = element.src;
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
