<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realizar Login</title>
    <link rel="stylesheet" href="{{asset('Css/checkout.css')  }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>
</head>
<body>

    <div class="container">
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="container mt-4 container-form">
                <h1>Login</h1>
                <div class="mb-3">
                    <label for="floatingInput">Email *</label>
                <input type="email" class="form-control" id="USUARIO_EMAIL"  name="USUARIO_EMAIL" placeholder="name@example.com">

            </div>

            <div class=" mb-3">
                 <label for="floatingPassword">Senha *</label>
                <input type="password" class="form-control" id="USUARIO_SENHA" name="USUARIO_SENHA" placeholder="Digite sua senha">

            </div>

            <div class=" mb-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 Lembrar-me
                </label>
              </div>
              <button type="submit" class="btn btn-dark">Entrar</button>
              <p class="mt-2 mb-2 text-body-secondary">Nao tem cadastro?<a href="{{ route('register') }}"  rel="">   Cadastre-se  Aqui!</a></p>

              <h3 >&copy; 2023–2023</h3>
            </form>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            var email = document.getElementById('USUARIO_EMAIL').value;
            var senha = document.getElementById('USUARIO_SENHA').value;

            if (!email) {
                alert('Por favor, insira o seu email.');
                event.preventDefault(); // Impede o envio do formulário
            } else if (!senha) {
                alert('Por favor, insira a sua senha.');
                event.preventDefault(); // Impede o envio do formulário
            } else if (!validarEmail(email)) {
                alert('Por favor, insira um endereço de email válido.');
                event.preventDefault(); // Impede o envio do formulário
            }
            // A função de validação de email pode ser algo assim:
            function validarEmail(email) {
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>
</body>

</html>
