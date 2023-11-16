<div class="container">
    <h2>Checkout</h2>
    <form action="{{ route('pedido.finalizar') }}" method="POST">
        @csrf

        <!-- Campos de Endereço -->
        <div class="form-group">
            <label for="endereco_nome">Nome do Endereço:</label>
            <input type="text" class="form-control" id="endereco_nome" name="endereco_nome" placeholder="Nome do Endereço" required>
        </div>

        <div class="form-group">
            <label for="endereco_logradouro">Logradouro:</label>
            <input type="text" class="form-control" id="endereco_logradouro" name="endereco_logradouro" placeholder="Logradouro" required>
        </div>

        <div class="form-group">
            <label for="endereco_numero">Número:</label>
            <input type="text" class="form-control" id="endereco_numero" name="endereco_numero" placeholder="Número">
        </div>

        <div class="form-group">
            <label for="endereco_complemento">Complemento:</label>
            <input type="text" class="form-control" id="endereco_complemento" name="endereco_complemento" placeholder="Complemento">
        </div>

        <div class="form-group">
            <label for="endereco_cep">CEP:</label>
            <input type="text" class="form-control" id="endereco_cep" name="endereco_cep" placeholder="CEP" required>
        </div>

        <div class="form-group">
            <label for="endereco_cidade">Cidade:</label>
            <input type="text" class="form-control" id="endereco_cidade" name="endereco_cidade" placeholder="Cidade" required>
        </div>

        <div class="form-group">
            <label for="endereco_estado">Estado:</label>
            <input type="text" class="form-control" id="endereco_estado" name="endereco_estado" placeholder="Estado" required>
        </div>

        <!-- Botão para Finalizar Pedido -->
        <button type="submit" class="btn btn-primary">Finalizar Pedido</button>
    </form>
</div>

<!-- Scripts JS, como jQuery e Bootstrap JS -->
</body>
</html>
