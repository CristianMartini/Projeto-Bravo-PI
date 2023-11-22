<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Realizar Login</title>
    <link rel="stylesheet" href="{{ asset('Css/checkout.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>
</head>

<body>

    <div class="container">
        <form id="registerForm" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="container mt-4 container-form">
                <h1>Preencha os campos abaixo<br> para registrar-se.</h1>
                <div class="mb-3">

                    <input type="text" class="form-control" id="USUARIO_NOME" name="USUARIO_NOME" placeholder="Digite seu nome">
                    <label for="floatingInput">Nome</label>

                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="USUARIO_EMAIL" id="USUARIO_EMAIL" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>

                <div class=" mb-3">
                    <input type="password" class="form-control" name="USUARIO_SENHA" id="USUARIO_SENHA" placeholder="Digite sua senha">
                    <label for="floatingPassword">Senha</label>
                </div>

                <div class=" mb-3">
                    <input type="text" class="form-control" name="USUARIO_CPF" id ="USUARIO_CPF" placeholder="Digite seu CPF">
                    <label for="floatingInput">Cpf</label>
                </div>

                <button class="btn btn-dark" type="submit">Registrar</button>
                <p class="mt-1 mb-1 text-body-secondary">Já tem cadastro ?<a href="{{ route('login') }}" rel="">
                        Fazer login</a></p>

                <h3 class="mt-2 mb-1 text-body-secondary">&copy; 2023–2023</h3>


        </form>
        <script>
            document.getElementById('registerForm').addEventListener('submit', function(event) {
                var nome = document.getElementById('USUARIO_NOME').value;
                var email = document.getElementById('USUARIO_EMAIL').value;
                var senha = document.getElementById('USUARIO_SENHA').value;
                var cpf = document.getElementById('USUARIO_CPF').value;

                if (!nome.trim()) {
                    alert('Por favor, insira o seu nome.');
                    event.preventDefault(); // Impede o envio do formulário
                } else if (!email) {
                    alert('Por favor, insira o seu email.');
                    event.preventDefault(); // Impede o envio do formulário
                } else if (!senha) {
                    alert('Por favor, insira a sua senha.');
                    event.preventDefault(); // Impede o envio do formulário
                } else if (!validarCPF(cpf)) {
                    alert('Por favor, insira um CPF com 11 dígitos.');
                    event.preventDefault(); // Impede o envio do formulário
                }

                // Função simples para validar o CPF
                function validarCPF(cpf) {
                    cpf = cpf.replace(/[^\d]+/g,''); // Remove tudo o que não é dígito
                    return cpf.length === 11;
                }
            });
        </script>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>
</body>
<html>
