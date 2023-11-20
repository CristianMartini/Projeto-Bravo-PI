<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://kit.fontawesome.com/00256cd3c2.js" crossorigin="anonymous"></script>
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
/>


<link rel="stylesheet" href="{{ asset('Css/style.css') }}">

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
    <link rel="stylesheet" href="{{ asset('Css/carrinho.css') }}" />
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
</head>
<body>
    <div class="container container-fluid">
        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home')}}"><img src="{{ asset('imagens/Logotipo_bravo.png') }}"
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
                        Categorias
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <div class="categorias">
                            @foreach ($categorias as $categoria)
                                <ul>
                                    <li><a href="{{ route('produtos.categoria', $categoria->CATEGORIA_ID) }}">
                                        {{ $categoria->CATEGORIA_NOME }}</a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form action="{{ route('pesquisar') }}" method="GET"class="container-fluid">
                        <div class="input-group">

                            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar"
                                aria-label="Search" name="query">
                            <button class="btn btn my-2 my-sm-0" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor" class="bi bi-search"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
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
                    <a href="{{ route('carrinho') }}"  ><svg xmlns="http://www.w3.org/2000/svg" width="38" height="25" fill="black" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </svg></a>
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



    <header>
        <span>Carrinho de compras de {{ Auth::user()->USUARIO_NOME }}</span>
    </header>
    <main>
        <div class="page-title">Seu Carrinho</div>
        <div class="content">

            <section>
                <table>
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço</th>
                            <th>Quantidade</th>
                            <th>Desconto</th>
                            <th>Total</th>
                            <th>-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($itensCarrinho as $item)
                            <tr>
                                <td>
                                    <div class="product">
                                        @if($item->product->ProdutoImagens->count() == 0)
                                            <img src="{{ asset('imagens/semFoto.jpg') }}" >
                                        @else
                                            <img src="{{ $item->product->ProdutoImagens[0]->IMAGEM_URL }}"  alt="{{ $item->product->PRODUTO_NOME }}">
                                        @endif
                                        <div class="info">
                                            <div class="name">{{ $item->product->PRODUTO_NOME }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td>R$ {{ number_format($item->product->PRODUTO_PRECO, 2, ',', '.') }}</td>
                                <td>
                                    <div class="qty">
                                        <button class="update-quantity" data-action="decrease" data-id="{{ $item->id }}"><i class="bx bx-minus"></i></button>           <span class="item-quantity" data-id="{{ $item->id }}">{{ $item->ITEM_QTD }}</span>
                                        <button class="update-quantity" data-action="increase" data-id="{{ $item->id }}"><i class="bx bx-plus"></i></button>
                                    </div>
                                </td>
                                <td>R$ {{ number_format($item->product->PRODUTO_DESCONTO * $item->ITEM_QTD, 2, ',', '.') }}</td>
                                <td>R$ {{ number_format(($item->product->PRODUTO_PRECO - $item->product->PRODUTO_DESCONTO) * $item->ITEM_QTD, 2, ',', '.') }}</td>
                                <td>
                                    <button class="remove-item" data-id="{{ $item->id }}"><i class="bx bx-x"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            <aside>
                <div class="box">
                    <header>Resumo da compra</header>
                    <div class="info">
                        <div><span>Sub-total</span><span>R$ {{ number_format($precoTotal, 2, ',', '.') }}</span></div>
                        <div><span>Frete</span><span>Gratuito</span></div>
                        <div>
                            <button>
                                Adicionar cupom de desconto
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="footer">
                        <span>Total</span>
                        <span>R$ {{ number_format($precoTotal, 2, ',', '.') }}</span>
</div>
                </div>
                <button> <a href="{{ route('checkout') }}">Proceder para o Checkout</a></button>
            </aside>
        </div>


    </main>
    <div class="b-example-divider"></div>

    <div class=" container-footer ">
      <footer class="py-1 my-5">
        <ul class="nav justify-content-center border-bottom ">
            <li><a class="logo-footer" href="{{ route('home')}}"><img src="{{ asset('imagens/Logotipo_bravo.png') }}"
                alt="bravo tickets logo"width="110">
        </a>
    </li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>

          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre nós</a></li>
        </ul>
        <p class="text-center text-body-secondary">&copy; 2023 Company, Inc</p>
      </footer>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.update-quantity').click(function() {
                var id = $(this).data('id');
                var action = $(this).data('action');
                var quantity = parseInt($('.item-quantity[data-id="' + id + '"]').text());
                quantity = action === 'increase' ? quantity + 1 : (quantity > 1 ? quantity - 1 : 1);

                $.ajax({
                    url: '/carrinho/atualizar/' + id,
                    type: 'POST',
                    data: {
                        quantidade: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('.item-quantity[data-id="' + id + '"]').text(quantity);
                    }
                });
            });

            $('.remove-item').click(function() {
                var id = $(this).data('id');

                $.ajax({
                    url: '/carrinho/remover/' + id,
                    type: 'DELETE',
                    data: { _token: '{{ csrf_token() }}' },
                    success: function(response) {
                        $('button.remove-item[data-id="' + id + '"]').closest('tr').remove();
                    }
                });
            });
        });
        </script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</body>
</html>
