{{-- resources/views/profile/show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Perfil do Usuário</h1>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <!-- Adicione mais campos conforme necessário -->
</div>
@endsection
