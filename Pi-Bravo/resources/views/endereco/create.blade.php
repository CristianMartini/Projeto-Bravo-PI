<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário de Endereço</title>
    <link rel="stylesheet" href="{{asset('Css/checkout.css')  }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <form action="{{ route('endereco.store') }}" method="POST">
        @csrf

        <div class="container mt-4 container-form">
            <h1>Formulário de Endereço</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

           <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                <div class="mb-3">
                    <label for="ENDERECO_CEP" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="ENDERECO_CEP" name="ENDERECO_CEP">

                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-primary" id="consultarCEP">Consultar CEP</button>
                </div>

                <div class="mb-3">
                    <label for="ENDERECO_NOME" class="form-label">Nome do Endereço</label>
                    <input type="text" class="form-control" id="ENDERECO_NOME" name="ENDERECO_NOME"placeholder="Ex: Casa, Trabalho...">

                </div>

                <div class="mb-3">
                    <label for="ENDERECO_LOGRADOURO" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" id="ENDERECO_LOGRADOURO" name="ENDERECO_LOGRADOURO">
                </div>

                <div class="mb-3">
                    <label for="ENDERECO_NUMERO" class="form-label">Número</label>
                    <input type="text" class="form-control" id="ENDERECO_NUMERO" name="ENDERECO_NUMERO">
                </div>

                <div class="mb-3">
                    <label for="ENDERECO_COMPLEMENTO" class="form-label">Complemento</label>
                    <input type="text" class="form-control" id="ENDERECO_COMPLEMENTO" name="ENDERECO_COMPLEMENTO">
                </div>

                <div class="mb-3">
                    <label for="ENDERECO_CIDADE" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="ENDERECO_CIDADE" name="ENDERECO_CIDADE">
                </div>

                <div class="mb-3">
                    <label for="ENDERECO_ESTADO" class="form-label">Estado</label>
                    <input type="text" class="form-control" id="ENDERECO_ESTADO" name="ENDERECO_ESTADO">
                </div>

                <button type="submit" class="btn btn-dark">Enviar</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios@0.22.0/dist/axios.min.js"></script>
        <script>
            $(document).ready(function() {
                // Adicionar validação ao formulário
                $('#enderecoForm').submit(function(e) {
                    e.preventDefault();
                    if (validarFormulario()) {
                        // Submeter o formulário se for válido
                        this.submit();
                    }
                });

                // Consultar CEP usando a API do ViaCEP
                $('#consultarCEP').click(function() {
                    const cep = $('#ENDERECO_CEP').val();
                    if (cep) {
                        axios.get(`https://viacep.com.br/ws/${cep}/json/`)
                            .then(function (response) {
                                preencherCamposEndereco(response.data);
                            })
                            .catch(function (error) {
                                console.error('Erro na consulta de CEP: ', error);
                            });
                    }
                });

                function validarFormulario() {
                    let valido = true;

                    // Validar campos obrigatórios
                    const camposObrigatorios = [, 'ENDERECO_CEP', 'ENDERECO_CIDADE', 'ENDERECO_ESTADO'];
                    camposObrigatorios.forEach(function(campo) {
                        const valorCampo = $('#' + campo).val();
                        if (valorCampo.trim() === '') {
                            $('#' + campo).addClass('is-invalid');
                            valido = false;
                        } else {
                            $('#' + campo).removeClass('is-invalid');
                        }
                    });

                    return valido;
                }

                function preencherCamposEndereco(data) {
                    $('#ENDERECO_NOME').val('');
                    $('#ENDERECO_LOGRADOURO').val(data.logradouro);
                    $('#ENDERECO_NUMERO').val('');
                    $('#ENDERECO_COMPLEMENTO').val(data.complemento);
                    $('#ENDERECO_CIDADE').val(data.localidade);
                    $('#ENDERECO_ESTADO').val(data.uf);
                }
            });
        </script>
    </body>
    </html>

