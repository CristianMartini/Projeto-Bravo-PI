<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('Css/forms.css') }}">
</head>

<body>
    <main class="form-signin w-100 m-auto container-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-2 " id="img-logo" src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="" width="150"
                height="130">
            <h1 class="h3 mb-3 fw-normal">Inscreva-se</h1>

            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="USUARIO_NOME" placeholder="Digite seu nome" required>
                <label for="floatingInput">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="USUARIO_EMAIL" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="USUARIO_SENHA" placeholder="Digite sua senha" required minlength="8">
                <label for="floatingPassword">Senha</label>
                <div class="invalid-feedback">
                    A senha é obrigatória e deve ter no mínimo 8 caracteres.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="USUARIO_CPF" placeholder="Digite seu CPF" required pattern="\d{11}">
                <label for="floatingInput">CPF</label>
                <div class="invalid-feedback">
                    O CPF é obrigatório e deve ter exatamente 11 dígitos numéricos.
                </div>
            </div>

            <button class="btn btn-dark w-100 py-2" type="submit">Registrar</button>
            <p class="mt-1 mb-1 text-body-secondary">Já tem cadastro? <a href="{{ route('login') }}" rel="">Fazer login</a></p>

            <p class="mt-2 mb-1 text-body-secondary">&copy; 2023–2023</p>
        </form>
    </main>
</body>
</html>
