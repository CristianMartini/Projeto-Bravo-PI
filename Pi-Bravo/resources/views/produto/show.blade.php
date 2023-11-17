@extends('layouts.main')

@section('title', 'Produtos')
@section('content')

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

  
    <script>
        function changeImage(src) {
            document.getElementById("mainImage").src = src;
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
