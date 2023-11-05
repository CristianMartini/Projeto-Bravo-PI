<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos em Destaque</title>
    <!-- CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Cabeçalho -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Sympla</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Eventos em Destaque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Meus Eventos</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Conteúdo principal -->
    <main>
        <div class="container">
            <div class="row">
                <!-- Evento 1 -->
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="evento1.jpg" class="card-img-top" alt="Evento 1">
                        <div class="card-body">
                            <h5 class="card-title">Evento 1</h5>
                            <p class="card-text">Descrição do evento 1...</p>
                            <a href="#" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>

                <!-- Evento 2 -->
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="evento2.jpg" class="card-img-top" alt="Evento 2">
                        <div class="card-body">
                            <h5 class="card-title">Evento 2</h5>
                            <p class="card-text">Descrição do evento 2...</p>
                            <a href="#" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>

                <!-- Evento 3 -->
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="evento3.jpg" class="card-img-top" alt="Evento 3">
                        <div class="card-body">
                            <h5 class="card-title">Evento 3</h5>
                            <p class="card-text">Descrição do evento 3...</p>
                            <a href="#" class="btn btn-primary">Saiba mais</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Rodapé -->
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
              <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">&copy; 2023 Company, Inc</span>
          </div>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
          </ul>
        </footer>
      </div>

</body>
</html>
