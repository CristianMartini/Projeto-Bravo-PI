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
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <img class="mb-4 " id="img-logo" src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="" width="150"
                height="130">
            <h1 class="h3 mb-5   fw-normal">Por favor, inscreva-se</h1>



            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="USUARIO_EMAIL" placeholder="name@example.com">
                <label for="floatingInput">Email</label>
            </div>

            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="USUARIO_SENHA" placeholder="Digite sua senha">
                <label for="floatingPassword">Senha</label>
            </div>

            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 Lembrar-me
                </label>
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
              <p class="mt-2 mb-2 text-body-secondary">Nao tem cadastro?<a href="{{ route('register') }}"  rel="">   Cadastre-se  Aqui!</a></p>

              <p class="mt-5 mb-3 text-body-secondary">&copy; 2023–2023</p>
            </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
