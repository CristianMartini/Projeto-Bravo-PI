{{-- resources/views/profile/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('Css/profile.css') }}" rel="stylesheet">
    <title>Seu perfil</title>
</head>
<body>


<div class="profile-container">
    <div class="profile-header">
        <h1>Perfil do Usuário</h1>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Detalhes do Perfil</h5>
            <p class="card-text">Nome: {{ $user->USUARIO_NOME }}</p>
            <p class="card-text">Email: {{ $user->USUARIO_EMAIL }}</p>
            <p class="card-text">CPF: {{ $user->USUARIO_CPF }}</p>
        </div>
    </div>
    <div class="change-password-container">
        <div class="card-body">
            <h5 class="card-title">Alterar Senha</h5>
            <form action="{{ route('profile.change-password') }}" method="POST" class="change-password-form">
                @csrf
                <div class="mb-3">
                    <label for="current_password" class="form-label">Senha Atual</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" required>
                </div>
                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Confirme a Nova Senha</label>
                    <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>
                <button type="submit">Alterar Senha</button>
            </form>
        </div>
    </div>

    <div class="pedidos-container">
        <h2>Seus Pedidos</h2>
        @forelse ($pedidos as $pedido)
            <div class="pedido">
                <p>Pedido ID: {{ $pedido->id }}</p>
                <p>{{ $user->dataNascimento ? $user->dataNascimento->format('d/m/Y') : 'Data não informada' }}</p>
            </div>
        @empty
            <p>Você não tem pedidos realizados.</p>
        @endforelse
    </div>

</div>

</body>
</html>
