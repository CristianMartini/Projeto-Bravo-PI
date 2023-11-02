<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="./Css/style.css">
    <title> Bravo Tickets</title>
</head>
<body>



    <main class="form-signin">
        <form>
          <img class="mb-4" src="{{ asset('imagens/Logotipo_bravo.png') }}" alt="" >


          <div class="form-floating">
            <input type="email" class="form-control" name="USUARIO_EMAIL" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
          </div>
          <div class="form-floating">
            <input type="password" class="form-control" name="USUARIO_SENHA" placeholder="Digite sua senha">
            <label for="floatingPassword">Senha</label>
          </div>

          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> lembrar
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">login</button>

        </form>
      </main>

</body>
</html>
