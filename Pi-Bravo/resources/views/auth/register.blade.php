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
    <link rel="stylesheet" href="./Css/login.css">

<body>

    <main class="form-signin w-100 m-auto">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-2 " id="img-logo" src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="" width="150"
                height="130">
            <h1 class="h3 mb-3   fw-normal">Inscreva-se</h1>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="USUARIO_NOME" placeholder="Digite seu nome">
                    <label for="floatingInput">Nome</label>
                </div>
                <div class="form-floating mb-3">
                <input type="email" class="form-control" name="USUARIO_EMAIL" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="USUARIO_SENHA" placeholder="Digite sua senha">
                <label for="floatingPassword">Senha</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="USUARIO_CPF" placeholder="Digite seu CPF">
                <label for="floatingInput">Cpf</label>
            </div>

              <button class="btn btn-primary w-100 py-2" type="submit">Registrar</button>
              <p class="mt-1 mb-1 text-body-secondary">Já tem cadastro ?<a href="{{ route('login') }}"  rel="">   Fazer login</a></p>

              <p class="mt-2 mb-1 text-body-secondary">&copy; 2023–2023</p>


        </form>
</body>
<html>
