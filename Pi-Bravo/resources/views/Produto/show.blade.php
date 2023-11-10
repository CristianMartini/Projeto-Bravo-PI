<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produto->PRODUTO_NOME }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>{{ $produto->PRODUTO_NOME }}</h1>
        <p>ID do Produto: {{ $produto->PRODUTO_ID }}</p>
        <div class="card " style="width: 13rem; margin-right: 10px;">
            @if($produto->ProdutoImagens->count() == 0)
                <img src="{{ asset('imagens/semFoto.png') }}" class="card-img-top img-card img-fluid" alt="" style="max-width: 100%; max-height: 100%;">
            @else
                <img src="{{ $produto->ProdutoImagens[0]->IMAGEM_URL }}" class="card-img-top img-card img-fluid" alt="" style="max-width: 100%; max-height: 100%;">
            @endif
        <p>Descrição: {{ $produto->PRODUTO_DESC }}</p>
        <p>Preço: R$ {{ $produto->PRODUTO_PRECO }}</p>
        <p>Desconto: R$ {{ $produto->PRODUTO_DESCONTO }}</p>
        <p>Categoria ID: {{ $produto->CATEGORIA_ID }}</p>
        <p>Produto Ativo: {{ $produto->PRODUTO_ATIVO }}</p>


        <form method="POST" action="{{ route('carrinho.store', ['produto'=>$produto->PRODUTO_ID]) }}">
            @csrf
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar ao Carrinho</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
